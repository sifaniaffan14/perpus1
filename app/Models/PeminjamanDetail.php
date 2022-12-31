<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanDetail extends Model
{
    protected $fillable = ['peminjaman_id','detail_buku_id','tgl_pinjam', 'tgl_kembali'];

    public function DetailBuku()
    {
    	return $this->belongsTo(DetailBuku::class);
    }

    public function Peminjaman()
    {
    	return $this->hasMany(Peminjaman::class);
    }
}
