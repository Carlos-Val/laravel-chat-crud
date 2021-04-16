<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Membership extends Model
{
    use HasFactory;

    public function party(){
        return $this->belongsTo('App\Models\Party', 'idparty', 'id');
    }

    public function player(){
        return $this->belongsTo('App\Models\Player', 'idplayer', 'id');
    }
}
