<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fcontact extends Model
{
    protected $table = 'fcontacts';

    public $fillable = ['nom', 'prenom', 'fonction', 'tel', 'gsm', 'mail', 'provider_id'];

    protected $hidden = [];

    public function provider(){
        return $this->belongsTo('App\Provider');
    }
}
