<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;


class AboutController extends Controller
{
    public function index()
    {
        $single_about = About::orderBy('id','desc')->first();
        return view('front.about',compact('single_about'));

    }
}
