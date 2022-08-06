<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos_libros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
 
    $table->foreign('user_id')->references('id')->on('users');
    $table->unsignedBigInteger('libro_id');
 
    $table->foreign('libro_id')->references('id')->on('libros');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestamos_libros');
    }
};
