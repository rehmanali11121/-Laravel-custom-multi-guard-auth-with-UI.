<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
class UserController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
        'name'=>'required',
        'email'=>'required|email|unique:users,email',
        'password'=>'required|min:6|max:15',
        'cpassword'=>'required|same:password',
        ],[
        'cpassword.required'=>'Confirm password field required.',
        'cpassword.same'=>'Confirm password field Must match with password field.'
        ]);
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $data=$user->save();
        if($data)
        {
            return back()->with('success','You have successfully Registered');
        }
        else
        {
            return back()->with('error','Registration Failed');
        }
    }
    public function doLogin(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required',
            ]);
            $check=$request->only('email','password');
           
            if(Auth::guard('web')->attempt($check))
            {
                return redirect()->route('user.home')->with('success','You have successfully Loged IN');
            }
            else
            {
                return back()->with('error','Login Failed');
            }
    }
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
