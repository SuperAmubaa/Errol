<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    // Mapping table.
    protected $table = 'barang';

    
    protected $fillable= [
        'kategori_id',
        'nama',
        'stok',
        'harga',
        'beli',
        'foto',
        
    ];
    public function peminjaman()
    {
        return $this->hasMany(Peminjamam::class);
    }
    
    public function kategori(){
        return $this->belongsTo(Kategori::class);
    } // fungsi diarahkan ke models Kategori dan berelasi one to many (satu kategori untuk banyak barang)
}
