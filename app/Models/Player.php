<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
  use HasFactory;

  public function messages(){
    return $this->hasMany('App\Models\Message');
  }

  public function membership(){
    return $this->hasMany('App\Models\Membership', 'idmembership', 'id');
  }

  public function party(){
    return $this->belongsTo('App\Models\Party', 'idparty', 'id');
  }


}
