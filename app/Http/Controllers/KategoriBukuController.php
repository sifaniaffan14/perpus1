<?php

namespace App\Http\Controllers;
use App\Models\KategoriBuku;

use Illuminate\Http\Request;

class KategoriBukuController extends Controller
{
    public function list(){
        $list=KategoriBuku::where('is_active','=',1)->get();
        return $list;
    }
    public function add(){
        KategoriBuku::create([
            'nama' => request()->nama,
        ]);
        return response()->json(['success' => true]);
    }    
    public function update(Request $request){

        $where = array('id' => $request->id);
        $kategori  = KategoriBuku::where($where)->first();
        $kategori->update($request->all());
        
        return response()->json($kategori);
    }
    public function delete(Request $request){
        
        $update=KategoriBuku::where('id',$request->id);
        $data['is_active']='0';
        $update->update($data);
        return response()->json(['success' => true]);
    }
    // public function delete(Request $request){
    //     KategoriBuku::where('id',$request->id)->delete();
        
    //     return response()->json(['success' => true]);
    // }
}
