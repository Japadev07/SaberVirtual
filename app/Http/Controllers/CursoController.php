<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    // Lista todos os cursos
    public function index()
    {
        return Curso::all();
    }

    // Mostra um curso específico
    public function show($id)
    {
        return Curso::findOrFail($id);
    }

    // Cria um novo curso
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        return Curso::create($request->all());
    }

    // Atualiza um curso existente
    public function update(Request $request, $id)
    {
        $curso = Curso::findOrFail($id);
        $curso->update($request->all());

        return $curso;
    }

    // Deleta um curso
    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();

        return response()->json(['message' => 'Curso deletado com sucesso.']);
    }
}
