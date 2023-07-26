<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use App\Models\Peminjaman;

use Illuminate\Http\Request;
use App\Exports\PeminjamanExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

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


    public function updateStatus($id)
    {
    
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

                // 'id'=>$request->id,
                // 'user_id'=>$request->user_id,
                // 'barang_id'=>$request->barang_id,
                // 'tgl_pinjam'=>$request->tgl_pinjam,
                // 'tgl_kembali'=>$request->tgl_kembali,
                'status'=>$request->status,
                'tgl_pengembalian'=>$request->tgl_pengembalian,
                'denda'=>$request->denda,
                'tarif'=>$request->tarif,

            ]);



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

    public function peminjamanExcel()
    {
        return Excel::download(new PeminjamanExport, 'datapeminjaman.xlsx');
    }

    public function generatePDF()
    {
          // retreive all records from db
      $data = [
            'title' => 'Welcome to Ext Generate PDF',
            'date'  => date('m/d/y')
      ];

      // share data to view
      $pdf = PDF::loadView('peminjaman.myPDF', $data);

      // download PDF file with download method
      return $pdf->download('tesPDF.pdf');
    }

    public function peminjamanPDF()
    {
        $ar_pinjam = Peminjaman::all();
        // share data to view
        $pdf = PDF::loadView('peminjaman.daftarPeminjaman',['ar_pinjam'=>$ar_pinjam]);
        
        return $pdf->download('daftarPeminjaman.pdf');
    }
}
