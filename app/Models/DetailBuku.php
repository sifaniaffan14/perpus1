<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBuku extends Model
{
    protected $fillable = ['buku_id','KodeBuku', 'status', 'kondisi'];

    public function Buku()
    {
    	return $this->belongsTo(Buku::class, 'buku_id');
    }

    public function PeminjamanDetail()
    {
    	return $this->hasMany(PeminjamanDetail::class);
    }
}
