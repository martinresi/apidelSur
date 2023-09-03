<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\text;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('datos_propiedads', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('direccion');
            $table->text('descripcion');
            $table->integer('m2');
            $table->integer('totalm2');
            $table->integer('ambientes');
            $table->integer('dormitorios');
            $table->integer('banios');
            $table->string('garage');
            $table->integer('categoria');
            $table->integer('operacion'); // me falto destacado
            $table->double('precio');
            $table->integer('destacado')->nullable(); 
            $table->text('map');
            $table->timestamps();

            /**
             * ID CASA: 21
             * FOTOS DE LA CASA 21: 21_
             * FOTOS WHERE NOMBRE[0] && NOMBRE[1] === 21
             */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_propiedads');
    }
};
