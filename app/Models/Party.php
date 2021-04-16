<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;

    public function game(){
        return $this->belongsTo('App\Models\Game','idgame','id');
    }

    public function membership(){
        return $this->hasMany('App\Models\Membership','idmembership','id');
    }

    public function player(){
        return $this->hasMany('App\Models\Player','idplayer','id');
    }

    public function messages(){
        return $this->hasMany('App\Models\Messages','idmessages','id');
    }

}
