<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    // Mapping table.
    protected $table = 'peminjaman';

    protected $fillable = [
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
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class);
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
    public function denda()
    {
        return $this->belongsTo(Denda::class);
    }
   
}
