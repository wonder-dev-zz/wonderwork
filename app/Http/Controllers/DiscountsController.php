<?php

namespace App\Http\Controllers;

use App\Discount;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DiscountsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $discounts = Discount::orderBy('code', 'asc')->get();
        $active = 'setting';
        $i = 1 ;
        return view('discounts.index', compact('active','i', 'discounts'));
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
            'code' => 'required',
            'pourcent' => 'required|numeric'
        ]);
        Discount::create($request->all());
        return redirect(route('discounts.index'))->with('success', 'Le code de réduction client a bien été créé');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $discount = Discount::findOrFail($id);
        $discount->delete();
        return redirect(route('discounts.index'))->with('success', 'Le code de réduction client a bien été supprimé');
    }
}
