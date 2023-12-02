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
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Sin autorizacion, revise sus datos'], 401);
        }
        return $this->respondWithToken($token);
    }

    public function me(){
        return response()->json(auth()->user());
    }

    public function logout(){
        auth()->logout();
        return response()->json(['msg' => 'Sesion cerrada con exito'], 200);
    }

    public function refresh(){
        return $this->respondWithToken(Auth::refresh());
    }
    
    public function register(Request $request){
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|email|unique:users,email|max:255',
            'ApP' => 'required|string|max:255|min:3',
            'ApM' => 'required|string|max:255|min:3',
            'password'=> 'required|string|confirmed|min:8'
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
        return response()->json(['msg' => 'Usuario creado con exito','user'=>$user], 200);
    }

    public function respondWithToken($token){
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60,
        ]);
    }
}
