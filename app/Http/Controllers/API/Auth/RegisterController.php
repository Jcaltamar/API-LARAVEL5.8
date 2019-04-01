<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Notifications\ConfirmationRegister;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    public function register(Request $request){
        $this->validator($request->all());
       $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'perfiles' => "https://s3-us-west-2.amazonaws.com/garmerascent/perfiles/avatar_icon.jpg",
        ]);
       // $user->notify(new ConfirmationRegister($user));

        return response()->json(['message' => 'Usuario creado existosamente!'], 201);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'perfiles' => "https://s3-us-west-2.amazonaws.com/garmerascent/perfiles/avatar_icon.jpg",
            'fecha_nacimiento' =>date("Y-m-d",strtotime($data['ano'].'/'.$data['mes'].'/'.$data['dia'])),
            'token_confirmado' =>str_random(60),
            'slug'=> str_replace(" ", "_",  $data['name'])
        ]);
        return response()->json(['message' => 'Usuario creado existosamente!'], 201);
    }
}
