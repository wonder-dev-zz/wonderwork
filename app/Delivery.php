<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $table = 'deliveries';

    public $fillable = ['titre', 'adresse', 'cp', 'ville', 'pays', 'tel', 'gsm', 'fax', 'client_id'];

    protected $hidden = [];

    public function client(){
        return $this->belongsTo('App\Client');
    }
}
