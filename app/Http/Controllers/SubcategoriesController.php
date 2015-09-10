<?php

namespace App\Http\Controllers;

use App\Subcategory;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SubcategoriesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $subcategories = Subcategory::orderBy('subcategory', 'asc')->get();
        $active = 'setting';
        $i = 1 ;
        return view('subcategories.index', compact('active','i', 'subcategories'));
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
            'subcategory' => 'required'
        ]);
        Subcategory::create($request->all());
        return redirect(route('subcategories.index'))->with('success', 'La nouvelle sous-catégorie d\'article a bien été créée');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->delete();
        return redirect(route('subcategories.index'))->with('success', 'La nouvelle sous-catégorie d\'article a bien été supprimée');
    }
}
