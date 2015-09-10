<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $table = 'families';

    public $fillable = ['family'];

    protected $hidden = [];

    public function client(){
        return $this->hasMany('App\Client');
    }
}
