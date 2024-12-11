<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('pacientes', function (Blueprint $table) {
        $table->id();
        $table->string('nombre_completo');
        $table->string('celular')->unique();
        $table->string('profesion')->nullable();
        $table->text('motivo_consulta');
        $table->text('tratamiento')->nullable();
        $table->text('medicamentos')->nullable();
        $table->text('observaciones')->nullable();
        $table->integer('tiempo_en_terapia')->nullable(); // En días o semanas
        $table->date('fecha_inicio_terapia')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
