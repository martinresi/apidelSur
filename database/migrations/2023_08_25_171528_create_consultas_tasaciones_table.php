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
        Schema::create('consultas_tasaciones', function (Blueprint $table) {
            $table->id();

            $table->string("name");
            $table->string("email");
            $table->string("number");         
            $table->string("horario");
            $table->string("direccion");
            $table->integer("operacion");
            $table->integer("tipoPropiedad");
            $table->string("ambiantes");
            $table->integer("supCubiertam2");
            $table->integer("supTotalm2");
            $table->string("garage");
            $table->text("extra")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas_tasaciones');
    }
};
