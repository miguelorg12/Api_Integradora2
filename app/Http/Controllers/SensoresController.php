<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Adafruit\AdafruitController;
use App\Models\Sensor;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class SensoresController extends Controller
{
    public function storeTemperatura(){
        $sensor = Sensor::where('Name', 'Temperatura')->first();
        if($sensor){
        return $sensor->id;
        }
    }
    public function storeHumedad(){
        $sensor = Sensor::where('Name', 'Humedad')->first();
        if($sensor){
        return $sensor->id;
        }
    }
    public function storeLuz(){
        $sensor = Sensor::where('Name', 'Luz')->first();
        if($sensor){
        return $sensor->id;
        }
    }

    public function storeMovimiento(){
        $sensor = Sensor::where('Name', 'Movimiento')->first();
        if($sensor){
        return $sensor->id;
        }
    }
    public function storeUltrasonico(){
        $sensor = Sensor::where('Name', 'Ultrasonico')->first();
        if($sensor){
        return $sensor->id;
        }
    }
    public function storeAcelerometro(){
        $sensor = Sensor::where('Name', 'Acelerometro')->first();
        if($sensor){
        return $sensor->id;
        }
    }
    public function storeInfrarojo(){
        $sensor = Sensor::where('Name', 'Infrarojo')->first();
        if($sensor){
        return $sensor->id;
        }
    }
}
