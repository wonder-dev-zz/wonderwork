<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

    public $fillable = ['group'];

    protected $hidden = [];

    public function provider(){
        $this->hasMany('App\Provider');
    }
}
