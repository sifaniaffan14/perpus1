<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list(){
        $list=User::where('is_active','=',1)->get();
        return $list;
    }
    public function add(){
        $add=User::create([
            'role_id' => request()->role_id,
            'username' => request()->username,
            'password' => bcrypt(request()->password),
        ]);
        return $add;
    }    
    public function delete($id){
        $update=User::find($id);
        $data['is_active']='0';
        $update->update($data);
        return $update;
    }
}
