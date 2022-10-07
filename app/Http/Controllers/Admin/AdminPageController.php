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

        $about->about_status = $request->status;
        $about->update();

        return redirect()->route('admin_about_view')->with('success','About page is updated successfully.');
    }


    public function cart()
    {
        $single_cart = Page::orderBy('id','desc')->first();

        return view('admin.cart.view',compact('single_cart'));
    }

    public function cart_update(Request $request,$id) 
    {

        $cart = Page::where('id',$id)->first();

        $request->validate([
            'heading' => 'required',
            'status' => 'required',
        ]);
        
        $cart->cart_heading = $request->heading;
        $cart->cart_status = $request->status;
        $cart->update();

        return redirect()->route('admin_cart_view')->with('success','Cart page is updated successfully.');
    }

    public function checkout()
    {
        $single_checkout = Page::orderBy('id','desc')->first();

        return view('admin.checkout.view',compact('single_checkout'));
    }

    public function checkout_update(Request $request,$id) 
    {

        $checkout = Page::where('id',$id)->first();

        $request->validate([
            'heading' => 'required',
            'status' => 'required',
        ]);
        
        $checkout->checkout_heading = $request->heading;
        $checkout->checkout_status = $request->status;
        $checkout->update();

        return redirect()->route('admin_checkout_view')->with('success','checkout page is updated successfully.');
    }
    public function signin()
    {
        $single_signin = Page::orderBy('id','desc')->first();

        return view('admin.signin.view',compact('single_signin'));
    }

    public function signin_update(Request $request,$id) 
    {

        $signin = Page::where('id',$id)->first();

        $request->validate([
            'heading' => 'required',
            'status' => 'required',
        ]);
        
        $signin->signin_heading = $request->heading;
        $signin->signin_status = $request->status;
        $signin->update();

        return redirect()->route('admin_signin_view')->with('success','signin page is updated successfully.');
    }
    public function signup()
    {
        $single_signup = Page::orderBy('id','desc')->first();

        return view('admin.signup.view',compact('single_signup'));
    }

    public function signup_update(Request $request,$id) 
    {

        $signup = Page::where('id',$id)->first();

        $request->validate([
            'heading' => 'required',
            'status' => 'required',
        ]);
        
        $signup->signup_heading = $request->heading;
        $signup->signup_status = $request->status;
        $signup->update();

        return redirect()->route('admin_signup_view')->with('success','signup page is updated successfully.');
    }

    public function room()
    {
        $page_data = Page::where('id',1)->first();
        return view('admin.room.page', compact('page_data'));
    }

    public function room_update(Request $request)
    {
        $obj = Page::where('id',1)->first();
        $obj->room_heading = $request->room_heading;
        $obj->update();

        return redirect()->back()->with('success', 'Data is updated successfully.');
    }
}
