<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id','no_induk', 'nama', 'jenis_kelamin', 'TTL', 'jenis_anggota', 'alamat', 'email', 'no_telp'];
    
    public function User()
    {
    	return $this->belongsTo(User::class);
    }

    public function Peminjaman()
    {
    	return $this->hashMany(Peminjaman::class);
    }
}
