<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamos_libros extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','libro_id'];

    /**
     * Get the user that owns the Prestamos_libros
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the libro that owns the Prestamos_libros
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function libro(): BelongsTo
    {
        return $this->belongsTo(Libros::class, 'libro_id');
    }
}
