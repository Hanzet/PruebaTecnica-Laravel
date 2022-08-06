<?php

namespace App\Http\Controllers;

use App\Models\{Libros,Prestamos_libros};
use Illuminate\Http\Request;

class LibrosController extends Controller
{

    public function index(Request $request)
    {
        $data['libros'] = Libros::where('prestado',0)->get();
        $data['librosprestados'] = Libros::whereIn('id',Prestamos_libros::where('user_id',$request->user()->id)->pluck('libro_id'))->get();
        return view('libros.index', $data);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {   
        //dd($request->all());
        if(Libros::existeIsbn($request->Isbn)){
            Libros::create($request->all());  
            flash("El libro se creo correctamente");
        }else{
            flash("El ISBN del libro ya existe")->important();
        }
        return back(); 
    }


    public function show(Libros $libros)
    {
        //
    }


    public function edit(Libros $libros)
    {
        //
    }


    public function update(Request $request, Libros $libros)
    {
        if(Libros::existeIsbn($request->Isbn)){
            $libros->update($request->all());  
            flash("El libro se edito correctamente");
        }else{
            flash("El ISBN del libro ya existe")->important();
        }
        return back(); 
    }


    public function destroy(Libros $libros)
    {
        if(!$libros->prestado){
            $libros->delete();
            flash("El libro esta en prestamo, no se puede eliminar")->important();
        }else{
            flash("El libro se eliminó, correctamente");
        }
        return back();
    }
}
