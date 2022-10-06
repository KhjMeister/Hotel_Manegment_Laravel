<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class AdminTestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::get();
        return view('admin.testimonial.view',compact('testimonials'));
    }
    public function create()
    {
        return view('admin.testimonial.add');
        
    }
    public function store(Request $request)
    {
        $testimonials = Testimonial::get();
        $wordCount = $testimonials->count();
        if ($wordCount==3) {
            return redirect()->back()->with('error','You already Have 3 of them first delete one to add another!');
        }
        $testimonial = new Testimonial();
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'photo' => 'required'
        ]);
        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $ext = $request->file('photo')->extension();
            $final_name = date('YmdHis').'.'.$ext;

            $request->file('photo')->move(public_path('uploads/testimonials/'),$final_name);

            $testimonial->photo = $final_name;
        }
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        if ($request->comment) {
            $testimonial->comment = $request->comment;
        }

        $testimonial->save();
        
        return redirect()->route('admin_testimonial_view')->with('success','Testimonial successfully Added!');
    }

    public function delete($id)
    {
        $testimonial = Testimonial::where('id',$id)->first();

        if( file_exists(public_path('uploads/testimonials/'.$testimonial->photo)) AND !empty($testimonial->photo) ) {
            unlink(public_path('uploads/testimonials/'.$testimonial->photo));
        }

        $testimonial->delete();

        return redirect()->route('admin_testimonial_view')->with('success','Testimonial is deleted successfully.');
    }
    public function edit($id)
    {
        $single_testimonial = Testimonial::where('id',$id)->first();
        return view('admin.testimonial.edit', compact('single_testimonial'));
    }
    public function update(Request $request,$id) 
    {

        $testimonial = Testimonial::where('id',$id)->first();

        $request->validate([
            'name' => 'required',
            'designation' => 'required',
        ]);

        if($request->hasFile('photo'))
        {
            $request->validate([
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);


            if( file_exists(public_path('uploads/testimonials/'.$testimonial->photo)) AND !empty($testimonial->photo) ) {
                unlink(public_path('uploads/testimonials/'.$testimonial->photo));
            }

            $ext = $request->file('photo')->extension();
            $final_name = date('YmdHis').'.'.$ext;

            $request->file('photo')->move(public_path('uploads/testimonials/'),$final_name);

            $testimonial->photo = $final_name;
        }
        
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        if ($request->comment) {
            $testimonial->comment = $request->comment;
        }
        $testimonial->update();

        return redirect()->route('admin_testimonial_view')->with('success','Testimonial is updated successfully.');
    }
}
