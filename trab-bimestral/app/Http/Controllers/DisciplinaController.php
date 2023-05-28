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

        $regras = [

            'nome' => 'required|max:100|min:10',
            'carga' => 'required|max:12|min:1',
            'curso_id' => 'required'
        ];

        $msgs = [

            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",

        ];

        $request->validate($regras, $msgs);

        Disciplina::create([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'curso_id' => $request->curso_id,
            'carga' => $request->carga
        ]);

        //Disciplina::create(['nome' => $request->nome,'curso_id'=>$request->curso_id,'carga'=>$request->carga]);
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
