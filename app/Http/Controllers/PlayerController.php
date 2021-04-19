<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use Illuminate\Support\Facades\Hash;

class PlayerController extends Controller
{

  // RF.1 REGISTER
  public function registerPlayer(Request $request){

    //nickname,nombre,password,email
    $username = $request->input('username');
    $email = $request->input('email');
    $password = $request->input('password');
    
    //Hasheamos el password
    $password = Hash::make($password);

    try {

        return Player::create([
            'username' => $username,
            'email' => $email,
            'password' => $password
        ]);

    } catch (QueryException $error) {
        
        $eCode = $error->errorInfo[1];

        if($eCode == 1062) {
            return response()->json([
                'error' => "Usuario ya registrado anteriormente"
            ]);
        }

    }
}

    // RF. 2 LOGIN 

    public function loginPlayer(Request $request){

        $username = $request->input('username');
        $password = $request->input('password'); 
        
        try {

            //primero cotejamos que existe el username en la tabla player

            $validate_user = Player::select('password')
            ->where('username', 'LIKE', $username)
            ->first();

            if(!$validate_user){
                return response()->json([
                    //username incorrecto
                    'error' => "username incorrecto"
                ]); 
            }
            
            $hashed = $validate_user->password;

            //comprobamos si el password recibido corresponde con el del username del candidato
            
            if(Hash::check($password, $hashed)){
                
                //si existe, generamos el token
                
                $length = 50;
                $token = bin2hex(random_bytes($length));

                //guardamos el token en su campo correspondiente, esto
                //es opcional si guardamos el token en la DB
                Player::where('username',$username)
                ->update(['token' => $token]);

                //devolvemos al front la info necesaria ya actualizada
                return Player::where('username', 'LIKE', $username)
                ->get();
            
            }else{
                return response()->json([
                    //password incorrecto
                    'error' => " Password incorrecto"
                ]);
            }
         
        } catch(QueryException $error){
            
            return response()->$error;
                
        }


    }   
    
    // RF.8 Modificar datos de perfil 
    public function modifyUsername(Request $request){

        $id = $request->input('id');
        $username = $request->input('username');
        $password = $request->input('password');

        try {
                
            return Player::where('id', '=', $id)
            ->update(['username' => $username]);  
          // (((METER EN EL ARRAY DE UPDATE))) 'password' => $password] La password se modifica, pero no se Haseah

          



        } catch(QueryException $error) {
             return $error;
        }

  
    }


    // RF.9 LOGOUT

    public function logOut(Request $request){

      $id = $request->input('id');

      try {

          return Player::where('id', '=', $id)
          ->update(['token' => '']);

      } catch(QueryException $error){
          return $error;
      }

  }

}
