<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class AdminSlideController extends Controller
{
    public function index()
    {
        $slides = Slider::get();
        return view('admin.slider.view',compact('slides'));
    }
    public function create()
    {
        return view('admin.slider.add');
        
    }
    public function store(Request $request)
    {
        $slider = new Slider();
        $request->validate([
            'heading' => 'required'
        ]);
        if($request->hasFile('photo')) {
            $request->validate([
                'heading' => 'required',
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $ext = $request->file('photo')->extension();
            $final_name = date('YmdHis').'.'.$ext;



            $request->file('photo')->move(public_path('uploads/slides/'),$final_name);

            $slider->photo = $final_name;
        }
        $slider->heading = $request->heading;
        if ($request->text) {
            $slider->text = $request->text;
        }

        $slider->save();
        
        return redirect()->route('admin_slide_view')->with('success','Slider successfully Added!');
    }

    public function delete($id)
    {
        $slider = Slider::where('id',$id)->first();

        if( file_exists(public_path('uploads/slides/'.$slider->photo)) AND !empty($slider->photo) ) {
            unlink(public_path('uploads/slides/'.$slider->photo));
        }

        $slider->delete();

        return redirect()->route('admin_slide_view')->with('success','Slide is deleted successfully.');
    }
    public function edit($id)
    {
        $single_slide = Slider::where('id',$id)->first();
        return view('admin.slider.edit', compact('single_slide'));
    }
    public function update(Request $request,$id) 
    {

        $slider = Slider::where('id',$id)->first();

        $request->validate([
            'heading' => 'required',
        ]);

        if($request->hasFile('photo'))
        {
            $request->validate([
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);


            if( file_exists(public_path('uploads/slides/'.$slider->photo)) AND !empty($slider->photo) ) {
                unlink(public_path('uploads/slides/'.$slider->photo));
            }

            $ext = $request->file('photo')->extension();
            $final_name = date('YmdHis').'.'.$ext;

            $request->file('photo')->move(public_path('uploads/slides/'),$final_name);

            $slider->photo = $final_name;
        }
        
        $slider->heading = $request->heading;
        if ($request->text) {
            $slider->text = $request->text;
        }
        $slider->update();

        return redirect()->route('admin_slide_view')->with('success','Slide is updated successfully.');
    }
    
}
