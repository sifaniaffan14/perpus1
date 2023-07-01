<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;

class AnggotaProfileController extends Controller
{
    public function index()
    {
        return view('anggota.layouts.profile.index');
    }

}
