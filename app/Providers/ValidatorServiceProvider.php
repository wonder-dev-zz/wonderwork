<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider{

    public function boot(){
        Validator::extend('check', function($attribute, $value, $parameters){
            if($value == 'admin' || $value == 'user'){
                return $value;
            }
        });
    }

    public function register(){

    }
}