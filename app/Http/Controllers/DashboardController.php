<?php

namespace App\Http\Controllers;

use App\Models\AbsenPengunjung;
use App\Models\Anggota;
use App\Models\DetailBuku;
use App\Models\PeminjamanDetail;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin(){
        return view('admin/layouts/dashboard/index');
    }

    public function selectData()
    {
        try {
            $getBuku = DetailBuku::where('is_active', '=', '1')->count();
            $getPeminjaman = PeminjamanDetail::whereIn('status_peminjaman', ['1', '4'])->count();
            $getAbsen = AbsenPengunjung::count();
            $getAnggota = Anggota::where('is_active', '=', '1')->count();
            // return $this->response($operation);
            return response()->json([
                'getBuku' => $getBuku,
                'getPeminjaman' => $getPeminjaman,
                'getAbsen' => $getAbsen,
                'getAnggota' => $getAnggota,
            ]);
        } catch (\Exception $e) {
            return $this->response($e->getMessage(), true);
        }
    }
}
