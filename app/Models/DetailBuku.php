<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBuku extends Model
{
    protected $table = 'detail_bukus';

    protected $fillable = [
        'eksemplar_id',
        'buku_id',
        'no_panggil', 
        'status', 
        'kondisi',
        'barcode',
    ];

    public function Buku()
    {
    	return $this->belongsTo(Buku::class, 'buku_id');
    }

    public function PeminjamanDetail()
    {
    	return $this->hasMany(PeminjamanDetail::class);
    }
}
