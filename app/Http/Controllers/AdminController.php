<?php

namespace App\Http\Controllers;

use App\Mail\ForgetPasswordAdmin;
use App\Models\Admin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function login(){

        return view('dashboard.login_register.login');
       }

       public function login_validate(Request $request)
       {
           $this->validate($request, [
               'email' => 'required|email',
               'password' => 'required',
           ]);

           if (auth()->guard('admin')->attempt($request->only('email', 'password'))) {
            $user = auth()->guard('admin')->user(); // Get the authenticated user
            if ($user->status == '1') {

                Alert::toast('Welcome to your dashboard', 'success');
                return redirect()->route('dashboard');
            } else {
                Auth::logout();
                Alert::toast('Your account is not active!','warning');
                return back();
            }
        } else {
            Alert::toast('Invalid Email or Password!', 'error');
            return back();
        }
       }

       public function registeration(){

        return view('dashboard.login_register.register');
       }

       public function register(Request $request){

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:8',
        ]);
        // dd($validatedData);

        // Create a new Deliveryman instance
        $admin = new Admin();
            // dd($admin);
        // Assign the request data to the admin model attributes
        $admin->name = $validatedData['name'];
        $admin->email = $validatedData['email'];
        $admin->password = bcrypt($validatedData['password']);
        $admin->save();

        return redirect()->route('dashboard');

       }



       public function logout(Request $request)
       {
           auth()->guard('admin')->logout();

           $request->session()->invalidate();

           return redirect()->route('admin_login');
       }



       public function update_admin_password(Request $request){

        // dd($request->all());

            $request->validate([
                'old_password' => 'required',
                'new_password' => ['required'],
                'new_password_confirmation' => ['same:new_password'],
            ]);

            if(!Hash::check($request->old_password, Auth::guard('admin')->user()->password)){

                Alert::toast('your old password is not correct!','info');
                return back();
            }
            // Current password and new password same
            if (!strcmp($request->get('new_password'), $request->get('new_password_confirmation')) == 0)
            {
                Alert::toast('new password and confirm password  not the same. !','info');
                return back();
            }
            #Update the new Password
            Admin::whereId(Auth::guard('admin')->user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);

            Alert::toast('Password has been Updated Succesfully !','success');
            return back();
        }

        public function update_password(){

            return view('admin_detail.change_password');
        }

        public function index(){

            $title = 'Delete Admin!';
            $text = "Are you sure you want to delete?";
            confirmDelete($title, $text);

            $alladmins=Admin::all();

            return view('admins.index',compact('alladmins'));
        }

        public function create(){

            return view('admins.add');
        }

        public function store(Request $request){

                // Validate the incoming request data
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:admins|max:255',
                'password' => 'required|confirmed|min:6',
            ]);

            // dd($request->all());
            // Create a new admin
                $admin = new Admin();
                $admin->name= $request->input('name');
                $admin->email = $request->input('email');
                $admin->password = bcrypt($request->input('password'));
                $admin->save();

            Alert::toast('Adin has been saved successfully!', 'sucess');
            return redirect()->route('all-admins');
        }

        public function edit($id){

            $admin=Admin::find($id);

            return view('admins.edit',compact('admin'));
        }

        public function update(Request $request, $id){
            // Validate the incoming request data
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                // 'password' => 'nullable|confirmed|min:6',
            ]);

            // Find the admin by ID
            $admin = Admin::findOrFail($id);

            $admin->name=$request->input('name');
            $admin->email=$request->input('email');
            $admin->save();
            // Update admin data

            Alert::toast('Admin has been updated', 'success');
            return redirect()->route('all-admins');
        }
        public function delete($id){

            $admin=Admin::find($id);
            $admin->delete();
            Alert::toast('Admin has been deleted','error');
            return redirect()->route('all-admins');
        }

        public function active($id){
            $admin=Admin::find($id);
            $admin->status=1;
            $admin->save();

            Alert::toast('Admin has been inactived','success');
            return redirect()->route('all-admins');
        }

        public function inactive($id){
            $admin=Admin::find($id);
            $admin->status=0;
            $admin->save();
            Alert::toast('Admin has been inactived','error');
            return redirect()->route('all-admins');
        }



    //for forget password
    public function forgetpassword()
    {
        try {
            return view('dashboard.forget_password.forget');
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
            'email' => 'required|email|exists:admins',
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
             Mail::to($request->email)->send(new ForgetPasswordAdmin($messageData));
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
            return view('dashboard.forget_password.forget_password_link',['token' => $token]);
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
            'email' => 'required|email|exists:admins',
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
            $user = Admin::where('email', $request->email)->first();

            if (!$user) {
                return back()->withInput()->with('error', 'Admin not found!');
            }

            // Hash and update the password
            $user->password = Hash::make($request->password);
            $user->save();

            // Delete password_resets record
            DB::table('password_resets')->where(['email' => $request->email])->delete();

            Alert::toast('Your password has been successfully changed!', 'success');
            return redirect()->route('admin_login');
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
