<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate(6);

        return view('admin.post.view',compact('posts'));
    }
    public function create()
    {
        return view('admin.post.add');
        
    }
    public function store(Request $request)
    {
        $post = new Post();
        $request->validate([
            'heading' => 'required',
            'short_content' => 'required',
            'content' => 'required',
        ]);
        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $ext = $request->file('photo')->extension();
            $final_name = date('YmdHis').'.'.$ext;



            $request->file('photo')->move(public_path('uploads/posts/'),$final_name);

            $post->photo = $final_name;
        }
        $post->heading = $request->heading;
        $post->short_content = $request->short_content;
        $post->content = $request->content;

        $post->save();
        
        return redirect()->route('admin_post_view')->with('success','post successfully Added!');
    }

    public function delete($id)
    {
        $post = Post::where('id',$id)->first();

        if( file_exists(public_path('uploads/posts/'.$post->photo)) AND !empty($post->photo) ) {
            unlink(public_path('uploads/posts/'.$post->photo));
        }

        $post->delete();

        return redirect()->route('admin_post_view')->with('success','post is deleted successfully.');
    }
    public function edit($id)
    {
        $single_post = Post::where('id',$id)->first();
        return view('admin.post.edit', compact('single_post'));
    }
    public function update(Request $request,$id) 
    {

        $post = Post::where('id',$id)->first();

        $request->validate([
            'heading' => 'required',
            'short_content' => 'required',
            'content' => 'required',
        ]);

        if($request->hasFile('photo'))
        {
            $request->validate([
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);


            if( file_exists(public_path('uploads/posts/'.$post->photo)) AND !empty($post->photo) ) {
                unlink(public_path('uploads/posts/'.$post->photo));
            }

            $ext = $request->file('photo')->extension();
            $final_name = date('YmdHis').'.'.$ext;

            $request->file('photo')->move(public_path('uploads/posts/'),$final_name);

            $post->photo = $final_name;
        }
        
        $post->heading = $request->heading;
        $post->short_content = $request->short_content;
        $post->content = $request->content;
        
        $post->update();

        return redirect()->route('admin_post_view')->with('success','post is updated successfully.');
    }
}
