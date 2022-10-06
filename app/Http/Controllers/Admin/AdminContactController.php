<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class AdminContactController extends Controller

{
    public function index()
    {
        $contacts = Contact::orderBy('id','desc')->get();
        return view('admin.contact.view',compact('contacts'));
    }

    public function delete($id)
    {
        $contact = Contact::where('id',$id)->first();

        $contact->delete();

        return redirect()->route('admin_contact_view')->with('success','contact is deleted successfully.');
    }
    
}
