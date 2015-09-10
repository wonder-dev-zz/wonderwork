<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $active = 'dash' ;
        return view('home/home', compact('active'));
    }

    public function logout(){
        auth()->logout();
        return redirect(route('login'));
    }
}
