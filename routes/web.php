<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{UsuariosController, LibrosController, HomeController, PrestamosLibrosController};

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(); 

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('usuario', UsuariosController::class);
Route::resource('libros', LibrosController::class);
Route::resource('prestamoslibros', PrestamosLibrosController::class);
Route::put('prestamoslibros/{prestamos_libro}', [PrestamosLibrosController::class,'update'])->name('retornar_libro');
Route::put('libros/{libros}',[LibrosController::class,'update'])->name('libros.update');
Route::get('libros/{libros}',[LibrosController::class,'show'])->name('libros.show');
Route::delete('libros/{libros}',[LibrosController::class,'destroy'])->name('libros.destroy');

