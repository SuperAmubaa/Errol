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
            // 'role' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
//role
        $role = null;
        if ($request->role_id === 1){
            $role = 1;
        }elseif ($request->role_id === 2){
            $role = 2;
        }else{
            $role = 3;
        }
//foto
        if(!empty($request->foto)){
            $request->validate(
                ['foto'=> 'image|mimes:png,jpg|max:2048',
                ]);
            $fileName = $request->nama.'.'
            .$request->foto->extension();
            $request->foto
            ->move(public_path('images'),$fileName);
            }else {
                $fileName = '';
            }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $role,
            'phone' => $request->phone,
            'address' => $request->address,
            'foto'=>$fileName,
        ]);

        Session::flash('status', 'success');
        Session::flash('message', 'Register success');
       return redirect('/login');
    }

}
