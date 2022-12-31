<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;
    protected $fillable = ['kategori_buku_id','NoPanggil', 'judul', 'penerbit', 'pengarang', 'halaman', 'jumlah'];
    // protected $guarded =['id'];
    // protected $table='buku';

    public function KategoriBuku()
    {
    	return $this->belongsTo(KategoriBuku::class);
    }

    public function DetailBuku()
    {
    	return $this->hashMany(DetailBuku::class);
    }


}
