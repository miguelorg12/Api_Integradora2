<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\Validator;


class AnimalController extends Controller
{
    public function index(){
        $animals = Animal::all();
        return response()->json(['animals'=>$animals], 200);
    }
}
