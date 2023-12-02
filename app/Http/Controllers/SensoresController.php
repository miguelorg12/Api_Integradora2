<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Adafruit\AdafruitController;
use App\Models\Sensores;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class SensoresController extends Controller
{
    public function storeTemperatura(){
        $adafruit = new AdafruitController();
        $jsonresponse = $adafruit->adafruitTemperatura();
        $sensor = new Sensores();
        $sensor -> nombre = "Temperatura";
        $sensor -> unidad = "°C";
        $sensor -> sensor_id = $jsonresponse['id'];
        $sensor -> save();
    }
    public function storeHumedad(){
        $adafruit = new AdafruitController();
        $jsonresponse = $adafruit->adafruitHumedad();
        $sensor = new Sensores();
        $sensor -> nombre = "Humedad";
        $sensor -> unidad = "%";
        $sensor -> sensor_id = $jsonresponse['id'];
        $sensor -> save();
    }

    public function storeLuz(){
        $adafruit = new AdafruitController();
        $jsonresponse = $adafruit->adafruitLuz();
        $sensor = new Sensores();
        $sensor -> nombre = "Luz";
        $sensor -> unidad = "raw";
        $sensor -> sensor_id = $jsonresponse['id'];
        $sensor -> save();
    }

    public function storeMovimiento(){
        $adafruit = new AdafruitController();
        $jsonresponse = $adafruit->adafruitMovimiento();
        $sensor = new Sensores();
        $sensor -> nombre = "Movimiento";
        $sensor -> unidad = "boolean";
        $sensor -> sensor_id = $jsonresponse['id'];
        $sensor -> save();
    }

    public function storeAcelerometro(){
        $adafruit = new AdafruitController();
        $jsonresponse = $adafruit->adafruitAcelerometro();
        $sensor = new Sensores();
        $sensor -> nombre = "Acelerometro";
        $sensor -> unidad = "m/s^2";
        $sensor -> sensor_id = $jsonresponse['id'];
        $sensor -> save();
    }

    public function storeUltrasonico(){
        $adafruit = new AdafruitController();
        $jsonresponse = $adafruit->adafruitUltrasonico();
        $sensor = new Sensores();
        $sensor -> nombre = "Ultrasonico";
        $sensor -> unidad = "cm";
        $sensor -> sensor_id = $jsonresponse['id'];
        $sensor -> save();
    }

    public function storeInfrarojo(){
        $adafruit = new AdafruitController();
        $jsonresponse = $adafruit->adafruitInfrarojo();
        $sensor = new Sensores();
        $sensor -> nombre = "Infrarojo";
        $sensor -> unidad = "cm";
        $sensor -> sensor_id = $jsonresponse['id'];
        $sensor -> save();
    }
}
