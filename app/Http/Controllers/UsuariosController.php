<?php

namespace App\Http\Controllers;

use App\Models\User as Usuarios;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{

    public function index()
    {
        //
        return view('usuario.index');
    }


    public function create()
    {
        //
        return view('usuario.create');
    }


    public function store(Request $request)
    {
        $datosUsuario = request()->all();
        $datosUsuario = request()->except('_token');
        Usuario::insert($datosUsuario);

        return response()->json(datosUsuario);
    }


    public function show(Usuarios $usuarios)
    {
        //
    }


    public function edit(Usuarios $usuarios)
    {
        //
    }


    public function update(Request $request, Usuarios $usuarios)
    {
        //
    }


    public function destroy(Usuarios $usuarios)
    {
        //
    }
}
