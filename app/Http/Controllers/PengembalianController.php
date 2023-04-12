<?php

namespace App\Http\Controllers;

use App\Models\DetailBuku;
use App\Models\Peminjaman;
use App\Models\PeminjamanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengembalianController extends Controller
{
    public function index()
    {
        return view('admin.layouts.pengembalian.index');
    }

    public function select()
    {
        try {
            $where = array();
            if (isset($_GET['anggota_id'])) {
                $condition = ['anggota_id',$_GET['anggota_id']];
                array_push($where,$condition);
            } 

            $operation = Peminjaman::with('peminjaman_detail.detail_buku.buku','anggota')->where($where)->get();
 
            return $this->response($operation);
        } catch (\Exception $e) {
            return $this->response($e->getMessage(), true);
        }
    }

    public function select_eksemplar(){
        try {
            $where = array();
            if (isset($_GET['no_panggil'])) {
                $condition = ['no_panggil',$_GET['no_panggil']];
                array_push($where,$condition);
            } 

            $operation = DetailBuku::where($where)->get();
 
            return $this->response($operation);
        } catch (\Exception $e) {
            return $this->response($e->getMessage(), true);
        }
    }

    public function update(Request $request)
    {
        try {
            $data = $request->all();
            DB::transaction(function () use ($data) {   
                foreach ($data['eksemplar_id'] as $key => $value) {
                    $where = array(
                        ['peminjaman_detail_peminjaman_id',$data['peminjaman_id']],
                        ['detail_buku_id',$data['eksemplar_id']]
                    );
        
                    PeminjamanDetail::where($where)->update([
                        'status_peminjaman' => 2
                    ]);
                }
            });

            $operation['success'] = true;
            return $this->responseUpdate($operation);
        } catch (\Exception $e) {
            return $this->responseUpdate($e->getMessage(), true);
        }
    }
}
