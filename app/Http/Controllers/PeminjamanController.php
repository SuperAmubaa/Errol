<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// use App\Models\User;
// use App\Models\Barang;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $ar_pinjam = Peminjaman::all();

        return view('peminjaman.index', compact('ar_pinjam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    // public function updateStatus($id)
    // {
    
    // $ar_pinjam = DB::table('peminjaman')->where('id', $id);
    // $ar_pinjam->update([
    //     'status' => 'kembali',
    // ]);
    // return redirect ('/peminjaman');

    // }



    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     //
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
        $ar_pinjam = Peminjaman::where('id',$id)->get();

        return view('peminjaman/edit',
        compact('ar_pinjam'));
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
        DB::table('peminjaman')->where('id',$id)->update(
            [

                'status'=>$request->status,
                'tgl_pengembalian'=>$request->tgl_pengembalian,
                'denda'=>$request->denda,
                'tarif'=>$request->tarif,

            ]
            );
            return redirect ('/peminjaman')->with('success', 'Peminjaman Telah Berhasil Diperbarui');
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
