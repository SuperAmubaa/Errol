<?php

namespace App\Exports;

use App\Models\Peminjaman;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PeminjamanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Peminjaman::all();
        // $ar_pinjam = DB::table('peminjaman')
        // ->join('users', 'users.id', '=', 'peminjaman.user_id')
        // ->join('barang', 'barang.id', '=', 'peminjaman.barang_id')
        // ->select('peminjaman.*', 'users.name AS us', 'barang.nama AS br')
        
        // ->get();
        // return view('peminjaman.index', compact('ar_pinjam'));

        // $ar_pinjam = Peminjaman::all();
        // return view('peminjaman.index', compact('ar_pinjam'));
    }

    public function headings(): array
    {
        return[
            'user_id',
            'barang_id',
            'qty',
            'tgl_pinjam',
            'tgl_kembali',
            'status',
            'tgl_pengembalian',
            'denda_id',
            'tarif',
        ];
    }
    

}
