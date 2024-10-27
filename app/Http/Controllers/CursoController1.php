<?php
// Controller: CursoController.php
namespace App\Http\Controllers;
use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController1 extends Controller {
    public function index() { return Curso::all(); }
    public function store(Request $request) { return Curso::create($request->all()); }
    public function show($id) { return Curso::findOrFail($id); }
    public function update(Request $request, $id) { 
        $curso = Curso::findOrFail($id); 
        $curso->update($request->all()); 
        return $curso; 
    }
    public function destroy($id) { Curso::destroy($id); }
}