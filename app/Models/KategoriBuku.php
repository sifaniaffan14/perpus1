<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBuku extends Model
{
    use HasFactory;
    protected $fillable = ['nama','is_active'];
    // protected $guarded =['id'];
    // protected $table='kategori_buku';

    public function Buku()
    {
    	return $this->hasMany(Buku::class);
    }
}
