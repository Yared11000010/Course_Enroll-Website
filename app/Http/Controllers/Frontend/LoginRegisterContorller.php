<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Mail\ForgetPassword;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class LoginRegisterContorller extends Controller
{
    //
    public function login(){

        return view('Frontend.login_and_register.login');
    }
    public function register(){

        return view('Frontend.login_and_register.register');
    }


    public function userRegister(Request $request)
    {
        try {
            if (!$request->method('post')) {
                Alert::toast('something is wrong!!', 'error');
                return redirect()->back();
            }
            // dd($request->all());
            $this->validate($request, [
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'mobile' => 'required|string',
                'email' => 'required|email',
                'password' => 'required|min:8',
            ]);

            $email = $request->input('email');
            $phone = $request->input('mobile');

            if (strlen($request->input('mobile')) !== 10) {
                Alert::toast('Mobile number should be exactly 10  digits', 'error');
                return redirect()->back();
            }
            if (User::where('mobile', $phone)->exists()) {
                Alert::toast('Mobile number already exists', 'error');
                return redirect()->back();
            }

            if (User::where('email', $email)->exists()) {
                Alert::toast('Email already exists', 'error');
                return redirect()->back();
            }
            $user = new User();
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->mobile = $request->input('mobile');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->save();
            //redirect back user with success message
            Alert::toast('Login with your account', 'success');
            // notify()->warning('Thanks for registering as User. Please confirm your email to activate your account','Not Active');
            return redirect()->route('login-user');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Laravel's built-in validation exception
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        } catch (\Exception $e) {
            // Log or handle the exception as needed
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }
    public function logout()
    {
        try {
            Auth::logout();
            Session::flush();

            return redirect()->route('login-user');
        } catch (\Exception $e) {
            // Log or handle the exception as needed
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }
    public function userLogin(Request $request)
    {
        try {
            if (!$request->method('post')) {
                Alert::toast('something is wrong!!', 'error');
                return redirect()->back();
            }
            $data = $request->all();

            $validator = Validator::make($data, [
                'email' => 'required|email|max:150|exists:users',
                'password' => 'required|min:6', // Minimum password length is 6 characters (you can adjust this as needed)
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
                                       // Login successful, redirect to the cart or any other desired page
                    Alert::toast('Login Successfully!', 'success');
                    return redirect()->route('frontend');
                } else {
                    // Login failed, redirect back with an error message
                    Alert::toast('Incorrect username or password', 'error');
                    return redirect()->back();
                }
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Laravel's built-in validation exception
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        } catch (\Exception $e) {
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }


    //for forget password
   public function forgetpassword()
   {
       try {
           return view('Frontend.forget_password.forget');
       }catch (\Exception $e) {
           // Log or handle the exception as needed
           Alert::toast('something is wrong!!', 'error');
           return redirect()->back();
       }
   }
   public function ForgetPasswordStore(Request $request)
   {
       if (!$request->isMethod('post')) {
           // Display an error or handle the incorrect request method
           Alert::toast('Invalid request method!', 'error');
           return back();
       }
       $request->validate([
           'email' => 'required|email|exists:users',
       ]);

           $token = Str::random(64);

           DB::table('password_resets')->updateOrInsert([
               'email' => $request->email,
           ], [
               'token' => $token,
               'created_at' => Carbon::now()
           ]);


           $messageData = [
               'token' => $token,
           ];

           try{
            Mail::to($request->email)->send(new ForgetPassword($messageData));
            }catch(Exception $e){
                    Alert::toast("something is wrong",'success');
                    return redirect()->back();
            }


        Alert::toast('We have emailed your password reset link', 'success');
        return back();

   }
   public function ResetPassword($token)
   {
       try{
           return view('Frontend.forget_password.forget_password_link',['token' => $token]);
       } catch (\Exception $e) {

           Alert::toast('something is wrong!!', 'error');
           return redirect()->back();
       }
   }


   public function ResetPasswordStore(Request $request)
   {

       if (!$request->isMethod('post')) {
           Alert::toast('Invalid request method!', 'error');
           return back();
       }

       $request->validate([
           'email' => 'required|email|exists:users',
           'password' => 'required|string|min:8|confirmed',
           'password_confirmation' => 'required'
       ]);

       $update = DB::table('password_resets')
           ->where(['email' => $request->email, 'token' => $request->token])
           ->first();

       if (!$update) {
           return back()->withInput()->with('error', 'Invalid token!');
       }

       try {
           $user = User::where('email', $request->email)->first();

           if (!$user) {
               return back()->withInput()->with('error', 'User not found!');
           }

           // Hash and update the password
           $user->password = Hash::make($request->password);
           $user->save();

           // Delete password_resets record
           DB::table('password_resets')->where(['email' => $request->email])->delete();

           Alert::toast('Your password has been successfully changed!', 'success');
           return redirect()->route('login-user');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Laravel's built-in validation exception
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        } catch (\Exception $e) {
           // Log or handle the exception as needed
           Alert::toast('something is wrong!!', 'error');
           return redirect()->back();
       }
   }



}