<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    use HasFactory;
    // Mapping table.
    protected $table = 'denda';

    protected $fillable = [
        'jenis',
        'keterangan',
        'tarif',
    ];
    
    // public function pengembalian()
    //     {
    //         return $this->hasMany(Pengembalian::class);
    //     }
    public function peminjaman()
        {
            return $this->hasMany(Peminjaman::class);
        }
}

