<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libros extends Model
{
    use HasFactory;

    protected $table = 'libros';

    protected $fillable = ['Titulo','Nombre','Autor','Numero_paginas','prestado','Isbn'];


    /**
     * Get the prestamos that owns the Libros
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function prestamos(): BelongsTo
    {
        return $this->belongsTo(Prestamos_libros::class,'libro_id','id');
    }

    public static function existeIsbn($isbn){
        $existe = self::where('Isbn', $isbn);
        return !is_null($existe);
    }
}
