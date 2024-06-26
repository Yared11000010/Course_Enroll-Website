<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Testmony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class TestMonyController extends Controller
{
    public function index()
    {
        try {
            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('view testmony')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            $Testmonys = Testmony::all();

            return view('testmony.index', compact('Testmonys'));
        } catch (\Exception $e) {
            // Handle exceptions or errors
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }

    public function create()
    {
        try {
            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('add testmony')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            return view('testmony.create');
        } catch (\Exception $e) {
            // Handle exceptions or errors
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        try {
            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('add testmony')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            if (!$request->isMethod('post')) {
                // Handle the error - Method not allowed
                Alert::toast('Method not allowed', 'error');
                return redirect()->back(); // You can redirect to an appropriate location
            }
            $request->validate([
                'name' => 'required',
                'comment'=>'required',
            ]);

            $Testmony = new Testmony();
            $Testmony->name= $request->input('name');
            $Testmony->comment = $request->input('comment');
            $Testmony->jobs=$request->input('job');
            $Testmony->status = 1;
            $Testmony->save();

            Alert::toast('Testmony has been saved successfully!', 'success');
            return redirect()->route('student-says');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Laravel's built-in validation exception
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        } catch (\Exception $e) {
            // Handle exceptions or errors
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        try {
            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('edit testmony')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            $testmony = Testmony::find($id);
            return view('testmony.edit', compact('testmony'));
        } catch (\Exception $e) {
            // Handle exceptions or errors
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        try {
            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('edit testmony')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            if (!$request->isMethod('put')) {
                // Handle the error - Method not allowed
                Alert::toast('Method not allowed', 'error');
                return redirect()->route('Testmonys'); // You can redirect to an appropriate location
            }
            $request->validate([
                'name' => 'required',
                'comment'=>'required',
            ]);

            $Testmony = Testmony::find($request->input('id'));

            $Testmony->name = $request->input('name');
            $Testmony->comment= $request->input('comment');
            $Testmony->jobs=$request->input('job');
            $Testmony->update();

            Alert::toast('Testmony has been updated successfully!', 'success');
            return redirect()->route('student-says');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Laravel's built-in validation exception
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        } catch (\Exception $e) {
            // Handle exceptions or errors
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        try {
            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('delete testmony')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            $Testmony = Testmony::find($id);
            $Testmony->delete();
            Alert::toast('Testmony has been deleted successfully!', 'error');
            return redirect()->route('student-says');
        } catch (\Exception $e) {
            // Handle exceptions or errors
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }

    public function active($id)
    {
        try {
            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('edit testmony')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            $Testmony = Testmony::find($id);
            $Testmony->status = 1;
            $Testmony->save();

            Alert::toast('Testmony has been activated!', 'success');
            return redirect()->route('student-says');
        } catch (\Exception $e) {
            // Handle exceptions or errors
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }

    public function inactive($id)
    {
        try {
            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('edit testmony')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            $Testmony = Testmony::find($id);
            $Testmony->status = 0;
            $Testmony->save();

            Alert::toast('Testmony has been inactivated successfully!', 'error');
            return redirect()->route('student-says');
        } catch (\Exception $e) {
            // Handle exceptions or errors
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }

}
