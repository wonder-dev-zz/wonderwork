<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table = 'subcategories';

    public $fillable = ['subcategory'];

    protected $hidden = [];
}
