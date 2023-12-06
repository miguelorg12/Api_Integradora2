<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor_Jaula extends Model
{
    use HasFactory;
    protected $table = 'Sensores_Jaula';
    public $timestamps = false;
    public function jaula(){
        return $this->belongsTo(Jaula::class);
    }
    public function sensor(){
        return $this->belongsTo(Sensor::class);
    }
    public function lecturas(){
        return $this->hasMany(Lectura::class);
    }

}
