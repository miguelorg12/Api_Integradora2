<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Adafruit\AdafruitController;
use App\Http\Controllers\JaulaController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
//JWT
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);                  
    Route::post('register', [AuthController::class, 'register']);
});
//Usuarios
Route::prefix('v1')->group(function () {
    /*Route::get('users', [UserController::class, 'index']);
    Route::get('users/{id}',[UserController::class, 'show'])->where('id', '[0-9]+');
    Route::post('users', [UserController::class, 'store']);
    Route::put('users/{id}', [UserController::class, 'update'])->where('id', '[0-9]+');
    Route::delete('users/{id}', [UserController::class, 'destroy'])->where('id', '[0-9]+');*/
    Route::get('users', [UserController::class, 'mostrarid']);
});
//Sensores adafruit
Route::prefix('v1')->group(function () {
    Route::get('http/sensortemperatura', [AdafruitController::class, 'adafruitTemperatura']);
    Route::get('http/sensorhumedad', [AdafruitController::class, 'adafruitHumedad']);
    Route::get('http/sensorluz', [AdafruitController::class, 'adafruitLuz']);
    Route::get('http/sensormovimiento', [AdafruitController::class, 'adafruitMovimiento']);
    Route::get('http/sensorultrasonico', [AdafruitController::class, 'adafruitUltrasonico']);
    Route::get('http/sensoracelerometro', [AdafruitController::class, 'adafruitAcelerometro']);
    Route::get('http/sensorinfrarojo', [AdafruitController::class, 'adafruitInfrarojo']);
});
//Jaulas
Route::prefix('v1')->group(function () {
    Route::post('jaula', [JaulaController::class, 'store']);
    Route::get('jaula/{id}',[JaulaController::class, 'show'])->where('id', '[0-9]+');
    Route::get('jaula/mostrarid', [JaulaController::class, 'mostrarid']);
});

