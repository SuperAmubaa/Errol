<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function daftar(Request $request)
    {
     
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Session::flash('status', 'success');
        Session::flash('message', 'Register success');
       return redirect('/login');
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
