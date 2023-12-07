<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lectura;
use App\Models\Sensor_Jaula;
use App\Models\Jaula;

class LecturasController extends Controller
{
    public function storeLecturaTemperatura(){
        $lectura = new Lectura();
        $lectura->temperatura = request('temperatura');
        $lectura->sensor_jaula_id = request('sensor_jaula_id');
        $lectura->save();
        return $lectura;
    }
}
