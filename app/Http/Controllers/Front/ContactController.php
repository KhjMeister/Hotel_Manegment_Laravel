<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('front.contact');
    }
    public function store(Request $request)
    {
        $contact = new Contact();
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ]);
        
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
       

        $contact->save();
        
        return redirect()->back()->with('success','Your Message successfully Sended!');
    }
}
