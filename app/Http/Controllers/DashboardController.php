<?php

namespace App\Http\Controllers;

use App\Models\AbsenPengunjung;
use App\Models\Anggota;
use App\Models\DetailBuku;
use App\Models\PeminjamanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function admin(){
        return view('admin/layouts/dashboard/index');
    }

    public function selectData()
    {
        try {
            $today = Carbon::today();
            $getBuku = DetailBuku::where('is_active', '=', '1')->count();
            $getPeminjaman = PeminjamanDetail::whereIn('status_peminjaman', ['1', '4'])->count();
            $getAbsenToday = AbsenPengunjung::whereDate('waktu', $today)->count();
            $getAbsen = AbsenPengunjung::count();
            $getAnggota = Anggota::where('is_active', '=', '1')->count();
            // return $this->response($operation);
            return response()->json([
                'getBuku' => $getBuku,
                'getPeminjaman' => $getPeminjaman,
                'getAbsen' => $getAbsen,
                'getAbsenToday' => $getAbsenToday,
                'getAnggota' => $getAnggota,
            ]);
        } catch (\Exception $e) {
            return $this->response($e->getMessage(), true);
        }
    }

    public function selectAbsensi()
    {
        try {
            $today = Carbon::today();
            $operation = DB::table("absen_pengunjungs")
                        ->join("anggotas","absen_pengunjungs.anggota_id","=","anggotas.id")
                        ->join("users", "anggotas.user_id", "=", "users.id") // Menambahkan join dengan tabel "users"
                        ->whereDate('absen_pengunjungs.waktu', $today)
                        ->orderBy('absen_pengunjungs.waktu','desc')
                        ->get();
            return $this->response($operation);
        } catch (\Exception $e) {
            return $this->response($e->getMessage(), true);
        }
    }
}
