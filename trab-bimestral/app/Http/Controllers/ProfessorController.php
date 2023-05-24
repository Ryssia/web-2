<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;
use App\Models\Eixo;

class ProfessorController extends Controller{
    
    public function index() {

        $eixo = Eixo::all();
        $dados = Professor::all();
        return view('professores.index')->with('dados', $dados)->with('eixo', $eixo);
    }

   
    public function create() {

        $dados = Eixo::all();
        return view('professores.create',compact('dados'));
    }

    
    public function store(Request $request) {

        Professor::create(['nome' => $request->nome, 'email' => $request->email, 'siape' => $request->siape, 'eixo_id' => $request->eixo_id, 'ativo' => $request->status]);
        return redirect()->route('professores.index');
    }

   
    public function show($id) {
        
    }

    
    public function edit($id) {
        $eixos = Eixo::all();
        $dados = Professor::find($id);   //buscando um dado específico no banco de dados
        return view('professores.edit')->with('dados', $dados)->with('eixos', $eixos);
    }

    
    public function update(Request $request, $id) {
        
        $curso = Professor::find($id);
        $curso->fill(['nome' => $request->nome, 'email' => $request->email, 'siape' => $request->siape, 'eixo_id' => $request->eixo_id, 'ativo' => $request->status]);    //altera nome no banco
        $curso->save();
        return redirect()->route('professores.index');
    }

   
    public function destroy($id) {
        
        Professor::destroy($id);
        return redirect()->route('professores.index');
    }
}
