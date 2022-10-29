<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

class AdminController extends Controller
{
    public function doLogin(Request $request)
    {
        $request->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required',
            ]);
            $check=$request->only('email','password');
           
            if(Auth::guard('admin')->attempt($check))
            {
                return redirect()->route('admin.home')->with('success','You have successfully Logged in');
            }
            else
            {
                return back()->with('error','Login Failed');
            }
     

    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
