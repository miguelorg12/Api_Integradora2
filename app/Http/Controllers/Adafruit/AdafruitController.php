<?php

namespace App\Http\Controllers\Adafruit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use App\Models\Lectura;
use App\Models\Sensor;
use App\Models\Sensor_Jaula;

class AdafruitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }

    public function adafruitSensores($id_jaula){
        $sensores = ['temperatura', 'humedad', 'luzsensor', 'rpm', 'ultrasonico', 'movimien', 'ultrasonico']; 
        $resultados = [];
        foreach ($sensores as $sensor) {
            $response = Http::withHeaders([
                'X-AIO-Key' => env('ADAFRUIT_IO_KEY')
            ])->get("https://io.adafruit.com/api/v2/Emith14/feeds/{$sensor}");
    
            if($response->ok()){
                $data = $response->json();
                $sensor_db = Sensor::where('sensor_id', $data['id'])->first();
                $lectura = new Lectura();
                $sensor_jaula = Sensor_Jaula::where('id_sensor', $sensor_db->id)->where('id_jaula', $id_jaula)->first();
                $lectura->id_sensor_jaula = $sensor_jaula['id'];
                $lectura->valor = $data['last_value'];
                $lectura->Fecha_Hora = now();
                $lectura->save();
                $resultados[] = ['Sensor'=>$sensor,'msg'=>'Datos obtenidos con exito', 'last_value' => $data['last_value'], 'id' => $data['id']];
            }
            else{
                $resultados[] = ['Sensor'=>$sensor,'msg'=>'Error al obtener los datos', 'data' => $response->body()];
            }
        }
    
        return response()->json($resultados);
    }

    public function adafruitTemperatura($id_jaula){
        $response = Http::withHeaders([
            'X-AIO-Key' => env('ADAFRUIT_IO_KEY')
        ])->get('https://io.adafruit.com/api/v2/Emith14/feeds/temperatura');

        if($response->ok()){
            $data = $response->json();
            $sensor = Sensor::where('sensor_id', $data['id'])->first();
            $lectura = new Lectura();
            $sensor_jaula = Sensor_Jaula::where('id_sensor', $sensor->id)->where('id_jaula', $id_jaula)->first();
            $lectura->id_sensor_jaula = $sensor_jaula['id'];
            $lectura->valor = $data['last_value'];
            $lectura->Fecha_Hora = now();
            $lectura->save();
            return response()->json(['Sensor'=>'Temperatura','msg'=>'Datos obtenidos con exito', 'last_value' => $data['last_value'], 'id' => $data['id']], $response->status());
        }
        else{
        return response()->json(['msg'=>'Error al obtener los datos', 'data' => $response->body()], $response->status());
        }
    }

    public function adafruitHumedad($id_jaula){
        $response = Http::withHeaders([
            'X-AIO-Key' => env('ADAFRUIT_IO_KEY')
        ])->get('https://io.adafruit.com/api/v2/Emith14/feeds/humedad');

        if($response->ok()){
            $data = $response->json();
            $sensor = Sensor::where('sensor_id', $data['id'])->first();
            $lectura = new Lectura();
            $sensor_jaula = Sensor_Jaula::where('id_sensor', $sensor->id)->where('id_jaula', $id_jaula)->first();
            $lectura->id_sensor_jaula = $sensor_jaula['id'];
            $lectura->valor = $data['last_value'];
            $lectura->Fecha_Hora = now();
            $lectura->save();
            return response()->json(['Sensor' => 'Humedad','msg'=>'Datos obtenidos con exito', 'last_value' => $data['last_value'], 'id' => $data['id']], $response->status());
        }
        else{
        return response()->json(['msg'=>'Error al obtener los datos', 'data' => $response->body()], $response->status());
        }
    }

    public function adafruitLuz($id_jaula){
        $response = Http::withHeaders([
            'X-AIO-Key' => env('ADAFRUIT_IO_KEY')
        ])->get('https://io.adafruit.com/api/v2/Emith14/feeds/luzsensor');

        if($response->ok()){
            $data = $response->json();
            $sensor = Sensor::where('sensor_id', $data['id'])->first();
            $lectura = new Lectura();
            $sensor_jaula = Sensor_Jaula::where('id_sensor', $sensor->id)->where('id_jaula', $id_jaula)->first();
            $lectura->id_sensor_jaula = $sensor_jaula['id'];
            $lectura->valor = $data['last_value'];
            $lectura->Fecha_Hora = now();
            $lectura->save();
            return response()->json(['Sensor' =>  'Luz','msg'=>'Datos obtenidos con exito', 'last_value' => $data['last_value'], 'id' => $data['id']], $response->status());
        }
        else{
        return response()->json(['msg'=>'Error al obtener los datos', 'data' => $response->body()], $response->status());
        }
    }

    public function adafruitMovimiento($id_jaula){
        $response = Http::withHeaders([
            'X-AIO-Key' => env('ADAFRUIT_IO_KEY')
        ])->get('https://io.adafruit.com/api/v2/Emith14/feeds/movimien');

        if($response->ok()){
            $data = $response->json();
            $sensor = Sensor::where('sensor_id', $data['id'])->first();
            $lectura = new Lectura();
            $sensor_jaula = Sensor_Jaula::where('id_sensor', $sensor->id)->where('id_jaula', $id_jaula)->first();
            $lectura->id_sensor_jaula = $sensor_jaula['id'];
            $lectura->valor = $data['last_value'];
            $lectura->Fecha_Hora = now();
            $lectura->save();
            return response()->json(['Sensor' => 'Movimiento','msg'=>'Datos obtenidos con exito', 'last_value' => $data['last_value'], 'id' => $data['id']], $response->status());
        }
        else{
        return response()->json(['msg'=>'Error al obtener los datos', 'data' => $response->body()], $response->status());
        }
    }

    public function adafruitInfrarojo($id_jaula){
        $response = Http::withHeaders([
            'X-AIO-Key' => env('ADAFRUIT_IO_KEY')
        ])->get('https://io.adafruit.com/api/v2/Emith14/feeds/infrarrojo');

        if($response->ok()){
            $data = $response->json();
            $sensor = Sensor::where('sensor_id', $data['id'])->first();
            $lectura = new Lectura();
            $sensor_jaula = Sensor_Jaula::where('id_sensor', $sensor->id)->where('id_jaula', $id_jaula)->first();
            $lectura->id_sensor_jaula = $sensor_jaula['id'];
            $lectura->valor = $data['last_value'];
            $lectura->Fecha_Hora = now();
            $lectura->save();
            return response()->json(['Sensor' => 'Infrarojo','msg'=>'Datos obtenidos con exito', 'last_value' => $data['last_value'], 'id' => $data['id']], $response->status());
        }
        else{
        return response()->json(['msg'=>'Error al obtener los datos', 'data' => $response->body()], $response->status());
        }
    }

    public function adafruitAcelerometro($id_jaula){
        $response = Http::withHeaders([
            'X-AIO-Key' => env('ADAFRUIT_IO_KEY')
        ])->get('https://io.adafruit.com/api/v2/Emith14/feeds/rpm');

        if($response->ok()){
            $data = $response->json();
            $sensor = Sensor::where('sensor_id', $data['id'])->first();
            $lectura = new Lectura();
            $sensor_jaula = Sensor_Jaula::where('id_sensor', $sensor->id)->where('id_jaula', $id_jaula)->first();
            $lectura->id_sensor_jaula = $sensor_jaula['id'];
            $lectura->valor = $data['last_value'];
            $lectura->Fecha_Hora = now();
            $lectura->save();
            return response()->json(['Sensor' => 'Acelerometro', 'msg'=>'Datos obtenidos con exito', 'last_value' => $data['last_value'], 'id' => $data['id']], $response->status());
        }
        else{
        return response()->json(['msg'=>'Error al obtener los datos', 'data' => $response->body()], $response->status());
        }
    }

    public function adafruitUltrasonico($id_jaula){
        $response = Http::withHeaders([
            'X-AIO-Key' => env('ADAFRUIT_IO_KEY')
        ])->get('https://io.adafruit.com/api/v2/Emith14/feeds/ultrasonico');

        if($response->ok()){
            $data = $response->json();
            $sensor = Sensor::where('sensor_id', $data['id'])->first();
            $lectura = new Lectura();
            $sensor_jaula = Sensor_Jaula::where('id_sensor', $sensor->id)->where('id_jaula', $id_jaula)->first();
            $lectura->id_sensor_jaula = $sensor_jaula['id'];
            $lectura->valor = $data['last_value'];
            $lectura->Fecha_Hora = now();
            $lectura->save();
            return response()->json(['Sensor' => 'Ultrasonico','msg'=>'Datos obtenidos con exito', 'last_value' => $data['last_value'], 'id' => $data['id']], $response->status());
        }
        else{
        return response()->json(['msg'=>'Error al obtener los datos', 'data' => $response->body()], $response->status());
        }
    }
}
