<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';

    public $guarded = ['id'];

    protected $hidden = [];

    public function provider()
    {
        return $this->belongsTo('App\Provider');

    }
}