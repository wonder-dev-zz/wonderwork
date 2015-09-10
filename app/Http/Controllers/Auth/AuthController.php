<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function index(){
        return view('login');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return User
     */
    public function create()
    {
        return User::create([
            'login' => 'greg',
            'pswd' => bcrypt('greg123'),
            'tri' => 'GSO',
            'auth' => 'admin',
        ]);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'login' => 'required',
            'pswd' => 'required',
        ]);

        $user = User::where('login', $request->get('login'))->first();

        if ($user && Hash::check($request->get('pswd'), $user->pswd)) {
            auth()->login($user);
            return redirect(route('home'));
        }

        return redirect(route('login'))->with('warning', 'Identifiants incorrects');
    }
}
