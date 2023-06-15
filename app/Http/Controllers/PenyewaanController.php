<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Peminjaman;

class PenyewaanController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::all();
        return view('penyewaan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penyewaan.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        // $user_id = auth()->user()->id;

        // if ($this->barang->stok - $this->jumlah_pesanan < 0){
        //     $this->validasi = false;
        // } else {
        //     Pesanan::create([
        //         'id'    => $id,
        //         'users_id'          => $user_id,
        //         'barang_id'         => $barang_id,
        //         'tgl_pinjam'        => $this->tgl_pinjam,
        //         'tgl_kembali'       => $this->tgl_kembali,
                
        //     ]);
        //     return redirect ('/penyewaan');
        // }
        DB::table('peminjaman')->insert(
            [
                'id'=>$request->id,
                'user_id'=>$request->user_id,
                'barang_id'=>$request->barang_id,
                'tgl_pinjam'=>$request->tgl_pinjam,
                'tgl_kembali'=>$request->tgl_kembali,
                
            ]
            );
            return redirect ('/penyewaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
