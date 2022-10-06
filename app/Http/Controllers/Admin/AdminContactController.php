<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Page;

class AdminContactController extends Controller

{
    public function index()
    {
        $contacts = Contact::orderBy('id','desc')->get();
        $single_contact = Page::orderBy('id','desc')->first();
        return view('admin.contact.view',compact('contacts','single_contact'));
    }

    public function delete($id)
    {
        $contact = Contact::where('id',$id)->first();

        $contact->delete();

        return redirect()->route('admin_contact_view')->with('success','Message is deleted successfully.');
    }
    public function update(Request $request,$id) 
    {

        $contact = Page::where('id',$id)->first();

        $request->validate([
            'contact_heading' => 'required',
            'contact_location' => 'required',
            'contact_email' => 'required',
            'contact_status' => 'required',
        ]);
        
        $contact->contact_heading = $request->contact_heading;
        $contact->contact_location = $request->contact_location;
        $contact->contact_email = $request->contact_email;
        $contact->contact_status = $request->contact_status;
        $contact->update();

        return redirect()->route('admin_contact_view')->with('success','contact is updated successfully.');
    }
    
}
