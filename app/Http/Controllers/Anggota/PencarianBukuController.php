<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;

class PencarianBukuController extends Controller
{
    public function index()
    {
        return view('anggota.layouts.pencarianBuku.index');
    }
    
}
