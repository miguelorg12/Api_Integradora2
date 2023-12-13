<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\ValidatorEmail;
use Illuminate\Support\Facades\URL;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'activate']]);
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
        $signed_route = URL::temporarySignedRoute(
            'activate', 
            now()->addMinutes(30), 
            ['user' => $user->id]);
        Mail::to($request->email)->send(new ValidatorEmail($signed_route));
        return response()->json(['msg' => 'Registro exitoso, revisar su correo','user'=>$user], 200);
    }
    public function activate(User $user){
        $user -> is_active = true;
        $user -> save();
        return '<!DOCTYPE html>
        <html>
        <head>
            <title>Activar cuenta</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f2f2f2;
                    padding: 20px;
                }
        
                .container {
                    max-width: 400px;
                    margin: 0 auto;
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 10px;
                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                }
        
                h1 {
                    color: #4CAF50;
                    text-align: center;
                }
        
                p {
                    font-size: 18px;
                    line-height: 1.6;
                }
        
                .hamster-image {
                    display: block;
                    margin: 0 auto;
                    width: 50%;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h1>¡Cuenta activada con éxito!</h1>
                <p>¡Estamos contentos de tenerte con nosotros! Ya puedes disfrutar de la app.</p>
            </div>
        </body>
        </html>';
    }

    public function respondWithToken($token){
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60,
        ]);
    }
}
