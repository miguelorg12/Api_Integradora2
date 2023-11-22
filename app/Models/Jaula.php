<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jaula extends Model
{
    use HasFactory;
    protected $table = 'Jaulas';
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function animal(){
        return $this->belongsTo(Animal::class);
    }
    public function sensor_jaulas(){
        return $this->hasMany(Sensor_Jaula::class);
    }
}
