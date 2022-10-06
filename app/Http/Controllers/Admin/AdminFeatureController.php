<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feature;

class AdminFeatureController extends Controller
{
    public function index()
    {
        $features = Feature::get();
        return view('admin.features.view',compact('features'));
    }
    public function create()
    {
        return view('admin.features.add');
        
    }
    public function store(Request $request)
    {
        $features = Feature::get();
        $wordCount = $features->count();
        if ($wordCount==4) {
            return redirect()->back()->with('error','You already Have 4 of them first delete one to add another!');
        }
        $feature = new Feature();
        $request->validate([
            'heading' => 'required'
        ]);
        if($request->hasFile('icon')) {
            $request->validate([
                'heading' => 'required',
                'icon' => 'required',
            ]);

            $ext = $request->file('icon')->extension();
            $final_name = date('YmdHis').'.'.$ext;



            $request->file('icon')->move(public_path('uploads/features/'),$final_name);

            $feature->icon = $final_name;
        }
        $feature->heading = $request->heading;
        if ($request->text) {
            $feature->text = $request->text;
        }

        $feature->save();
        
        return redirect()->route('admin_feature_view')->with('success','Feature successfully Added!');
    }

    public function delete($id)
    {
        $feature = Feature::where('id',$id)->first();

        if( file_exists(public_path('uploads/features/'.$feature->icon)) AND !empty($feature->icon) ) {
            unlink(public_path('uploads/features/'.$feature->icon));
        }

        $feature->delete();

        return redirect()->route('admin_feature_view')->with('success','Feature is deleted successfully.');
    }
    public function edit($id)
    {
        $single_feature = Feature::where('id',$id)->first();
        return view('admin.features.edit', compact('single_feature'));
    }
    public function update(Request $request,$id) 
    {

        $feature = Feature::where('id',$id)->first();

        $request->validate([
            'heading' => 'required',
        ]);

        if($request->hasFile('icon'))
        {
            $request->validate([
                'icon' => 'required'
            ]);


            if( file_exists(public_path('uploads/features/'.$feature->icon)) AND !empty($feature->icon) ) {
                unlink(public_path('uploads/features/'.$feature->icon));
            }

            $ext = $request->file('icon')->extension();
            $final_name = date('YmdHis').'.'.$ext;

            $request->file('icon')->move(public_path('uploads/features/'),$final_name);

            $feature->icon = $final_name;
        }
        
        $feature->heading = $request->heading;
        if ($request->text) {
            $feature->text = $request->text;
        }
        $feature->update();

        return redirect()->route('admin_feature_view')->with('success','Feature is updated successfully.');
    }
}
