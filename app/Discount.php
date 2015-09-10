<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discounts';

    public $fillable = ['code', 'pourcent'];

    protected $hidden = [];

    public function client(){
        $this->hasMany('App\Client');
    }
}
