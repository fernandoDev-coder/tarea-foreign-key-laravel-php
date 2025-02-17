<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgregarTelefonoAAgentes extends Migration
{
    public function up()
    {
        // Comprobar si la tabla agentes ya existe
        if (Schema::hasTable('agentes')) {
            // Comprobar si la columna 'telefono' ya existe
            if (!Schema::hasColumn('agentes', 'telefono')) {
                Schema::table('agentes', function (Blueprint $table) {
                    $table->string('telefono')->nullable();
                });
            }
        }
    }

    public function down()
    {
        Schema::table('agentes', function (Blueprint $table) {
            $table->dropColumn('telefono');
        });
    }
}
