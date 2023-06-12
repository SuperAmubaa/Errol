<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Admin', 'Petugas', 'Anggota'
        ];

        foreach ($data as $value){
            Roles::insert([
                'name' => $value
            ]);
        }
    }
}
