<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Page;

class ContactController extends Controller
{
    public function index()
    {
        $single_contact = Page::orderBy('id','desc')->first();
        return view('front.contact',compact('single_contact'));
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
