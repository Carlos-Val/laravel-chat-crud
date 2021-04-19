<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class MembershipController extends Controller
{
    //

    public function joinParty(Request $request){

        $idplayer = $request->input('idplayer');
        $idparty = $request->input('idparty');

        try {

            return Membership::create([
                'idplayer' => $idplayer,
                'idparty' => $idparty
            ]);
    
        } catch (QueryException $error) {
            
            $eCode = $error->errorInfo[1];
    
            if($eCode == 1062) {
                return response()->json([
                    'error' => "No te has podido unir a la party"
                ]);
            }
    
        }
    }

    public function leaveParty(Request $request){

        $idplayer = $request->input('idplayer');
        $idparty = $request->input('idparty');

        try {

            return Membership::destroy([
                'idplayer' => $idplayer,
                'idparty' => $idparty
            ]);
    
        } catch (QueryException $error) {
            
            $eCode = $error->errorInfo[1];
    
            if($eCode == 1062) {
                return response()->json([
                    'error' => "No has podido irte de la party"
                ]);
            }
    
        }
    }
}
