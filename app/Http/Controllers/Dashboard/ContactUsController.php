<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ContactUsController extends Controller
{
    //
    public function index(){
        $user = Auth::guard('admin')->user();
        if (!$user || !$user->hasPermissionByRole('view contact message')) {
            Alert::toast('You dont have access to this page.','error');
            return redirect()->back();
        }
        $contacts=Contact::all();

        return view('contact.index',compact('contacts'));
    }

    public function delete($id){
        $user = Auth::guard('admin')->user();
        if (!$user || !$user->hasPermissionByRole('delete contact message')) {
            Alert::toast('You dont have access to this page.','error');
            return redirect()->back();
        }
        $contacts=Contact::findOrFail($id);
        if($contacts){
            $contacts->delete();
            Alert::toast('Contact message has been deleted','info');
            return redirect()->back();
        }else{
            Alert::toast("Something is wrong!",'error');
            return redirect()->back();
        }
    }
}
