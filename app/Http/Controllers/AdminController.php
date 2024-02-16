<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    }
