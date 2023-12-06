<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;


class AnimalController extends Controller
{
    public function index(){
        $animals = Animal::all();
        return response()->json(['animals'=>$animals], 200);
    }
}
