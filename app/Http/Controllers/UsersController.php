<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
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
        $users = User::orderBy('nom', 'asc')->get();
        $active = 'setting';
        return view('users.index', compact('active', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $active = 'setting';
        return view('users.create', compact('active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(UsersRequest $request)
    {
        $this->validate($request, [
            'pswd' => 'required|alpha_num|min:5'
        ]);

        if($request->pswd === $request->pswd_conf){
            $user = User::create([
                'login' => $request->login,
                'pswd' => bcrypt($request->pswd),
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'adresse' => $request->adresse,
                'local' => $request->local,
                'code' => $request->code,
                'mail' => $request->mail,
                'tri' => strtoupper(substr($request->prenom, 0, 1) . substr($request->nom, 0, 2)),
                'auth' => $request->auth
            ]);
            return redirect(route('users.edit', $user))->with('success', 'L\'utilisateur à bien été créer');
        }

        return redirect(route('users.create'))->with('error', 'Login ou mot de passe non valide');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $active = 'setting';
        $user = User::findOrFail($id);
        return view('users.edit', compact('user', 'active'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, UsersRequest $request)
    {
        $user = User::findOrFail($id);
        if($request->pswd === ""){
            $user->update([
                'login' => $request->login,
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'adresse' => $request->adresse,
                'local' => $request->local,
                'code' => $request->code,
                'mail' => $request->mail,
                'tri' => strtoupper(substr($request->prenom, 0, 1) . substr($request->nom, 0, 2)),
                'auth' => $request->auth
            ]);
        }
        else{
            $this->validate($request, [
                'pswd' => 'required|alpha_num|min:5'
            ]);

            if($request->pswd === $request->pswd_conf) {
                $user->update([
                    'login' => $request->login,
                    'pswd' => bcrypt($request->pswd),
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'adresse' => $request->adresse,
                    'local' => $request->local,
                    'code' => $request->code,
                    'mail' => $request->mail,
                    'tri' => strtoupper(substr($request->prenom, 0, 1) . substr($request->nom, 0, 2)),
                    'auth' => $request->auth
                ]);
            }
            else{
                return redirect(route('users.edit', $id))->with('error', 'Mot de passe incorrect');
            }
        }
        return redirect(route('users.edit', $id))->with('success', 'Les informations de l\'utilisateur ont été mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect(route('users.index', $id))->with('success', 'L\'utilisateur a été supprimé');
    }
}
