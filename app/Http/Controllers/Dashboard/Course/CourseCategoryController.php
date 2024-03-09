<?php

namespace App\Http\Controllers\Dashboard\Course;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CourseCategoryController extends Controller
{
    public function index()
    {
        try {
            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('view course category')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            $course_categories = CourseCategory::paginate(10);
            return view('course.category.index', compact('course_categories'));
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
            if (!$user || !$user->hasPermissionByRole('add course category')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            return view('course.category.create');
        } catch (\Exception $e) {
            // Handle exceptions or errors
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        // try {
            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('add course category')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            if (!$request->isMethod('post')) {
                // Handle the error - Method not allowed
                Alert::toast('Method not allowed', 'error');
                return redirect()->route('cities'); // You can redirect to an appropriate location
            }

            $request->validate([
                'name' => 'required'
            ]);

            $category = new CourseCategory();
            $category->name = $request->input('name');
            $category->status = 1;
            $category->save();

            Alert::toast('course category has been saved successfully!', 'success');
            return redirect()->route('course-categories');
        // } catch (\Illuminate\Validation\ValidationException $e) {
        //     // Laravel's built-in validation exception
        //     return redirect()->back()->withErrors($e->validator->errors())->withInput();
        // } catch (\Exception $e) {
        //     // Handle exceptions or errors
        //     Alert::toast('something is wrong!!', 'error');
        //     return redirect()->back();
        // }
    }

    public function edit($id)
    {
        try {
            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('edit course category')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            $course_categories = CourseCategory::find($id);
            return view('course.category.edit', compact('course_categories'));

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
            if (!$user || !$user->hasPermissionByRole('edit course category')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            if (!$request->isMethod('put')) {
                // Handle the error - Method not allowed
                Alert::toast('Method not allowed', 'error');
                return redirect()->route('cities'); // You can redirect to an appropriate location
            }


            $category = CourseCategory::find($request->input('id'));
            $category->name = $request->input('name');
            $category->update();

            Alert::toast('course category has been updated!', 'success');
            return redirect()->route('course-categories');
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
            if (!$user || !$user->hasPermissionByRole('delete course category')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            $category = CourseCategory::find($id);
            $category->delete();

            Alert::toast('course category has been deleted!', 'error');
            return redirect()->route('course-categories');
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
            if (!$user || !$user->hasPermissionByRole('edit course category')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            $category = CourseCategory::find($id);
            $category->status = 1;
            $category->save();

            Alert::toast('course category has been activated!', 'success');
            return redirect()->route('course-categories');
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
            if (!$user || !$user->hasPermissionByRole('edit course category')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            $category = CourseCategory::find($id);
            $category->status = 0;
            $category->save();

            Alert::toast('course category has been inactivated!', 'error');
            return redirect()->route('course-categories');
        } catch (\Exception $e) {
            // Handle exceptions or errors
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }
}
