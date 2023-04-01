<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use App\Models\DetailBuku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function list(){
        $buku=Buku::where('is_active','=',1)->get();
        return View('admin.layouts.Buku.bukuManagement',['list'=>$buku]);
    }
    
    public function detailBuku(Request $request){
        $detailbuku=Buku::find($request->id);
        $bukuEksemplar=DetailBuku::where('buku_id','=',$request->id)->get();
        return view('admin.layouts.Buku.detailBuku',['detailbuku'=>$detailbuku,'listEksemplar'=>$bukuEksemplar]);
    }

    public function form(){
            $detailbuku=Buku::find(request()->id_buku);
            return view('admin.layouts.Buku.bukuForm',['detailbuku'=>$detailbuku]);
    }

    public function formEdit(){
            $detailbuku=Buku::find(request()->id_buku);
            return view('admin.layouts.Buku.bukuForm',['detailbuku'=>$detailbuku]);
    }
    public function add(){
        $buku=Buku::updateOrCreate([
            'kategori_buku_id' => request()->kategori_buku_id,
            'NoPanggil' => request()->NoPanggil,
            'judul' => request()->judul,
            'penerbit' => request()->penerbit,
            'pengarang' => request()->pengarang,
            'halaman' => request()->halaman,
            'jumlah' => request()->jumlah,
        ]);
        // if($buku -> save()){
        //     return redirect('bukumanagement') -> with('status', 'Successfully Input Data');
        // }
        // else{
        //     return redirect()->back()-> with('status', 'fail to Input Data');
        // }
        return response()->json(['success' => true]);
        
        
    }    
    public function update(Request $request){
        $updateBuku=Buku::find($request->id);
        $updateBuku->update($request->all());
        return response()->json(['success' => true, 'updateBuku'=>$updateBuku]);
    }
    public function delete(Request $request){
        $detailbuku=Buku::where('id',$request->id);
        $data['is_active']='0';
        $detailbuku->update($data);
        return response()->json(['success' => true, 'detailbuku'=>$detailbuku]);
    }
    
}
