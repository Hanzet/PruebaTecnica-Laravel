<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Libros, Prestamos_libros};

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $data['libros'] = Libros::where('prestado',0)->get();
        $data['librosprestados'] = Libros::whereIn('id',Prestamos_libros::where('user_id',$request->user()->id)->pluck('libro_id'))->get();
        return view('home', $data);
    }
}
