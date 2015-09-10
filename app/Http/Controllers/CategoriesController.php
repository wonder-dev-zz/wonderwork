<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
    $categories = Category::orderBy('category', 'asc')->get();
    $active = 'setting';
    $i = 1 ;
    return view('categories.index', compact('active','i', 'categories'));
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
            'category' => 'required'
        ]);
        Category::create($request->all());
        return redirect(route('categories.index'))->with('success', 'La nouvelle catégorie d\'article a bien été créée');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect(route('categories.index'))->with('success', 'La nouvelle catégorie d\'article a bien été supprimée');
    }
}
