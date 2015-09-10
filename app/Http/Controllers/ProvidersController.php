<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\ProvidersRequest;
use App\Mode;
use App\Provider;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProvidersController extends Controller
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
        $providers = Provider::orderBy('ref', 'asc')->with('group')->get();
        $active = 'list';
        $i = 1 ;
        return view('providers.index', compact('active', 'i', 'providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $active = 'list';
        $groups = Group::orderBy('group', 'asc')->lists('group', 'id');
        $groups[0]= ' - ';
        return view('providers.create', compact('active', 'groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ProvidersRequest $request)
    {
        $this->validate($request, ['ref' => 'required|alpha_num|unique:providers,ref']);
        Provider::create($request->all());
        return redirect(route('providers.index'))->with('success', 'Le nouveau fournisseur a bien été créé');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $provider = Provider::findOrFail($id);
        $active = 'list';
        $forme = ['0' => 'Aucun', '1' => 'S.A.', '2' => 'S.P.R.L.', '3' => 'S.P.R.L.U.', '4' => 'S.C.', '5' => 'S.C.R.L.', '6' => 'Indépendant', '7' => 'Commerce', '8' => 'Cabinet', '9' => 'Administration', '10' => 'A.S.B.L.', '11' => 'Etude', '12' => 'Autre'];
        $groups = Group::orderBy('group', 'asc')->lists('group', 'id');
        $groups[0] = ' - ';
        $modes = Mode::orderBy('mode', 'asc')->lists('mode', 'id');
        $addresses = Provider::find($id)->adress()->get();
        $fcontacts = Provider::find($id)->fcontact()->get();
        return view('providers.edit', compact('active', 'provider', 'groups', 'modes', 'forme', 'addresses', 'fcontacts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, ProvidersRequest $request)
    {
        $provider = Provider::findOrFail($id);
        $provider->update($request->all());
        return redirect(route('providers.edit', $id))->with('success', 'Le fournisseur a bien été mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $provider = Provider::findOrFail($id);
        $provider->delete();
        return redirect(route('providers.index'))->with('success', 'Le fournisseur a bien été supprimé');
    }
}
