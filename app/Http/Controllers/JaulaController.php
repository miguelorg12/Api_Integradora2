<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jaula;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\Validator;

class JaulaController extends Controller
{
    public function store(Request $request){
        $validate = Validator::make($request -> all(),[
            'name' => 'required|string|max:255|min:3',
            'id_user' => 'required|integer',
            'id_animal' => 'required|integer'
        ]);
        if($validate -> fails()){
            return response()->json(['msg' => 'Error al crear la jaula','errors' => $validate->errors()], 400);
        }
        $jaula = new Jaula();
        $jaula -> name = $request->name;
        $jaula -> id_user = $request->id_user;
        $jaula -> id_animal = $request->id_animal;
        $jaula -> save();
        return response()->json(['Jaula creada con exito'=>$jaula], 201);
    }
    public function show($id){
        $jaula = Jaula::find($id);
        if($jaula){
            return response()->json(['Datos de la jaula'=> $jaula], 200);
        }
        else{
            return response()->json(['msg'=>'No se encontro la jaula'], 404);
        }
    }
}
