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
        'tgl_pinjam',
        'tgl_kembali',
        'status',
        
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

    public function update_status($status)
    {
        $this->db->where('status', $status);
        $this->db->update('peminjaman');

    }
}
