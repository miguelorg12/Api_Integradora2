<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }
    
    public function index(){
        $users = User::all();
        return response()->json(['users'=>$users], 200);
    }

    public function show($id){
        $user = User::find($id);
        if($user){
            return response()->json(['user'=>$user], 200);
        }else{
            return response()->json(['msg'=>'No se encontro el usuario'], 404);
        }
    }

    public function store(Request $request){
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
        $user -> save();
        return response()->json(['user'=>$user], 201);
    }

    public function update(Request $request){
        $user = Auth::user();
        if($user){
            $validate = Validator::make($request->all(), [
                'name' => 'required|string|max:255|min:3',
                'ApP' => 'string|max:255|min:3',
                'ApM' => 'string|max:255|min:3'
            ]);
            if($validate->fails()){
                return response()->json(['errors' => $validate->errors()], 400);
            }
            $user -> name = $request-> name;
            $user -> ApP = $request->get('ApP', $user->ApP);
            $user -> ApM = $request->get('ApM', $user->ApM);
            $user -> save();
            return response()->json(['Se actualizo el usuario con exito', 'data'=>$user], 200);
        }else{
            return response()->json(['msg'=>'No se encontro el usuario'], 404);
        }
    }

    public function destroy($id){
        $user = User::find($id);
        if($user){
            $user -> is_active = false;
            return response()->json(['user'=>$user], 200);
        }else{
            return response()->json(['msg'=>'No se encontro el usuario'], 404);
        }
    }

    public function mostrarid(){
        $user = Auth::user();
        return response()->json(['id'=> $user -> id], 200);
    }

}
