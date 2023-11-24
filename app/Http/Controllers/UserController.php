<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return response()->json(['users'=>$users], 200);
    }
    
    public function show($id){
        $user = User::find($id);
        if($user){
            return response()->json(['user'=>$user], 200);
        }else{
            return response()->json(['msg'=>'No se encontro el usuario'], 404);
        }
    }
}
