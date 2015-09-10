<?php

namespace App\Http\Controllers;

use App\Address;
use App\Http\Requests\AddressesRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AddressesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(AddressesRequest $request){
        Address::create($request->all());
        return redirect(route('providers.edit', $request->provider_id))->with('success', 'L\'adresse a bien été sauvegardée');
    }

    public function destroy($id){
        $address = Address::findOrFail($id);
        $id = $address->provider_id ;
        $address->delete();
        return redirect(route('providers.edit', $id))->with('success', 'L\'adresse a bien été supprimée');
    }
}
