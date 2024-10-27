<?php

namespace App\Http\Controllers;

use App\Models\Inscricao;
use Illuminate\Http\Request;

class InscricaoController extends Controller
{
    // Lista todas as inscrições de um usuário
    public function index()
    {
        return Inscricao::where('user_id', auth()->id())->get();
    }

    // Inscreve um usuário em um curso
    public function store(Request $request)
    {
        $request->validate([
            'curso_id' => 'required|exists:cursos,id',
        ]);

        // Verifica se já está inscrito
        $exists = Inscricao::where('user_id', auth()->id())
            ->where('curso_id', $request->curso_id)
            ->exists();

        if ($exists) {
            return response()->json(['message' => 'Já inscrito no curso.'], 400);
        }

        $inscricao = new Inscricao();
        $inscricao->user_id = auth()->id();
        $inscricao->curso_id = $request->curso_id;
        $inscricao->save();

        return response()->json(['message' => 'Inscrição realizada com sucesso.']);
    }

    // Cancela a inscrição de um curso
    public function destroy($id)
    {
        $inscricao = Inscricao::where('user_id', auth()->id())->findOrFail($id);
        $inscricao->delete();

        return response()->json(['message' => 'Inscrição cancelada com sucesso.']);
    }
}
