<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_user = DB::table('users')
        ->join('roles', 'roles.id', '=', 'users.role_id')
        ->select('users.*', 'roles.name AS rol')
        
        ->get();
        return view('user/index', compact('ar_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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

        DB::table('users')->insert(
            [
                'id'=>$request->id,
                'name'=>$request->name,
                'email'=>$request->email,
                'password' => Hash::make($request->password),
                'role_id'=>$request->role_id,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'foto'=>$fileName,
            ]
            );
            return redirect ('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ar_user = DB::table('users')
        ->join('roles', 'roles.id', '=', 'users.role_id')
        ->select('users.*', 'roles.name AS rol')
        
        ->where('users.id','=',$id)
        ->get();

        return view('user.show',compact('ar_user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('users')->where('id',$id)
        ->get();

        return view('user/edit',
        compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!empty($request->foto)){
            $request->validate(
                ['foto'=> 'image|mimes:png,jpg|max:2048']
            );

            // $data_foto = barang::where('id',$id);
            // File::delete(public_path('foto'). '/'. $data_foto->foto);

            $fileName = $request->nama.'.'.$request->foto->extension();
            $request->foto->move(public_path('images'),$fileName);
            }else {
                $fileName = '';
            }

        DB::table('users')->where('id',$id)->update(
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'role_id'=>$request->role_id,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'foto'=>$fileName,
            ]
            );
            return redirect ('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('id',$id)->delete();

        return redirect('/user')->with('success', 'Barang Berhasil di Hapus!');
    }
}
