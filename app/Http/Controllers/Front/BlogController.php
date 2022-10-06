<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;


class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate(6);
        return view('front.blog.view_all',compact('posts'));
    }

    public function single($id)
    {
        $post = Post::where('id',$id)->first();
        $post->total_view = $post->total_view + 1;
        $post->update();
        return view('front.blog.view_single',compact('post'));
    }
}
