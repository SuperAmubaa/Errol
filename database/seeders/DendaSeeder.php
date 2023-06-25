<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('denda')->insert([
            'jenis'=>'Tidak ada denda',
            'keterangan'=>'barang dikembalikan dengan semestinya',
            'tarif'=>'Rp.0',
        ],
        [
            'jenis'=>'Keterlambatan',
            'keterangan'=>'barang terlambat dikembalikan ',
            'tarif'=>'Rp.2000',
        ],
        [
            'jenis'=>'Kerusakan',
            'keterangan'=>'barang yang dikembalikan mengalami kerusakan saat disewa',
            'tarif'=>'Harga barang + Rp.50000',
        ],
        [
            'jenis'=>'Kehilangan',
            'keterangan'=>'barang hilang dan tidak dapat dikembalikan',
            'tarif'=>'Harga barang + Rp.100000',
        ]
    );
    }
}
