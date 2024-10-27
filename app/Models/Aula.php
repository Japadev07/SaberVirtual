<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;
    protected $fillable = ['modulo_id', 'titulo', 'conteudo'];
    public function modulo()
{
    return $this->belongsTo(Modulo::class);
}

}
