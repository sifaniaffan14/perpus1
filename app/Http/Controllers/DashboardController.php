<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function anggota(){
        return view('anggota/layouts/dashboard');
    }

    public function admin(){
        return view('admin/layouts/dashboard/index');
    }
}
