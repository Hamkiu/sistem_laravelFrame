<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function verify(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // dd($request);
        
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'role'=>'admin'])){
            return redirect()->intended('/dashboard');
        }else if(Auth::guard('author')->attempt(['email' => $request->email, 'password' => $request->password, 'role'=>'author'])){
            return redirect()->intended('/dashboard');
        }else if(Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->intended('/dashboard');
        }else{
            return redirect(route('auth.index'))->with('error', 'Email or Password is Wrong');

        }
    }

    public function logout(){
        if(Auth::guard('user')->check()){
            Auth::guard('user')->logout();
        }else if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
        }else if(Auth::guard('author')->check()){
            Auth::guard('author')->logout();
        }
        return redirect(route('auth.index'));
    }
}
