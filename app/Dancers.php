<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dancers extends Model
{
    protected $guarded = array('id');

    
    public static $rules = array(
        'name' => 'required',
        'janru' => 'required',
        'tweet' => 'required',
    );    
    // Dancersモデルに関連付けを行う
    public function histories()
    {
      return $this->hasMany('App\History');

    }
   
}
