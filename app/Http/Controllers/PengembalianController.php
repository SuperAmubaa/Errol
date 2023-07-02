<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $data = Pengembalian::all();
        // return view('pengembalian.index', compact('data'));

        $ar_pengembalian = DB::table('pengembalian')
        ->join('peminjaman', 'peminjaman.id', '=', 'pengembalian.peminjaman_id')
        ->join('denda', 'denda.id', '=', 'pengembalian.denda_id')
        ->join('users', 'users.id', '=', 'peminjaman.user_id')
        ->select('pengembalian.*', 'users.name AS us',  'denda.jenis AS jn')
        // ->select('pengembalian.*', 'peminjaman.user_id AS us',  'denda.jenis AS jn')
        
        ->get();
        return view('pengembalian.index', compact('ar_pengembalian'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('pengembalian.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('pengembalian')->insert(
            [
                'id'=>$request->id,
                'peminjaman_id'=>$request->peminjaman_id,
                'tgl_kembali'=>$request->tgl_kembali,
                'denda_id'=>$request->denda_id,
                'tarif'=>$request->tarif,
            ]
            );
            return redirect ('/pengembalian');
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
