<?php

namespace App\Http\Controllers;

use App\Delivery;
use App\Http\Requests\DeliveriesRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DeliveriesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(DeliveriesRequest $request){
        Delivery::create($request->all());
        return redirect(route('clients.edit', $request->client_id))->with('success', 'L\'adresse de livraison a bien été sauvegardée');
    }

    public function destroy($id){
        $delivery = Delivery::findOrFail($id);
        $id = $delivery->client_id ;
        $delivery->delete();
        return redirect(route('clients.edit', $id))->with('success', 'L\'adresse de livraison a bien été supprimée');
    }
}
