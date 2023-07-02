<?php

namespace App\Http\Controllers;


use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
// use App\Models\User;
// use App\Models\Barang;
// use App\Models\Peminjaman;

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
        // $user = User::all();
        // $barang = Barang::all();
        // $piminjaman = Peminjaman::all();
        // return view('peminjaman.create', $data);

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

    public function riwayatPesanan()
    {
         $ar_pinjam = DB::table('peminjaman')
        ->join('users', 'users.id', '=', 'peminjaman.user_id')
        ->join('barang', 'barang.id', '=', 'peminjaman.barang_id')
        ->select('peminjaman.*', 'users.name AS us', 'barang.nama AS br')
        
        ->get();
        return view('penyewaan.riwayat', compact('ar_pinjam'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ar_pinjam = DB::table('peminjaman')
        ->join('users', 'users.id', '=', 'peminjaman.user_id')
        ->join('barang', 'barang.id', '=', 'peminjaman.barang_id')
        ->select('peminjaman.*', 'users.name AS us', 'barang.nama AS br')
        
        ->where('users.id','=',$id)
        ->get();

        return view('penyewaan.show',
        compact('ar_pinjam'));
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
