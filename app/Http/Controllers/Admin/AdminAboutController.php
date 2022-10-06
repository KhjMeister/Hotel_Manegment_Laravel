<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;


class AdminAboutController extends Controller
{
    public function index()
    {
        $single_about = About::orderBy('id','desc')->first();

        return view('admin.about.view',compact('single_about'));
    }

    public function update(Request $request,$id) 
    {

        $about = About::where('id',$id)->first();

        $request->validate([
            'heading' => 'required',
            'content' => 'required',
            'status' => 'required',
        ]);
        
        $about->heading = $request->heading;
        $about->content = $request->content;
        $about->status = $request->status;
        $about->update();

        return redirect()->route('admin_about_view')->with('success','about is updated successfully.');
    }
}
