<?php

namespace App\Http\Controllers\Adafruit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class AdafruitController extends Controller
{
    public string $key = 'aio_lTPe292HT1a1HOc8WeaeFcc2cQwU';
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }

    public function adafruitTemperatura(){
        $response = Http::withHeaders([
            'X-AIO-Key' => "{$this->key}"
        ])->get('https://io.adafruit.com/api/v2/Emith14/feeds/temperatura');

        if($response->ok()){
            $data = $response->json();
            return response()->json(['Sensor'=>'Temperatura','msg'=>'Datos obtenidos con exito', 'last_value' => $data['last_value'], 'id' => $data['id']], $response->status());
        }
        else{
        return response()->json(['msg'=>'Error al obtener los datos', 'data' => $response->body()], $response->status());
        }
    }

    public function adafruitHumedad(){
        $response = Http::withHeaders([
            'X-AIO-Key' => "{$this->key}"
        ])->get('https://io.adafruit.com/api/v2/Emith14/feeds/humedad');

        if($response->ok()){
            $data = $response->json();
            return response()->json(['Sensor' => 'Humedad','msg'=>'Datos obtenidos con exito', 'last_value' => $data['last_value'], 'id' => $data['id']], $response->status());
        }
        else{
        return response()->json(['msg'=>'Error al obtener los datos', 'data' => $response->body()], $response->status());
        }
    }

    public function adafruitLuz(){
        $response = Http::withHeaders([
            'X-AIO-Key' => "{$this->key}"
        ])->get('https://io.adafruit.com/api/v2/Emith14/feeds/luzsensor');

        if($response->ok()){
            $data = $response->json();
            return response()->json(['Sensor' =>  'Luz','msg'=>'Datos obtenidos con exito', 'last_value' => $data['last_value'], 'id' => $data['id']], $response->status());
        }
        else{
        return response()->json(['msg'=>'Error al obtener los datos', 'data' => $response->body()], $response->status());
        }
    }

    public function adafruitMovimiento(){
        $response = Http::withHeaders([
            'X-AIO-Key' => "{$this->key}"
        ])->get('https://io.adafruit.com/api/v2/Emith14/feeds/movimien');

        if($response->ok()){
            $data = $response->json();
            return response()->json(['Sensor' => 'Movimiento','msg'=>'Datos obtenidos con exito', 'last_value' => $data['last_value'], 'id' => $data['id']], $response->status());
        }
        else{
        return response()->json(['msg'=>'Error al obtener los datos', 'data' => $response->body()], $response->status());
        }
    }

    public function adafruitInfrarojo(){
        $response = Http::withHeaders([
            'X-AIO-Key' => "{$this->key}"
        ])->get('https://io.adafruit.com/api/v2/Emith14/feeds/infrarojo');

        if($response->ok()){
            $data = $response->json();
            return response()->json(['Sensor' => 'Infrarojo','msg'=>'Datos obtenidos con exito', 'last_value' => $data['last_value'], 'id' => $data['id']], $response->status());
        }
        else{
        return response()->json(['msg'=>'Error al obtener los datos', 'data' => $response->body()], $response->status());
        }
    }

    public function adafruitAcelerometro(){
        $response = Http::withHeaders([
            'X-AIO-Key' => "{$this->key}"
        ])->get('https://io.adafruit.com/api/v2/Emith14/feeds/acelerometro');

        if($response->ok()){
            $data = $response->json();
            return response()->json(['Sensor' => 'Acelerometro', 'msg'=>'Datos obtenidos con exito', 'last_value' => $data['last_value'], 'id' => $data['id']], $response->status());
        }
        else{
        return response()->json(['msg'=>'Error al obtener los datos', 'data' => $response->body()], $response->status());
        }
    }

    public function adafruitUltrasonico(){
        $response = Http::withHeaders([
            'X-AIO-Key' => "{$this->key}"
        ])->get('https://io.adafruit.com/api/v2/Emith14/feeds/ultrasonico');

        if($response->ok()){
            $data = $response->json();
            return response()->json(['Sensor' => 'Ultrasonico','msg'=>'Datos obtenidos con exito', 'last_value' => $data['last_value'], 'id' => $data['id']], $response->status());
        }
        else{
        return response()->json(['msg'=>'Error al obtener los datos', 'data' => $response->body()], $response->status());
        }
    }
}
