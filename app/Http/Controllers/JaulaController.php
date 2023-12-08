<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jaula;
use App\Models\Sensor;
use App\Models\Sensor_Jaula;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\SensoresController;
use Illuminate\Support\Facades\Auth;

class JaulaController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api', ['except' => []]);
    }
    public function store(Request $request){
        $validate = Validator::make($request -> all(),[
            'name' => 'required|string|max:255|min:3',
            'id_animal' => 'required|integer'
        ]);
        if($validate -> fails()){
            return response()->json(['msg' => 'Error al crear la jaula','errors' => $validate->errors()], 400);
        }
        $jaula = new Jaula();
        $jaula -> name = $request->name;
        $jaula -> id_user = Auth::user()->id;
        $jaula -> id_animal = $request->id_animal;
        $sensor = new SensoresController();
        $sensores = [
        $sensor -> storeTemperatura(),
        $sensor -> storeHumedad(),
        $sensor -> storeLuz(),
        $sensor -> storeAcelerometro(),
        $sensor -> storeMovimiento(),
        $sensor -> storeUltrasonico(),
        $sensor -> storeInfrarojo(),
        ];
        $jaula -> save();
        foreach($sensores as $sensor){
            $sensor_jaula = new Sensor_Jaula();
            $sensor_jaula -> id_sensor = $sensor;
            $sensor_jaula -> id_jaula = $jaula -> id;
            $sensor_jaula -> save();
        }
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
    public function showperUser(){
        $id = Auth::user()->id;
        $jaulas = Jaula::where('id_user', $id)->get();
        if($jaulas){
            return response()->json(['Jaulas del usuario'=> $jaulas], 200);
        }
        else{
            return response()->json(['msg'=>'No se encontro la jaula'], 404);
        }
    }
    
}
