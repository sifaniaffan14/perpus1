<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;

class CekPinjamanController extends Controller
{
    public function index()
    {
        return view('anggota.layouts.cekPeminjaman.index');
    }
    
}
