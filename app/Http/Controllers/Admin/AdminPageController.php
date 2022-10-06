<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;


class AdminPageController extends Controller
{
    public function about()
    {
        $single_about = Page::orderBy('id','desc')->first();

        return view('admin.about.view',compact('single_about'));
    }

    public function about_update(Request $request,$id) 
    {

        $about = Page::where('id',$id)->first();

        $request->validate([
            'heading' => 'required',
            'content' => 'required',
            'status' => 'required',
        ]);
        
        $about->about_heading = $request->heading;
        $about->about_content = $request->content;
        $about->about_status = $request->status;
        $about->update();

        return redirect()->route('admin_about_view')->with('success','about is updated successfully.');
    }
}
