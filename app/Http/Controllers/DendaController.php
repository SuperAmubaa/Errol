<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Denda;

class DendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_denda = DB::table('denda')->get();
        return view('denda.index', compact('ar_denda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('denda.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('denda')->insert(
            [
                'id'=>$request->id,
                'jenis'=>$request->jenis,
                'keterangan'=>$request->keterangan,
                'tarif'=>$request->tarif,
            ]
            );
            return redirect ('/denda')->with('success', 'Denda Baru Telah di Tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ar_denda = DB::table('denda')
        ->where('id','=',$id)
        ->get();

        return view('denda.show',
        compact('ar_denda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('denda')->where('id',$id)
        ->get();

        return view('denda/edit',
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
        DB::table('denda')->where('id',$id)->update(
            [
                'id'=>$request->id,
                'jenis'=>$request->jenis,
                'keterangan'=>$request->keterangan,
                'tarif'=>$request->tarif,
            ]
            );
            return redirect ('/denda')->with('success', 'Denda Berhasil di Ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('denda')->where('id',$id)->delete();

        return redirect('/denda')->with('success', 'Denda Berhasil Di Hapus!');
    }
}
