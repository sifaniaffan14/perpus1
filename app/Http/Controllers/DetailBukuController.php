<?php

namespace App\Http\Controllers;
use App\Models\DetailBuku;
use App\Models\Buku;
use Illuminate\Http\Request;

class DetailBukuController extends Controller
{
    public function listEksemplar(Request $request){
        $bukuEksemplar=DetailBuku::where('buku_id','=',$request->id)->get();
        return response()->json(['success' => true, 'listEksemplar'=>$bukuEksemplar]);
    }

    public function add(){
        $add=DetailBuku::create([
            'buku_id' => request()->buku_id,
            'KodeBuku' => request()->KodeBuku,
            'status' => request()->status,
            'kondisi' => request()->kondisi,
        ]);
        return response()->json(['success' => true]);
    }   

    public function update(Request $request){
        // $update=DetailBuku::find($request->id);
        // $update->update($request->all());
        // return response()->json(['success' => true]);
        $where = array('id' => $request->id);
        $EksemplarBuku  = DetailBuku::where($where)->first();
        $EksemplarBuku->update($request->all());
        return response()->json(['success' => true, $EksemplarBuku]);
    }
    
    public function delete(Request $request){
        $delete=DetailBuku::find($request->id);
        $delete->delete();
        return response()->json(['success' => true]);
    }
}
