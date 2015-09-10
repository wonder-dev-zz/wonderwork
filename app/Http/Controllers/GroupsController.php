<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GroupsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $groups = Group::orderBy('group', 'asc')->get();
        $active = 'setting';
        $i = 1 ;
        return view('groups.index', compact('active','i', 'groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'group' => 'required'
        ]);
        Group::create($request->all());
        return redirect(route('groups.index'))->with('success', 'La nouvelle famille de fournisseur a bien été créée');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $family = Group::findOrFail($id);
        $family->delete();
        return redirect(route('groups.index'))->with('success', 'La famille de fournisseur a bien été supprimée');
    }
}
