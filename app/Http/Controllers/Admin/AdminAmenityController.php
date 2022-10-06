<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAmenityController extends Controller
{
    public function index()
    {
        $amenities = Amenity::get();
        return view('admin.amenity.view', compact('amenities'));
    }

    public function add()
    {
        return view('admin.amenity.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $amenity = new Amenity();
        $amenity->name = $request->name;
        $amenity->save();

        return redirect()->back()->with('success', 'Amenity is added successfully.');

    }


    public function edit($id)
    {
        $amenity = Amenity::where('id',$id)->first();
        return view('admin.amenity.edit', compact('amenity'));
    }

    public function update(Request $request,$id) 
    {        
        $amenity = Amenity::where('id',$id)->first();
        $amenity->name = $request->name;
        $amenity->update();

        return redirect()->back()->with('success', 'Amenity is updated successfully.');
    }

    public function delete($id)
    {
        $amenity = Amenity::where('id',$id)->first();
        $amenity->delete();

        return redirect()->back()->with('success', 'Amenity is deleted successfully.');
    }
}
