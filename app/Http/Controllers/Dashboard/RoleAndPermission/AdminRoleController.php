<?php

namespace App\Http\Controllers\Dashboard\RoleAndPermission;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminRoleController extends Controller
{
    public function edit(Admin $user)
    {
        try {
            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('assign role')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }

            $roles = Roles::all();
            return view('admin_roles.edit', compact('user', 'roles'));
        } catch (\Exception $e) {
            Alert::toast('something is wrong!!','error');
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        try {
            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('assign role')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            $request->validate([
                'roles' => 'required|array',
                'roles.*' => 'exists:roles,id',
            ]);
            $user=Admin::find($request->input('id'));
            $user->roles()->sync($request->roles);

            return redirect()->route('users.index')->with('success', 'Roles assigned to user successfully.');
        } catch (\Exception $e) {
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }
}
