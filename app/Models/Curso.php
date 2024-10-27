<?php

// Model: Curso.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model {
    protected $fillable = ['titulo', 'descricao', 'data_inicio', 'data_fim', 'carga_horaria'];

    public function modulos()
    {
        return $this->hasMany(Modulo::class);
    }

    public function inscricoes()
    {
        return $this->hasMany(Inscricao::class);
    }

    
}
