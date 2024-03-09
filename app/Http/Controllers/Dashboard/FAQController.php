<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class FAQController extends Controller
{
    public function index()
    {
        try {
            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('view faq')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            $faq = FAQ::paginate(10);
            return view('faq.index', compact('faq'));
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
            if (!$user || !$user->hasPermissionByRole('add faq')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            return view('faq.create');
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
            if (!$user || !$user->hasPermissionByRole('add faq')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            if (!$request->isMethod('post')) {
                // Handle the error - Method not allowed
                Alert::toast('Method not allowed', 'error');
                return redirect()->route('cities'); // You can redirect to an appropriate location
            }

            $request->validate([
                'question' => 'required',
                'answer' => 'required'
            ]);

            $faq = new FAQ();
            $faq->question = $request->input('question');
            $faq->answer = $request->input('answer');
            $faq->status=1;
            $faq->save();

            Alert::toast('faq has been saved successfully!', 'success');
            return redirect()->route('faqs');
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
            if (!$user || !$user->hasPermissionByRole('edit faq')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            $faq = FAQ::find($id);
            return view('faq.edit', compact('faq'));

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
            if (!$user || !$user->hasPermissionByRole('edit faq')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            if (!$request->isMethod('put')) {
                // Handle the error - Method not allowed
                Alert::toast('Method not allowed', 'error');
                return redirect()->route('faqs'); // You can redirect to an appropriate location
            }

            $faq = FAQ::find($request->input('id'));
            $faq->question = $request->input('question');
            $faq->answer = $request->input('answer');
            $faq->update();

            Alert::toast('faq has been updated!', 'success');
            return redirect()->route('faqs');
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
            if (!$user || !$user->hasPermissionByRole('delete faq')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            $faq = FAQ::find($id);
            $faq->delete();
            Alert::toast('faq has been deleted!', 'error');
            return redirect()->route('faqs');
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
            if (!$user || !$user->hasPermissionByRole('edit faq')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            $faq = FAQ::find($id);
            $faq->status = 1;
            $faq->save();

            Alert::toast('faq has been activated!', 'success');
            return redirect()->route('faqs');
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
            if (!$user || !$user->hasPermissionByRole('edit faq')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            $faq = FAQ::find($id);
            $faq->status = 0;
            $faq->save();

            Alert::toast('faq has been inactivated!', 'error');
            return redirect()->route('faqs');
        } catch (\Exception $e) {
            // Handle exceptions or errors
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }
}
