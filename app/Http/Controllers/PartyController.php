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

}




