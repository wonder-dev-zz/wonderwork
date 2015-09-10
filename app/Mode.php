<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mode extends Model
{
    protected $table = 'modes';

    public $fillable = ['mode'];

    protected $hidden = [];

    public function client(){
        $this->hasMany('App\Client');
    }

    public function provider(){
        $this->hasMany('App\Provider');
    }
}
