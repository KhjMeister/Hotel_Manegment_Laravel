<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Feature;
use App\Models\Testimonial;
use App\Models\Faq;


class HomeController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::get();
        $faqs = Faq::get();
        $features = Feature::get();
        $slide = Slider::where('status',1)->first();
        return view('front.home',compact('slide','features','testimonials','faqs'));
    }
}
