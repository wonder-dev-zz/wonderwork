<?php

namespace App\Http\Controllers;

use App\Mode;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ModesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $modes = Mode::orderBy('mode', 'asc')->get();
        $active = 'setting';
        $i = 1 ;
        return view('modes.index', compact('active','i', 'modes'));
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
            'mode' => 'required'
        ]);
        Mode::create($request->all());
        return redirect(route('modes.index'))->with('success', 'Le mode de payement a bien été créé');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $mode = Mode::findOrFail($id);
        $mode->delete();
        return redirect(route('modes.index'))->with('success', 'Le mode de payement a bien été supprimé');
    }
}
