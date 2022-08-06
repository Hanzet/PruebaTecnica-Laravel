<?php

namespace App\Http\Controllers;

use App\Models\{Prestamos_libros, Libros, User};
use Illuminate\Http\Request;

class PrestamosLibrosController extends Controller
{

    public function index(Request $request)
    {
        Libros::where('prestado',1)->get();// todos los libros prestados, caso admin, caso biblioteca
        $userId = $request->user()->id;
        Libros::whereIn('id',Prestamos_libros::where('user_id',$userId)->pluck('libro_id'))->get(); //todos los libros prestados al user logueado
        $request->user()->libros; //la relacion de prestamos libros.
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $user = $request->user();
        $libro = Libros::find($request->libro_id);
        if(!$libro->prestado){
            Prestamos_libros::create(['user_id'=>$user->id,'libro_id'=>$libro->id]);
            $libro->prestado=1;
            $libro->save();
            flash("Libro asignado correctamente");
        }else{
            flash("El libro esta en prestamo")->important();
        }
        return back();
    }


    public function show(Prestamos_libros $prestamos_libros)
    {
        //
    }


    public function edit(Prestamos_libros $prestamos_libros)
    {
        //
    }


    public function update(Request $request, Prestamos_libros $prestamos_libros)
    {
           $libro = $prestamos_libros->libro;
            $libro->prestado=0;
            $libro->save();
            $prestamos_libros->delete();
            flash("Libro regresado correctamente");
        
        return back();
    }


    public function destroy(Prestamos_libros $prestamos_libros)
    {
        //
    }
}
