<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanDetail extends Model
{
    protected $table = 'peminjaman_details';
    protected $fillable = [
        'peminjaman_detail_id',
        'peminjaman_detail_peminjaman_id',
        'detail_buku_id',
        'tgl_pinjam', 
        'tgl_kembali',
        'status_peminjaman',
    ];

    public function DetailBuku()
    {
    	return $this->belongsTo(DetailBuku::class);
    }

    public function Peminjaman()
    {
    	return $this->hasMany(Peminjaman::class);
    }
}
