<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class PartyController extends Controller
{
    //


  // RF.4 Usuario tiene que poder buscar party por un determinado juego

    public function searchPartyGameName($gameName){

      return Party::selectRaw('parties.id, games.id AS idgame, games.title')
      ->join('games', 'games.id', '=', 'parties.id')
      ->where('games.title', 'LIKE', $gameName)
      ->get();

  }
  
  // Función para crear una Party
  
  public function createParty(Request $request){
    $name = $request->input('name');
    $idgame = $request->input('idgame');
    $idplayer = $request->input('idplayer');
    
    

    try {

      return Party::create([
          'name' => $name,
          'idgame' => $idgame,
          'idplayer' => $idplayer,
          
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