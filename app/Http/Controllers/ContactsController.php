<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactsRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContactsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(ContactsRequest $request){
        Contact::create($request->all());
        return redirect(route('clients.edit', $request->client_id))->with('success', 'Le contact a bien été sauvegardée');
    }

    public function destroy($id){
        $contact = Contact::findOrFail($id);
        $id = $contact->client_id ;
        $contact->delete();
        return redirect(route('clients.edit', $id))->with('success', 'Le contact a bien été supprimée');
    }
}
