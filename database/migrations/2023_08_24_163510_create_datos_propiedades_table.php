<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('datos_propiedades', function (Blueprint $table) {  //CAMPOS DE LAS PROPIEDADES
            $table->id();

            $table->string("titulo");
            $table->string("direccion");
            $table->text("descripcion");        //HAY QUE MIGRAR
            $table->integer("m2");
            $table->string("ambientes");
            $table->string("dormitorios");
            $table->string("banios");
            $table->string("garage");
            $table->integer("categoria");
            $table->integer("operacion");
            $table->double("precio");
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_propiedades');
    }
};
