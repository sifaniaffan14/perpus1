<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;

class RoleController extends Controller
{
    public function list(){
        $list=Roles::all();
        return $list;
    }
    public function add(){
        $add=Roles::create([
            'nama' => request()->nama,
        ]);
        return $add;
    }    
    public function update(Request $request){
        $update=Roles::find($request->id);
        $update->update($request->all());
        return $update;
    }
    public function delete($id){
        $delete=Roles::find($id);
        $delete->delete();
        return $delete;
    }
}
