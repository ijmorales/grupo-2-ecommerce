<?php

namespace App\Http\Controllers\Auth;

use App\Usuario;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;


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
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'avatar' => ['image', 'max:6000'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Usuario
     */
    protected function create(array $data)
    {
        return Usuario::create([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'email' => $data['email'],
            'avatar' => $data['avatar'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegistrationForm(){
        return view('auth.registro');
    }

    public function register(Request $request){
        $datosUsuario = $request->all();

        // Valida la informacion del formulario
        $this->validator($datosUsuario)->validate();

        // Guarda el avatar
        if($request->file('avatar')){
            $avatar = basename($request->file('avatar')->store('public/avatars'));
        }else{
            $avatar = 'default_avatar.jpg';
        }

        $datosUsuario['avatar'] = $avatar;

        // Crea el usuario
        event(new Registered($user = $this->create($datosUsuario)));
        $this->guard()->login($user);
        return redirect($this->redirectPath());
    }
}
