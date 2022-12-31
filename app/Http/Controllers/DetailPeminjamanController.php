<?php

namespace App\Http\Controllers;
use App\Models\Peminjaman;
use App\Models\PeminjamanDetail;
use Illuminate\Http\Request;

class DetailPeminjamanController extends Controller
{
    public function list(){
        $list=PeminjamanDetail::all();
        // return $list;
        return View('admin.layouts.Peminjaman.detailPeminjaman',['list'=>$list]);
    }   
    public function add(){
        $add=PeminjamanDetail::create([
            'peminjaman_id' => request()->peminjaman_id,
            'detail_buku_id' => request()->detail_buku_id,
        ]);
        return $add;
    }    
    public function update(Request $request){
        $update=PeminjamanDetail::find($request->id);
        $update->update($request->all());
        return $update;
    }
    public function delete($id){
        $delete=PeminjamanDetail::find($id);
        $delete->delete();
        return $delete;
    }

}
