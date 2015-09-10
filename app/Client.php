<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    public $guarded = ['id'];

    protected $hidden = [];

    public function family(){
        return $this->belongsTo('App\Family');
    }

    public function mode(){
        return $this->belongsTo('App\Mode');
    }

    public function discount(){
        return $this->belongsTo('App\Discount');
    }

    public function delivery(){
        return $this->hasMany('App\Delivery');
    }

    public function contact(){
        return $this->hasMany('App\Contact');
    }

    public function getCreatedAttribute(){
        return Carbon::createFromFormat('Y-m-d h:i:s', $this->attributes['created_at'])->format('d/m/Y');
    }

    public function getUpdatedAttribute(){
        return Carbon::createFromFormat('Y-m-d h:i:s', $this->attributes['updated_at'])->format('d/m/Y');
    }
}
