<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;


class AboutController extends Controller
{
    public function index()
    {
        $single_about = Page::orderBy('id','desc')->first();
        return view('front.about',compact('single_about'));

    }
}
