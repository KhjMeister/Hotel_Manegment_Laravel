<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\Websitemail;
use App\Models\Admin;
use Auth;
use Hash;

class AdminLoginController extends Controller
{
    public function index()
    {
        
        return view('admin.login');
    }
    public function forget_password()
    {
        return view('admin.forget_password');
    }
    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password

        ];

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin_home')->with('success','Wellcome Sir');
        } else {
            return redirect()->route('admin_login')->with('error','credential are not currect');
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin_login');
    }

    public function forget_password_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        $token = hash('sha256',time());

        $user = Admin::where('email',$request->email)->first();
        if(!$user) {
           return redirect()->back()->with('error','Email Dose Not Exist!');
        }

        $user->token = $token;
        $user->update();

        $reset_link = url('admin/reset-password/'.$token.'/'.$request->email);
        $subject = 'Reset Password';
        $message = 'Please click on the following link: <br><a href="'.$reset_link.'">Click here</a>';

        \Mail::to($request->email)->send(new Websitemail($subject,$message));

        return redirect()->back()->with('success','pls check your email and follow steps there!');
    }

    public function reset_password($token,$email)
    {
        $user = Admin::where('token',$token)->where('email',$email)->first();
        if(!$user) {
            return redirect()->route('admin_login')->with('error','User dose not exist!');
        }

        return view('admin.reset_password', compact('token','email'));

    }

    public function reset_password_submit(Request $request)
    {
        $user = Admin::where('token', $request->token)->where('email', $request->email)->first();

        $user->token = '';
        $user->password = Hash::make($request->new_password);
        $user->update();

        return redirect()->route('admin_login')->with('success','Password has been Reset');


    }
}
