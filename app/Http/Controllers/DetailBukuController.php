<?php

namespace App\Http\Controllers;

use App\Models\DetailBuku;
use App\Models\Buku;
use App\Models\KategoriBuku;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;
use Picqer\Barcode\BarcodeGeneratorPNG;

class DetailBukuController extends Controller
{
    public function select()
    {
        try {
            if (isset($_GET['eksemplar_id'])) {
                $operation = DetailBuku::where('eksemplar_id', $_GET['eksemplar_id'])->where('is_active', 1)->get();
            } else {
                $operation = DetailBuku::where('is_active', 1)->get();
            }
            // $generator = new BarcodeGeneratorPNG();
            // $generator->getBarcode($code, $generator::TYPE_CODE_128), 200, ['Content-Type' => 'image/png'];
            return $this->response($operation);
        } catch (\Exception $e) {
            return $this->response($e->getMessage(), true);
        }
    }

    public function insert(Request $request)
    {
        try {
            $data = $request->all();
            $request->validate([
                'buku_id' => 'required',
                'no_panggil' => 'required',
                'status' => 'required',
                'kondisi' => 'required',
            ]);
            $kodeBuku = Buku::select('buku_kategori_id','kode_buku')->where('id', $data['buku_id'])->first();
            // $kodeKategori = Buku::select('buku_kategori_id','kode_buku')->where('id', $data['buku_id'])->first();
            $kodeKategori = KategoriBuku::select('kode_kategori')->where('id', $kodeBuku['buku_kategori_id'])->first();
            $data['no_panggil'] = $kodeKategori['kode_kategori'] . $kodeBuku['kode_buku']. $data['no_panggil'];
            // print_r($data['no_panggil']);exit;
            $uuid = Uuid::uuid5(Uuid::NAMESPACE_DNS, Str::random());
            $uuidString = md5($uuid->toString());
            $data['eksemplar_id'] = substr($uuidString, 0, 16);
            
            $operation = DetailBuku::create($data);
           
            return $this->responseCreate($operation);
        } catch (\Exception $e) {
            return $this->responseCreate($e->getMessage(), true);
        }
    }

    public function update(Request $request)
    {
        try {
            $data = $request->all();
            $request->validate([
                'buku_id' => 'required',
                'no_panggil' => 'required',
                'status' => 'required',
                'kondisi' => 'required',
            ]);
            unset($data['_token']);
            $operation = DetailBuku::where('eksemplar_id', $data['eksemplar_id'])->update($data);
            // $operation = $data->update($request->post());
            return $this->responseUpdate($operation);
        } catch (\Exception $e) {
            return $this->responseUpdate($e->getMessage(), true);
        }
    }

    public function delete(Request $request)
    {
        try {
            $data = $request->all();
            $data['is_active'] = 0;
            unset($data['_token']);
            $operation = DetailBuku::where('eksemplar_id', $data['eksemplar_id'])->update($data);
            // $operation = DB::table('detail_bukus')
            // ->where('eksemplar_id', '=', $data['eksemplar_id'])
            // ->update([
            //     'is_active' => '0'
            // ]);
            // print_r($operation);exit;
            return $this->responseDelete($operation);
        } catch (\Exception $e) {
            return $this->responseDelete($e->getMessage());
        }
    }

    public function kodeBarcode(){
        $kodeBarcode = KategoriBuku::select('kode', 'id')->where('is_active', 1)->orderBy('nama_kategori', 'asc')->get();
        return $this->response($kategori_buku);
    }
}
