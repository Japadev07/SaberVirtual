<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    // Lista todas as aulas de um módulo
    public function index($moduloId)
    {
        return Aula::where('modulo_id', $moduloId)->get();
    }

    // Mostra uma aula específica
    public function show($id)
    {
        return Aula::findOrFail($id);
    }

    // Cria uma nova aula para um módulo
    public function store(Request $request)
    {
        $request->validate([
            'modulo_id' => 'required|exists:modulos,id',
            'titulo' => 'required|string|max:255',
            'conteudo' => 'required|string',
        ]);

        return Aula::create($request->all());
    }

    // Atualiza uma aula existente
    public function update(Request $request, $id)
    {
        $aula = Aula::findOrFail($id);
        $aula->update($request->all());

        return $aula;
    }

    // Deleta uma aula
    public function destroy($id)
    {
        $aula = Aula::findOrFail($id);
        $aula->delete();

        return response()->json(['message' => 'Aula deletada com sucesso.']);
    }
}
