<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'Nombre' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        //validar q tipoDocumento y numero de documento no sean iguales
       $buscar = User::where('Tipo_documento',$data['Tipo_documento'])->where('Numero_documento',$data['Numero_documento'])->first();
       if(!is_null($buscar)){
        flash('User ya existe, tipo y numero de documento')->error()->important();
        return back();
       }
       return User::create([
            'Nombre' => $data['Nombre'],
            'Apellido' => $data['Apellido'],
            'Tipo_documento' => $data['Tipo_documento'],
            'Numero_documento' => $data['Numero_documento'],
            'Tipo_documento' => $data['Tipo_documento'],
            'Fecha_nacimiento' => $data['Fecha_nacimiento'],
            'Direccion_residencia' => $data['Direccion_residencia'],
            'Telefono' => $data['Telefono'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
