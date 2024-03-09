<?php

namespace App\Http\Controllers\Dashboard\RoleAndPermission;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index()
    {
        try {
            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('view admin')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
             }

            $admins= Admin::paginate(4);
            return view('permissions.admin.index', compact('admins'));
        } catch (\Exception $e) {
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }

    public function assignRole($id)
    {
        try {
            $users = Auth::guard('admin')->user();
            if (!$users || !$users->hasPermissionByRole('assign role')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();            }

            $roles = Roles::all();
            $admin=Admin::findOrFail($id);
            // $appsettings = AppSetting::all()->toArray();

            return view('permissions.admin.assing_role', compact('admin', 'roles'));

        } catch (\Exception $e) {
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }

    public function updateRole(Request $request)
    {
        if (!$request->isMethod('post')) {
            // Display an error or handle the incorrect request method
            Alert::toast('Invalid request method!', 'error');
            return redirect()->route('all-admins.index');
        }

        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'admin_id' => 'required|exists:admins,id',
        ]);

        try {
            $role = Roles::find($request->input('role_id'));

            if (!$role) {
                Alert::toast('Role does not exist!', 'error');
                return redirect()->route('all-admins.index');
            }

            $admin = Admin::find($request->input('admin_id'));

            if (!$admin) {
                Alert::toast('Admin does not exist!', 'error');
                return redirect()->route('all-admins.index');
            }

            $admin->type = $role->name;
            $admin->update();

            $admin->roles()->sync([$request->role_id]);

            Alert::toast('Role assigned to user successfully!', 'success');
            return redirect()->route('all-admins');
        } catch (\Exception $e) {
            Alert::toast('Something went wrong!', 'error');
            return redirect()->route('all-admins');
        }
    }
}
