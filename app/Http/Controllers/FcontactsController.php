<?php

namespace App\Http\Controllers;

use App\Fcontact;
use App\Http\Requests\FcontactsRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FcontactsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(FcontactsRequest $request){
        Fcontact::create($request->all());
        return redirect(route('providers.edit', $request->provider_id))->with('success', 'Le contact a bien été sauvegardée');
    }

    public function destroy($id){
        $fcontact = Fcontact::findOrFail($id);
        $id = $fcontact->provider_id ;
        $fcontact->delete();
        return redirect(route('providers.edit', $id))->with('success', 'Le contact a bien été supprimée');
    }
}
