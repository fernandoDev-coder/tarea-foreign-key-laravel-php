<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgregarPrecioAPropiedades extends Migration
{
    public function up()
    {
        // Comprobar si la tabla propiedades ya existe
        if (Schema::hasTable('propiedades')) {
            // Comprobar si la columna 'precio' ya existe
            if (!Schema::hasColumn('propiedades', 'precio')) {
                Schema::table('propiedades', function (Blueprint $table) {
                    $table->decimal('precio', 10, 2)->nullable();
                });
            }
        }
    }

    public function down()
    {
        Schema::table('propiedades', function (Blueprint $table) {
            $table->dropColumn('precio');
        });
    }
}
