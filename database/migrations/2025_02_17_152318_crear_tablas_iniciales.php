<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Crear tabla agentes
        Schema::create('agentes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email')->unique();
            $table->timestamps();
        });

        // Crear tabla categorías
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        // Crear tabla propiedades con claves foráneas
        Schema::create('propiedades', function (Blueprint $table) {
            $table->id();
            $table->string('direccion');
            $table->decimal('precio', 10, 2);
            $table->unsignedBigInteger('agente_id');
            $table->unsignedBigInteger('categoria_id');
            $table->timestamps();

            // Índices
            $table->index('agente_id');
            $table->index('categoria_id');

            // Claves foráneas
            $table->foreign('agente_id')->references('id')->on('agentes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('propiedades');
        Schema::dropIfExists('categorias');
        Schema::dropIfExists('agentes');
    }
};
