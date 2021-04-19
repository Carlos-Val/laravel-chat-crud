<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Database\QueryException;


class GameController extends Controller
{
    //

// RF.3 Usuario puede crear una party de un juego

// Función para crear un juego

public function createGame(Request $request){
    $title = $request->input('title');
    $url = $request->input('url');    // Wtf es esto

    try {

      return Game::create([
          'title' => $title,
          'url' => $url,
      ]);

  } catch (QueryException $error) {
      
      $eCode = $error->errorInfo[1];

      if($eCode == 1062) {
          return response()->json([
              'error' => "La party no ha podido ser creada"
          ]);
      }

  }

}

}
