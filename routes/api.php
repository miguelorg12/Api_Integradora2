<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SensoresController;
use App\Http\Controllers\AnimalController;
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
    Route::get('users', [UserController::class, 'mostrarid']);
    Route::put('users/update', [UserController::class, 'update']);
});
//Sensores adafruit
Route::prefix('v1')->group(function () {
    Route::get('http/sensortemperatura/{id_jaula}', [AdafruitController::class, 'adafruitTemperatura'])->where('id_jaula', '[0-9]+');
    Route::get('http/sensorhumedad/{id_jaula}', [AdafruitController::class, 'adafruitHumedad'])->where('id_jaula', '[0-9]+');
    Route::get('http/sensorluz/{id_jaula}', [AdafruitController::class, 'adafruitLuz'])->where('id_jaula', '[0-9]+');
    Route::get('http/sensormovimiento/{id_jaula}', [AdafruitController::class, 'adafruitMovimiento'])->where('id_jaula', '[0-9]+');
    Route::get('http/sensorultrasonico/{id_jaula}', [AdafruitController::class, 'adafruitUltrasonico'])->where('id_jaula', '[0-9]+');
    Route::get('http/sensoracelerometro/{id_jaula}', [AdafruitController::class, 'adafruitAcelerometro'])->where('id_jaula', '[0-9]+');
    Route::get('http/sensorinfrarojo/{id_jaula}', [AdafruitController::class, 'adafruitInfrarojo'])->where('id_jaula', '[0-9]+');
    Route::get('http/todos/{id_jaula}', [AdafruitController::class, 'adafruitSensores'])->where('id_jaula', '[0-9]+');
});
//Jaulas
Route::prefix('v1')->group(function () {
    Route::post('jaula', [JaulaController::class, 'store']);
    Route::get('jaula/{id}',[JaulaController::class, 'show'])->where('id', '[0-9]+');
    Route::get('jaula/user',[JaulaController::class, 'showperUser']);
});

//Sensores
/*Route::prefix('v1')->group(function () {
    Route::post('sensores/temperatura', [SensoresController::class, 'storeTemperatura']);
    Route::post('sensores/humedad', [SensoresController::class, 'storeHumedad']);
    Route::post('sensores/luz', [SensoresController::class, 'storeLuz']);
    Route::post('sensores/movimiento', [SensoresController::class, 'storeMovimiento']);
    Route::post('sensores/ultrasonico', [SensoresController::class, 'storeUltrasonico']);
    Route::post('sensores/acelerometro', [SensoresController::class, 'storeAcelerometro']);
    Route::post('sensores/infrarojo', [SensoresController::class, 'storeInfrarojo']);
});*/

//Animales
Route::prefix('v1')->group(function () {
    Route::get('animales', [AnimalController::class, 'index']);
});