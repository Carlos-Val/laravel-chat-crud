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

      return Party::selectRaw('party.id, game.id AS idgame, game.name')
      ->join('games', 'games.id', '=', 'party.game_id')
      ->where('games.name', 'LIKE', $gameName)
      ->get();

  }

  // RF.5 Usuario puede entrar y salir de una Party

  
  
  
  
  
  
  
  
  
  // RF.7 Traer todos los mensajes.

    public function countMessages(){
      return Message::all()->count();
  }

    public function partyMessages($id){

      return Message::where('id', 'LIKE', $id)->get();

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