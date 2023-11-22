<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    use HasFactory;
    protected $table = 'Sensores';
    public function sensores_jaulas(){
        return $this->hasMany(Sensor_Jaula::class);
    }
}
