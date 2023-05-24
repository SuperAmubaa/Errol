<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            
            if(Auth::user()->status != 'active'){
                Session::flash('status', 'failed');
                Session::flash('message', 'Your account is not active!');
                Auth::logout();
                return redirect('/login');
            }
            // if(Auth::user()->role_id == 1) {
            //     return redirect('dashboard');
            // }

            // if(Auth::user()->role_id == 2) {
            //     return redirect('profile');
            // }
            
            
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'gagal login');
        Auth::logout();
        return redirect('/login');
    }
}
