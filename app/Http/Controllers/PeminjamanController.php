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
        // $ar_pinjam = DB::table('peminjaman')
        // ->join('users', 'users.id', '=', 'peminjaman.user_id')
        // ->join('barang', 'barang.id', '=', 'peminjaman.barang_id')
        // ->select('peminjaman.*', 'users.name AS us', 'barang.nama AS br')
        
        // ->get();

        $ar_pinjam = Peminjaman::all();

        return view('peminjaman.index', compact('ar_pinjam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function updateStatus($id)
    {
    //    $ar_pinjam = \App\Peminjaman::findOrFail($id);
    //    $ar_pinjam->status = 'kembali';
    //    $ar_pinjam->save();
    //    return redirect ('/peminjaman');

    $ar_pinjam = DB::table('peminjaman')->where('id', $id);
    $ar_pinjam->update([
        'status' => 'kembali',
    ]);
    return redirect ('/peminjaman');

    }



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
        // DB::table('peminjaman')->insert(
        //     [
        //         'id'=>$request->id,
        //         'user_id'=>$request->user_id,
        //         'barang_id'=>$request->barang_id,
        //         'tgl_pinjam'=>$request->tgl_pinjam,
        //         'tgl_kembali'=>$request->tgl_kembali,
        //         'status'=>$request->status,
        //     ]
        //     );
        //     return redirect ('/peminjaman');
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
        $data = DB::table('peminjaman')->where('id',$id)
        ->get();

        return view('peminjaman/edit',
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
        DB::table('peminjaman')->where('id',$id)->update(
            [
                
                'id'=>$request->id,
                // 'user_id'=>$request->user_id,
                // 'barang_id'=>$request->barang_id,
                // 'tgl_pinjam'=>$request->tgl_pinjam,
                // 'tgl_kembali'=>$request->tgl_kembali,
                'status'=>$request->status,
                
            ]
            );
            return redirect ('/peminjaman');
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
