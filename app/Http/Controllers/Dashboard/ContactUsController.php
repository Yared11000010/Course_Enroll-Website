<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContactUsController extends Controller
{
    //
    public function index(){

        $contacts=Contact::all();

        return view('contact.index',compact('contacts'));
    }

    public function delete($id){
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
