<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lectura extends Model
{
    use HasFactory;
    protected $table = 'Lecturas';
    public function sensor_jaula(){
        return $this->belongsTo(Sensor_Jaula::class);
    }
    
}
