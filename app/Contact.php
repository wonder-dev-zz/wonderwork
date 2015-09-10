<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';

    public $fillable = ['nom', 'prenom', 'fonction', 'tel', 'gsm', 'mail', 'client_id'];

    protected $hidden = [];

    public function client(){
        return $this->belongsTo('App\Client');
    }
}
