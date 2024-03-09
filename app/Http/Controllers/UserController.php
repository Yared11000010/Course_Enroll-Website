<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicationAttribute;
use App\Models\User;
use App\Models\User_extra_information;
use App\Models\User_info_column;
use App\Models\UserExtrainfo;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    //

    public function index(){
        $user = Auth::guard('admin')->user();
        if (!$user || !$user->hasPermissionByRole('view user')) {
            Alert::toast('You dont have access to this page.','error');
            return redirect()->back();
        }
        $allusers=User::all();

        return view('users.index',compact('allusers'));
    }

    public function create(){
        $user = Auth::guard('admin')->user();
        if (!$user || !$user->hasPermissionByRole('add user')) {
            Alert::toast('You dont have access to this page.','error');
            return redirect()->back();
        }
        return view('users.add');
    }

    public function store(Request $request){
        $user = Auth::guard('admin')->user();
        if (!$user || !$user->hasPermissionByRole('add user')) {
            Alert::toast('You dont have access to this page.','error');
            return redirect()->back();
        }
            // Validate the incoming request data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'phone' => 'required|numeric',
            'password' => 'required|confirmed|min:6',
        ]);

        // dd($request->all());
        // Create a new user
        User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('phone'),
            'password' => bcrypt($request->input('password')),
        ]);

        Alert::toast('User has been saved', 'success');
        return redirect()->route('all-users');
    }

    public function edit($id){
        $user = Auth::guard('admin')->user();
        if (!$user || !$user->hasPermissionByRole('edit user')) {
            Alert::toast('You dont have access to this page.','error');
            return redirect()->back();
        }
        $user=User::find($id);

        return view('users.edit',compact('user'));
    }

    public function update(Request $request, $id){
        // Validate the incoming request data
        $user = Auth::guard('admin')->user();
        if (!$user || !$user->hasPermissionByRole('edit user')) {
            Alert::toast('You dont have access to this page.','error');
            return redirect()->back();
        }
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|numeric',
            'password' => 'nullable|confirmed|min:6',
        ]);

        // Find the user by ID
        $user = User::findOrFail($id);

        // Update user data
        $user->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('phone'),
            'password' => bcrypt($request->input('password')),
        ]);

        Alert::toast('User has been updated', 'success');
        return redirect()->route('all-users');
    }
    public function delete($id){
        $user = Auth::guard('admin')->user();
        if (!$user || !$user->hasPermissionByRole('delete user')) {
            Alert::toast('You dont have access to this page.','error');
            return redirect()->back();
        }
        $user=User::find($id);
        $user->delete();

        Alert::toast('User has been deleted', 'info');
        return redirect()->route('all-users');
    }



}
