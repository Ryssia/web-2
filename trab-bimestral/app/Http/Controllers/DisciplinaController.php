<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disciplina;
use App\Models\Curso;

class DisciplinaController extends Controller
{
   
    public function index() {

        $cursos = Curso::all();
        $disciplinas = Disciplina::all();

        return view('disciplinas.index')->with('cursos',$cursos)->with('disciplinas',$disciplinas);
    }

    
    public function create() {

        $cursos = Curso::all();
        return view('disciplinas.create')->with('dados',$cursos);
    }

    
    public function store(Request $request) {

        Disciplina::create(['nome' => $request->nome,'curso_id'=>$request->curso_id,'carga'=>$request->carga]);
        return redirect()->route('disciplinas.index');
    }

 
    public function show($id) {

        $disciplina = Disciplina::find($id);
        $curso = Curso::find($disciplina->curso_id);

        return view('disciplinas.show')->with('curso',$curso)->with('disciplina',$disciplina);
    }

    
    public function edit($id) {

        $disciplina = Disciplina::find($id);
        $cursos = Curso::all();

        return view('disciplinas.edit')->with('cursos',$cursos)->with('disciplina',$disciplina);
    }

 
    public function update(Request $request, $id) {

        $disciplina = Disciplina::find($id);
        $disciplina->fill(['nome' => $request->nome,'curso_id'=>$request->curso_id,'carga'=>$request->carga]);
        $disciplina->save();

        return redirect()->route('disciplinas.index');
    }


    public function destroy($id) {

        Disciplina::destroy($id);
        return redirect()->route('disciplinas.index');
    }
}
