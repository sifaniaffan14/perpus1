<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $fillable = ['anggota_id'];

    public function Anggota()
    {
    	return $this->belongsTo(Anggota::class);
    }

    public function PeminjamanDetail()
    {
    	return $this->belongsTo(PeminjamanDetail::class);
    }
}
