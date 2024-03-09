<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\NewsLetter;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class NewsLettersController extends Controller
{
    //
    public function create()
    {
        try {
            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('send email to subscribers')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            $all_users = User::all();
            // dd($all_users);
            return view('newsletter.send_email_all_users', compact('all_users'));
        } catch (\Exception $e) {
            // Log or handle the exception as needed
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }

    public function send(Request $request)
    {
        try {
            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('send email to subscribers')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            if (!$request->method('post')) {                // Log or handle the exception as needed
                Alert::toast('something is wrong!!', 'error');
                return redirect()->back();
            }
            // dd($request->all());
            $newsletter = NewsLetter::get(); // Fetch all users (you may have a different way to fetch users)
            $subject = $request->input('subject');
            $message = $request->input('summernote');
            foreach ($newsletter as $newsletter) {
                Mail::to($newsletter->email)->send(new \App\Mail\NewsLetterEmail($subject, $message));
            }
            Alert::toast('Email sent to all users!', 'success');
            return redirect()->route('newslettersubscribers');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Laravel's built-in validation exception
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        } catch (\Exception $e) {
            // Log or handle the exception as needed
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }


    public function index()
    {
        try {
            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('view subscribers')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            $allnewsletter = NewsLetter::all()->toArray();
            return view('newsletter.allnewsletters', compact('allnewsletter'));
        } catch (\Exception $e) {
            // Log or handle the exception as needed
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }
    public function delete($id)
    {
        try {
            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('delete subscribers')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            $news = NewsLetter::find($id);
            $news->delete();
            Alert::toast('Newsletters has been deleted!', 'error');
            return redirect()->back();
        } catch (\Exception $e) {
            // Log or handle the exception as needed
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }

    public function active($id)
    {
        try {
            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('edit subscribers')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            $news = NewsLetter::find($id);
            $news->status = 1;
            $news->update();
            Alert::toast('Newsletters has been actived!', 'success');

            return redirect()->back();
        } catch (\Exception $e) {
            // Log or handle the exception as needed
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }
    public function inactive($id)
    {
        try {
            $user = Auth::guard('admin')->user();
            if (!$user || !$user->hasPermissionByRole('edit subscribers')) {
                Alert::toast('You dont have access to this page.','error');
                return redirect()->back();
            }
            $news = NewsLetter::find($id);
            $news->status = 0;
            $news->update();
            Alert::toast('Newsletters has been actived!', 'error');
            return redirect()->back();
        } catch (\Exception $e) {
            // Log or handle the exception as needed
            Alert::toast('something is wrong!!', 'error');
            return redirect()->back();
        }
    }
}
