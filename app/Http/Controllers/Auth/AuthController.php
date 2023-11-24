<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request){
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|email|unique:users,email|max:255',
            'ApP' => 'required|string|max:255|min:3',
            'ApM' => 'required|string|max:255|min:3',
            'password'=> 'required|string|confirmed'
        ]);
        if($validate->fails()){
            return response()->json(['errors' => $validate->errors()], 400);
        }
        $user = new User();
        $user -> name =  $request->name;
        $user -> email= $request->email;
        $user -> ApP = $request->ApP;
        $user -> ApM = $request->ApM;
        $user -> password = Hash::make($request->password); 
        $user->save();
        if(!$token = Auth::attempt($request->only('email','password'))){
            return response()->json(['msg' => 'Error al crear el usuario'], 401);
        }
        return response()->json(['msg' => 'Usuario creado con exito','token' => $this->respondWithToken($token),'user'=>$user], 200);
    }
    
    public function respondWithToken($token){
        return $token;
    }
}
