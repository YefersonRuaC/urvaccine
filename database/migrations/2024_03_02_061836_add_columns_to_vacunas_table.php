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
        Schema::table('vacunas', function (Blueprint $table) {
            $table->string('nombre');
            $table->string('tipo');// paga / gratis
            $table->integer('precio');
            $table->string('tipo_user');// persona / mascota
            $table->string('edad_desde');
            $table->string('edad_hasta');
            $table->string('genero');
            $table->string('enfermedad');
            $table->string('propagacion');
            $table->text('sintomas');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vacunas', function (Blueprint $table) {
            $table->dropColumn('nombre');
            $table->dropColumn('tipo');// paga / gratis
            $table->dropColumn('precio');
            $table->dropColumn('tipo_user');// persona / mascota
            $table->dropColumn('edad_desde');
            $table->dropColumn('edad_hasta');
            $table->dropColumn('genero');
            $table->dropColumn('enfermedad');
            $table->dropColumn('propagacion');
            $table->dropColumn('sintomas');
            $table->dropForeign('vacunas_user_id_foreign');
        });
    }
};
