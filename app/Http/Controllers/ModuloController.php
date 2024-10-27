<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use Illuminate\Http\Request;

class ModuloController extends Controller
{
    // Lista todos os módulos de um curso
    public function index($cursoId)
    {
        return Modulo::where('curso_id', $cursoId)->get();
    }

    // Mostra um módulo específico
    public function show($id)
    {
        return Modulo::findOrFail($id);
    }

    // Cria um novo módulo para um curso
    public function store(Request $request)
    {
        $request->validate([
            'curso_id' => 'required|exists:cursos,id',
            'titulo' => 'required|string|max:255',
        ]);

        return Modulo::create($request->all());
    }

    // Atualiza um módulo existente
    public function update(Request $request, $id)
    {
        $modulo = Modulo::findOrFail($id);
        $modulo->update($request->all());

        return $modulo;
    }

    // Deleta um módulo
    public function destroy($id)
    {
        $modulo = Modulo::findOrFail($id);
        $modulo->delete();

        return response()->json(['message' => 'Módulo deletado com sucesso.']);
    }
}
