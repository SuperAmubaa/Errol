<?php

namespace App\Exports;

use App\Models\Peminjaman;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PeminjamanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Peminjaman::all();
        $ar_pinjam = Peminjaman::all();
        return view('peminjaman.index', compact('ar_pinjam'));
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
