<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjamen';

    protected $fillable = [
        'peminjaman_id',
        'anggota_id',
        'jumlah_peminjaman'
    ];

    public function Anggota()
    {
    	return $this->belongsTo(Anggota::class);
    }

    public function PeminjamanDetail()
    {
    	return $this->belongsTo(PeminjamanDetail::class);
    }
}
