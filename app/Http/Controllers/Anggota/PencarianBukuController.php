<?php

namespace App\Http\Controllers\Anggota;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\buku;

class PencarianBukuController extends Controller
{
    public function index()
    {
        return view('anggota.layouts.pencarianBuku.index');
    }
    
    public function selectBuku(){
        try {
            $operation = buku::join('kategori_bukus','bukus.buku_kategori_id','=','kategori_bukus.id')
                            ->where('bukus.is_active', '1')
                            ->where('kategori_bukus.is_active', '1')
                            ->select(
                                'bukus.*',
                                'kategori_bukus.nama_kategori'
                            )
                            ->get()->toArray();
     
            return $this->response($operation);
        } catch (\Exception $e) {
            return $this->response($e->getMessage(), true);
        }
    }

}
