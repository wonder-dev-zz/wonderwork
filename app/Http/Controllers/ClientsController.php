<?php

namespace App\Http\Controllers;

use App\Client;
use App\Delivery;
use App\Discount;
use App\Family;
use App\Http\Requests\ClientsRequest;
use App\Mode;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ClientsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $clients = Client::orderBy('ref', 'asc')->with('family')->get();
        $active = 'list';
        $i = 1 ;
        return view('clients.index', compact('active', 'i', 'clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $active = 'list';
        $families = Family::orderBy('family', 'asc')->lists('family', 'id');
        $families[0] = ' - ';
        return view('clients.create', compact('active', 'families'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ClientsRequest $request)
    {
        $this->validate($request, ['ref' => 'required|alpha_num|unique:clients,ref']);
        Client::create($request->all());
        return redirect(route('clients.index'))->with('success', 'Le nouveau client a bien été créé');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $active = 'list';
        $forme = ['0' => 'Aucun', '1' => 'S.A.', '2' => 'S.P.R.L.', '3' => 'S.P.R.L.U.', '4' => 'S.C.', '5' => 'S.C.R.L.', '6' => 'Indépendant', '7' => 'Commerce', '8' => 'Cabinet', '9' => 'Administration', '10' => 'A.S.B.L.', '11' => 'Etude', '12' => 'Autre'];
        $families = Family::orderBy('family', 'asc')->lists('family', 'id');
        $families[0] = ' - ';
        $modes = Mode::orderBy('mode', 'asc')->lists('mode', 'id');
        $remises = Discount::orderBy('code', 'asc')->lists('code', 'id');
        $remises[0] = ' - ';
        $deliveries = Client::find($id)->delivery()->get();
        $contacts = Client::find($id)->contact()->get();
        return view('clients.edit', compact('active', 'client', 'families', 'modes', 'forme', 'remises', 'deliveries', 'contacts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, ClientsRequest $request)
    {
        $client = Client::findOrFail($id);
        $client->update($request->all());
        return redirect(route('clients.edit', $id))->with('success', 'Le client a bien été mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect(route('clients.index'))->with('success', 'Le client a bien été supprimé');
    }
}
