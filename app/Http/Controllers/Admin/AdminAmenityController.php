<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Amenity;


class AdminAmenityController extends Controller
{
    public function index()
    {
        $amenities = Amenity::get();
        return view('admin.amenity.view', compact('amenities'));
    }

    public function create()
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

        return redirect()->route('admin_amenity_view')->with('success', 'Amenity is added successfully.');

    }


    public function edit($id)
    {
        $single_amenity = Amenity::where('id',$id)->first();
        return view('admin.amenity.edit', compact('single_amenity'));
    }

    public function update(Request $request,$id) 
    {        
        $amenity = Amenity::where('id',$id)->first();
        $amenity->name = $request->name;
        $amenity->update();

        return redirect()->route('admin_amenity_view')->with('success', 'Amenity is updated successfully.');
    }

    public function delete($id)
    {
        $amenity = Amenity::where('id',$id)->first();
        $amenity->delete();

        return redirect()->route('admin_amenity_view')->with('success', 'Amenity is deleted successfully.');
    }
}
