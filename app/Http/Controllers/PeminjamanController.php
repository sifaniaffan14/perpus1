<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\PeminjamanDetail;
use App\Models\DetailBuku;
use App\Models\Buku;
use App\Models\Anggota;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function formPeminjaman()
    {
        return view('admin.layouts.peminjaman.formCreate');
    }

    public function index()
    {
        return view('admin.layouts.peminjaman.index');
    }

    public function select()
    {
        try {
            $where = array();
            if (isset($_GET['peminjaman_id'])) {
                $condition = ['peminjaman_id',$_GET['peminjaman_id']];
                array_push($where,$condition);
            } 

            $operation = Peminjaman::with('peminjaman_detail.detail_buku.buku')->withCount([
                'peminjaman_detail as peminjaman_jumlah',
                'peminjaman_detail as peminjaman_sudah_kembali' => function ($query) {
                    $query->where('status_peminjaman', '=', '2');
                },
                'peminjaman_detail as peminjaman_belum_kembali' => function ($query) {
                    $query->where('status_peminjaman', '!=', '2');
                }
            ])->with('anggota')->where($where)->get();
 
            return $this->response($operation);
        } catch (\Exception $e) {
            return $this->response($e->getMessage(), true);
        }
    }
    //     public function form(){
    //         // $detailbuku=Peminjaman::find(request()->id_buku);
    //         return view('admin.layouts.Peminjaman.peminjamanForm');
    // }
    public function insert(Request $request){
        try {
            $data = $request->all();
            $request->validate([
                'anggota_id'=> 'required',
                'tgl_pinjam'=> 'required',
                'tgl_kembali'=> 'required',
                'eksemplar_id.*'=> 'required',
            ]);
            DB::transaction(function () use ($data) {
                $uuid1 = Uuid::uuid5(Uuid::NAMESPACE_DNS, Str::random());
                $data['peminjaman_id'] = md5($uuid1->toString());
                $add = Peminjaman::create([
                    'peminjaman_id' => $data['peminjaman_id'],
                    'anggota_id' => $data['anggota_id'],
                ]);

                $detail['peminjaman_detail_peminjaman_id'] = $add['peminjaman_id'];
                // $detail['peminjaman_detail_id'] = $data['peminjaman_detail_id'];
                $detail['status_peminjaman'] = 1;
                $detail['tgl_pinjam'] = $data['tgl_pinjam'];
                $detail['tgl_kembali'] = $data['tgl_kembali'];
                // print_r($data);exit;
                foreach ($data['eksemplar_id'] as $key => $value) {
                    $uuid = Uuid::uuid5(Uuid::NAMESPACE_DNS, Str::random());
                    $data['peminjaman_detail_id'] = md5($uuid->toString());
                    $detail['peminjaman_detail_id'] = $data['peminjaman_detail_id'];
                    $detail['detail_buku_id'] = $value;
                    PeminjamanDetail::create($detail);

                    // Perubahan status buku menjadi dipinjam
                    DetailBuku::where('eksemplar_id',$value)->update([
                        'status' => 'dipinjam'
                    ]);
                }
            });

            $operation['success'] = true;
            return $this->responseCreate($operation);

        } catch (\Exception $e) {
            return $this->responseCreate($e->getMessage(),true);
        }
    }  

    public function update(Request $request)
    {
        try {
            $data = $request->all();

            $request->validate([
                'anggota_id'=> 'required',
                'tgl_pinjam'=> 'required',
                'tgl_kembali'=> 'required',
                'eksemplar_id.*'=> 'required',
            ]);
           
            DB::transaction(function () use ($data) {
                Peminjaman::where('peminjaman_id',$data['peminjaman_id'])->update([
                    'anggota_id' => $data['anggota_id'],
                ]);

                $peminjaman_detail = PeminjamanDetail::where('peminjaman_detail_peminjaman_id',$data['peminjaman_id'])->delete();
                
                $detail['peminjaman_detail_peminjaman_id'] = $data['peminjaman_id'];
                $detail['status_peminjaman'] = 1;
                $detail['tgl_pinjam'] = $data['tgl_pinjam'];
                $detail['tgl_kembali'] = $data['tgl_kembali'];
                foreach ($data['eksemplar_id'] as $key => $value) {
                    $uuid = Uuid::uuid5(Uuid::NAMESPACE_DNS, Str::random());
                    $data['peminjaman_detail_id'] = md5($uuid->toString());
                    $detail['peminjaman_detail_id'] = $data['peminjaman_detail_id'];
                    $detail['detail_buku_id'] = $value;
                    PeminjamanDetail::create($detail);
                }
            });

            $operation['success'] = true;
            return $this->responseUpdate($operation);
        } catch (\Exception $e) {
            return $this->responseUpdate($e->getMessage(), true);
        }
    }

    public function delete(Request $request)
    {
        try {
            $data = $request->all();
            DB::transaction(function () use ($data) {
                Peminjaman::where('peminjaman_id',$data['peminjaman_id'])->delete();
            });
            $operation['success'] = true;      
            return $this->responseDelete($operation);
        } catch (\Exception $e) {
            return $this->response($e->getMessage(), true);
        }
    }

    public function selectAnggota()
    {
        try {
            if (isset($_GET['id'])) {
                $peminjaman = Peminjaman::where("anggota_id", $_GET['id'])->orderBy("created_at", "asc")->first();
                // dd($peminjaman);
                $peminjamanDetail = [];
                if ($peminjaman != null){
                    $peminjaman = $peminjaman->toArray();
                    $peminjamanDetail = PeminjamanDetail::where("peminjaman_detail_peminjaman_id", $peminjaman['peminjaman_id'])
                                    ->whereNotIn('status_peminjaman', ['2'])->get()->toArray();
                }
                
                if ($peminjaman != null || $peminjamanDetail != []){
                    $operation = $peminjamanDetail;
                } else {
                    $operation = Anggota::where('id', $_GET['id'])->where('is_active', 1)->get();
                }
            } else {
                $operation = Anggota::where('is_active', 1)->get();
            }
            // $generator = new BarcodeGeneratorPNG();
            // $generator->getBarcode($code, $generator::TYPE_CODE_128), 200, ['Content-Type' => 'image/png'];
            return $this->response($operation);
        } catch (\Exception $e) {
            return $this->response($e->getMessage(), true);
        }
    }
    public function selectEksemplar()
    {  
        try {
            if (isset($_GET['no_panggil'])) {
                $detail_buku = DetailBuku::where('no_panggil', $_GET['no_panggil'])->get()->toArray();
                
                if ($detail_buku != []){
                    $peminjaman_detail = PeminjamanDetail::where('detail_buku_id', $detail_buku[0]['eksemplar_id'])
                                    ->whereNotIn('status_peminjaman', ['2'])
                                    ->get()->toArray();
                    if ($peminjaman_detail){
                        $operation = $peminjaman_detail;
                    } else {
                        $operation = db::select('SELECT detail_bukus.*,bukus.judul FROM `detail_bukus`
                        LEFT JOIN bukus
                        ON detail_bukus.buku_id = bukus.id
                        WHERE detail_bukus.no_panggil = "' . $_GET['no_panggil'] . '" AND detail_bukus.is_active = 1');
                    }
                    return $this->response($operation);
                } else {
                    $detail_buku['message'] = "Buku tidak ditemukan!";
                    return $this->response($detail_buku);
                }
            }
        } catch (\Exception $e) {
            return $this->response($e->getMessage(), true);
        }
    }

    public function getAnggota()
    {
        $anggota = Anggota::select('no_induk', 'id')->where('is_active', 1)->orderBy('no_induk', 'asc')->get();
        return $this->response($anggota);
    }

    public function detailPeminjaman(Request $request)
    {
        $peminjaman = Peminjaman::find($request->id);
        $detailPeminjaman = PeminjamanDetail::where('peminjaman_id', '=', $request->id)->get();
        return view('admin.layouts.Peminjaman.detailPeminjaman', ['peminjaman' => $peminjaman, 'detailPeminjaman' => $detailPeminjaman]);
        // return view('admin.layouts.Peminjaman.detailPeminjaman');
    }

    public function search(Request $request)
    {
        $cari = $request->no_induk;
        $anggota = Anggota::where('no_induk', 'LIKE', '%' . $cari . '%')->orWhere('nama', 'LIKE', '%' . $cari . '%')->get();
        return response()->json(['success' => true, 'anggota' => $anggota]);
    }

    public function findNoInduk(Request $request)
    {
        $data = $request->no_induk;
        $anggota = Anggota::where('no_induk', '=', $data)->first();
        $success = "false";

        if ($anggota) {
            $success = "true";
        }

        return response()->json([
            'success' => $success,
            'data' => $anggota
        ]);
    }

    public function findBukuEksemplar(Request $request)
    {
        $DetailBuku = DetailBuku::where('KodeBuku', '=', $request->kode)->where('status', '!=', 0)->first();

        if ($DetailBuku) {
            $Buku = Buku::select('judul')->where('id', '=', $DetailBuku['buku_id'])->first();
            $DetailBuku['judul'] = $Buku['judul'];
            $operation = array(
                'success' => true,
                'data' => $DetailBuku
            );
        } else {
            $operation = array(
                'success' => false
            );
        }

        return $operation;
    }
}
