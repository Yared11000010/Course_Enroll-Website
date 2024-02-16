<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContactUsController extends Controller
{
    //
     public function store(Request $request){


        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Create a new admin
            $contact = new Contact();
            $contact->name= $request->input('name');
            $contact->email = $request->input('email');
            $contact->subject =$request->input('subject');
            $contact->message=$request->input('message');
            $contact->save();
        Alert::toast('Your message successfully sent','success');
        return redirect()->back();
     }
}
