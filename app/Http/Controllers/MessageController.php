<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Database\QueryException;

class MessageController extends Controller
{
    //
    
    // RF.6 Usuario tiene que poder enviar mensajes a la party

    public function createMessage(Request $request){
      $message = $request->input('message');
      $idplayer = $request->input('idplayer');
      $idparty = $request->input('idparty');
  
      try {
  
        return Message::create([
            'message' => $message,
            'idplayer' => $idplayer,
            'idparty' => $idparty
        ]);
  
    } catch (QueryException $error) {
        
        $eCode = $error->errorInfo[1];
  
        if($eCode == 1062) {
            return response()->json([
                'error' => "El mensaje no ha podido ser enviado"
            ]);
        }
  
    }
  
  }

    // RF.7 Traer todos los mensajes.

    public function partyMessages($id){

      try{
        return Message::all()->where('idparty', '=', $id);

      }catch(QueryException $error){
        return $error;
    }
  }

  
}
  


