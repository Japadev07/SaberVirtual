<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descricao');
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->integer('carga_horaria');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('cursos');
    }

    
};
