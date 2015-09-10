<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = 'providers';

    public $guarded = ['id'];

    protected $hidden = [];

    public function group(){
        return $this->belongsTo('App\Group');
    }

    public function mode(){
        return $this->belongsTo('App\Mode');
    }

    public function fcontact(){
        return $this->hasMany('App\Fcontact');
    }

    public function adress(){
        return $this->hasMany('App\Address');
    }

    public function getCreatedAttribute(){
        return Carbon::createFromFormat('Y-m-d h:i:s', $this->attributes['created_at'])->format('d/m/Y');
    }

    public function getUpdatedAttribute(){
        return Carbon::createFromFormat('Y-m-d h:i:s', $this->attributes['updated_at'])->format('d/m/Y');
    }
}
