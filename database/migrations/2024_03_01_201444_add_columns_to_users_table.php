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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('rol'); // 1 = persona, 2 = mascota, 3 = admin
            $table->string('apellido');
            $table->string('telefono');
            $table->string('tipo_doc');
            $table->string('documento');
            $table->string('genero');
            $table->date('nacimiento');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('rol');
            $table->dropColumn('apellido');
            $table->dropColumn('telefono');
            $table->dropColumn('tipo_doc');
            $table->dropColumn('documento');
            $table->dropColumn('genero');
            $table->dropColumn('nacimiento');
        });
    }
};
