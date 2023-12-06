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
        $adafruit = new AdafruitController();
        $jsonresponse = $adafruit->adafruitTemperatura();
        $data = $jsonresponse -> getData(true);
        $existingsensor = Sensor::where('sensor_id', $data['id'])->exists();
        if($existingsensor){
            $newSensorId = rand(1000000, 9999999);
        }
        else{
            $newSensorId = $data['id'];
        }
        $sensor = new Sensor();
        $sensor -> Name = "Temperatura";
        $sensor -> unidad = "°C";
        $sensor -> sensor_id = $newSensorId;
        $sensor -> save();
        return $sensor -> id;
    }
    public function storeHumedad(){
        $adafruit = new AdafruitController();
        $jsonresponse = $adafruit->adafruitHumedad();
        $data = $jsonresponse -> getData(true);
        $existingsensor = Sensor::where('sensor_id', $data['id'])->exists();
        if($existingsensor){
            $newSensorId = rand(1000000, 9999999);
        }
        else{
            $newSensorId = $data['id'];
        }
        $sensor = new Sensor();
        $sensor -> Name = "Humedad";
        $sensor -> unidad = "%";
        $sensor -> sensor_id = $newSensorId;
        $sensor -> save();
        return $sensor -> id;
    }
    public function storeLuz(){
        $adafruit = new AdafruitController();
        $jsonresponse = $adafruit->adafruitLuz();
        $data = $jsonresponse -> getData(true);
        $existingsensor = Sensor::where('sensor_id', $data['id'])->exists();
        if($existingsensor){
            $newSensorId = rand(1000000, 9999999);
        }
        else{
            $newSensorId = $data['id'];
        }
        $sensor = new Sensor();
        $sensor -> Name = "Luz";
        $sensor -> unidad = "raw";
        $sensor -> sensor_id = $newSensorId;
        $sensor -> save();
        return $sensor -> id;
    }

    public function storeMovimiento(){
        $adafruit = new AdafruitController();
        $jsonresponse = $adafruit->adafruitMovimiento();
        $data = $jsonresponse -> getData(true);
        $existingsensor = Sensor::where('sensor_id', $data['id'])->exists();
        if($existingsensor){
            $newSensorId = rand(1000000, 9999999);
        }
        else{
            $newSensorId = $data['id'];
        }

        $sensor = new Sensor();
        $sensor -> Name = "Movimiento";
        $sensor -> unidad = "boolean";
        $sensor -> sensor_id = $newSensorId;
        $sensor -> save();
        return $sensor -> id;
    }
    public function storeUltrasonico(){
        $adafruit = new AdafruitController();
        $jsonresponse = $adafruit->adafruitUltrasonico(); //
        $data = $jsonresponse -> getData(true);
        $existingsensor = Sensor::where('sensor_id', $data['id'])->exists();
        if($existingsensor){
            $newSensorId = rand(1000000, 9999999);
        }
        else{
            $newSensorId = $data['id'];
        }

        $sensor = new Sensor();
        $sensor -> Name = "Ultrasonico";
        $sensor -> unidad = "cm";
        $sensor -> sensor_id = $newSensorId;
        $sensor -> save();
        return $sensor -> id;
    }
    /* public function storeAcelerometro(){
        $adafruit = new AdafruitController();
        $jsonresponse = $adafruit->adafruitAcelerometro();
        $data = $jsonresponse -> getData(true);
        $existingsensor = Sensor::where('sensor_id', $data['id'])->exists();
        if($existingsensor){
            $newSensorId = rand(1000000, 9999999);
        }
        else{
            $newSensorId = $data['id'];
        }

        $sensor = new Sensor();
        $sensor -> Name = "Acelerometro";
        $sensor -> unidad = "rpm";
        $sensor -> sensor_id = $newSensorId;
        $sensor -> save();
        return $sensor -> id;
    }

    public function storeInfrarojo(){
        $adafruit = new AdafruitController();
        $jsonresponse = $adafruit->adafruitInfrarojo();
        $data = $jsonresponse -> getData(true);
        $existingsensor = Sensor::where('sensor_id', $data['id'])->exists();
        if($existingsensor){
            $newSensorId = rand(1000000, 9999999);
        }
        else{
            $newSensorId = $data['id'];
        }
        $sensor = new Sensor();
        $sensor -> Name = "Infrarojo";
        $sensor -> unidad = "cm";
        $sensor -> sensor_id = $newSensorId;
        $sensor -> save();
        return $sensor -> id;
    }*/
}
