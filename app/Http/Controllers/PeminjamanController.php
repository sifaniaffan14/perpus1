<?php

namespace App\Http\Controllers;
use App\Models\Peminjaman;
use App\Models\PeminjamanDetail;
use App\Models\Anggota;


use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function list(Request $request){
        $list=Peminjaman::all();
        $detailPeminjaman=PeminjamanDetail::where('peminjaman_id','=',$request->id)->get();
        return View('admin.layouts.Peminjaman.peminjamanManagement',['list'=>$list,'detailPeminjaman'=>$detailPeminjaman]);
    }   
    public function form(){
        // $detailbuku=Peminjaman::find(request()->id_buku);
        return view('admin.layouts.Peminjaman.peminjamanForm');
}
    public function add(){
        $addPeminjaman=Peminjaman::create([
            'anggota_id' => request()->anggota_id,
        ]);
        if(isset($addPeminjaman)){
            $add=PeminjamanDetail::create([
                'detail_buku_id' => request()->detail_buku_id,
                'tgl_pinjam' => request()->tgl_pinjam,
                'tgl_kembali' => request()->tgl_kembali,
                'peminjaman_id' => $addPeminjaman->id,
            ]);
        }
        return $add;
    }    
    public function update(Request $request){
        $update=Peminjaman::find($request->id);
        $update->update($request->all());
        return $update;
    }
    public function delete($id){
        $delete=Peminjaman::find($id);
        $delete->delete();
        return $delete;
    }

    public function detailPeminjaman(Request $request){
        $peminjaman=Peminjaman::find($request->id);
        $detailPeminjaman=PeminjamanDetail::where('peminjaman_id','=',$request->id)->get();
        return view('admin.layouts.Peminjaman.detailPeminjaman',['peminjaman'=>$peminjaman,'detailPeminjaman'=>$detailPeminjaman]);
        // return view('admin.layouts.Peminjaman.detailPeminjaman');
    }

    public function search(Request $request){
        $cari = $request->no_induk;
        $anggota=Anggota::where('no_induk', 'LIKE', '%' . $cari . '%')->orWhere('nama', 'LIKE', '%' . $cari . '%')->get();
        return response()->json(['success' => true, 'anggota'=>$anggota]);
    }

}
