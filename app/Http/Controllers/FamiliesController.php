<?php

namespace App\Http\Controllers;

use App\Family;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FamiliesController extends Controller
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
        $families = Family::orderBy('family', 'asc')->get();
        $active = 'setting';
        $i = 1 ;
        return view('families.index', compact('active','i', 'families'));
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
            'family' => 'required'
        ]);
        Family::create($request->all());
        return redirect(route('families.index'))->with('success', 'La nouvelle famille de client a bien été créée');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $family = Family::findOrFail($id);
        $family->delete();
        return redirect(route('families.index'))->with('success', 'La famille de client a bien été supprimée');
    }
}
