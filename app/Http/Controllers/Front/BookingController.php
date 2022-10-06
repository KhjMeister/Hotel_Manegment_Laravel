<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;


class BookingController extends Controller
{
    public function cart_view()
    {
        $single_cart = Page::orderBy('id','desc')->first();
        return view('front.cart',compact('single_cart'));
    }
    public function checkout()
    {
        $single_checkout = Page::orderBy('id','desc')->first();
        return view('front.checkout',compact('single_checkout'));
    }

    public function payment()
    {
        $single_payment = Page::orderBy('id','desc')->first();
        return view('front.payment',compact('single_payment'));
    }
}
