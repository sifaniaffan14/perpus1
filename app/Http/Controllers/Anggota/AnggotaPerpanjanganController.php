<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;

class AnggotaPerpanjanganController extends Controller
{
    public function index()
    {
        return view('anggota.layouts.perpanjangan.index');
    }
    
}
