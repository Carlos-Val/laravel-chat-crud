<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\GameController;

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

// postman -> http://127.0.0.1:8000/api/nombreEndPoint

Route::group(['middleware'=> 'cors'], function () {

    // RF.1 Register
    Route::post('/register', [PlayerController::class, 'registerPlayer']);

    // RF.2 LogIn
    Route::post('/login', [PlayerController::class, 'loginPlayer']);

    // RF.3 Crear party
    Route::post('/createGame', [GameController::class, 'createGame']);

    // RF.4 Buscar party
    Route::get('/searchParty/{gameName}', [PartyController::class, 'searchPartyGameName']);

    // RF.5 Entrar party


    // RF.5.2 Salir party


    // RF.6 Mensajes party


    // RF.7 Traer mensajes party
    Route::get('/allMessages', [PartyController::class, 'countMessages']);

    // RF.8 Modificar datos perfil
    Route::post('/modify', [PlayerController::class, 'modifyUsername']);


    // RF.9 LogOut
    Route::post('/logout', [PlayerController::class, 'logOut']);


});