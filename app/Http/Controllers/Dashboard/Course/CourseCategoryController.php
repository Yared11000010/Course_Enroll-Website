<?php

namespace App\Http\Controllers\Dashboard\Course;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CourseCategoryController extends Controller
{
    public function index()
    {
        try {

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
