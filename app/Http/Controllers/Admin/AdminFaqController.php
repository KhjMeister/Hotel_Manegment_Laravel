<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;


class AdminFaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('id','desc')->get();

        return view('admin.faq.view',compact('faqs'));
    }
    public function create()
    {
        return view('admin.faq.add');
        
    }
    public function store(Request $request)
    {
        $faqs = Faq::get();
        $wordCount = $faqs->count();
        if ($wordCount==6) {
            return redirect()->back()->with('error','You already Have 6 of them first delete one to add another!');
        }
        $post = new Faq();
        $request->validate([
            'question' => 'required',
            'answer' => 'required',

        ]);
        
        $post->question = $request->question;
        $post->answer = $request->answer;
        $post->save();
        
        return redirect()->route('admin_faq_view')->with('success','Faq successfully Added!');
    }

    public function delete($id)
    {
        $faq = Faq::where('id',$id)->first();

        $post->delete();

        return redirect()->route('admin_faq_view')->with('success','Faq is deleted successfully.');
    }
    public function edit($id)
    {
        $single_faq = Faq::where('id',$id)->first();
        return view('admin.faq.edit', compact('single_faq'));
    }
    public function update(Request $request,$id) 
    {

        $post = Faq::where('id',$id)->first();

        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        $post->question = $request->question;
        $post->answer = $request->answer;

        $post->update();

        return redirect()->route('admin_faq_view')->with('success','faq is updated successfully.');
    }
}
