<?php

namespace Database\Seeders;

use App\Models\Jenis;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Jenis::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            'tenda', 'tas', 'perlengkapan survival', 'peralatan trekking', 'perlengkapan lainnya', 'perlengkapan tidur', 'alat penerangan', 'peralatan masak' 
        ];

        foreach ($data as $value){
            Jenis::insert([
                'name' => $value
            ]);
        }
    }
}
