<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Feature;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\Room;


class HomeController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::get();
        $rooms = Room::orderBy('id','desc')->paginate(4);
        $faqs = Faq::get();
        $features = Feature::get();
        $slide = Slider::where('status',1)->first();
        return view('front.home',compact('slide','features','testimonials','faqs','rooms'));
    }
}
