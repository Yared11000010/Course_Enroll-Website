<?php

namespace App\Http\Controllers\Dashboard\Blog;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BlogsCategoryController extends Controller
{
    public function index()
    {
        try {

            $blog_categories = BlogCategory::paginate(10);
            return view('blogs.category.index', compact('blog_categories'));
        } catch (\Exception $e) {
            // Handle exceptions or errors
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }

    public function create()
    {
        try {

            return view('blogs.category.create');
        } catch (\Exception $e) {
            // Handle exceptions or errors
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        try {

            if (!$request->isMethod('post')) {
                // Handle the error - Method not allowed
                Alert::toast('Method not allowed', 'error');
                return redirect()->route('cities'); // You can redirect to an appropriate location
            }

            $request->validate([
                'name' => 'required|unique:blog_categories'
            ]);

            $category = new BlogCategory();
            $category->name = $request->input('name');
            $category->status = 1;
            $category->save();

            Alert::toast('Blog category has been saved successfully!', 'success');
            return redirect()->route('blog-categories');
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

            $blog_categories = BlogCategory::find($id);
            return view('blogs.category.edit', compact('blog_categories'));

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
            $request->validate([
                'name' => 'required'
            ]);

            $category = BlogCategory::find($request->input('id'));
            $category->name = $request->input('name');
            $category->save();

            Alert::toast('Blog category has been updated!', 'success');
            return redirect()->route('blog-categories');
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

            $category = BlogCategory::find($id);
            $category->delete();

            Alert::toast('Blog category has been deleted!', 'error');
            return redirect()->route('blog-categories');
        } catch (\Exception $e) {
            // Handle exceptions or errors
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }

    public function active($id)
    {
        try {


            $category = BlogCategory::find($id);
            $category->status = 1;
            $category->save();

            Alert::toast('Blog category has been activated!', 'success');
            return redirect()->route('blog-categories');
        } catch (\Exception $e) {
            // Handle exceptions or errors
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }

    public function inactive($id)
    {
        try {

            $category = BlogCategory::find($id);
            $category->status = 0;
            $category->save();

            Alert::toast('Blog category has been inactivated!', 'error');
            return redirect()->route('blog-categories');
        } catch (\Exception $e) {
            // Handle exceptions or errors
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }
}
