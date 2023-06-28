<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Disciplina;
use App\Models\Professor;
use App\Models\Aula;


class AulaController extends Controller
{
    public function index()
    {
        $disciplinas = Disciplina::all();
        $professores = Professor::where('ativo', '1')->get();



        return view('aulas.index')->with('disciplinas', $disciplinas)->with('professores', $professores);
    }

    public function store(Request $request)
    {
        $professores = $request->input('professores_id');
        Aula::truncate();



        foreach ($professores as $professorIdDisciplinaId) {
            $ids = explode('_', $professorIdDisciplinaId);
            $disciplinaId = $ids[0];
            $professorId = $ids[1];


            $professor = Professor::find($professorId);


            if (isset($professor)) {

                $disciplina = Disciplina::find($disciplinaId);

                if (isset($disciplina)) {
                    $obj_professor_disciplina = new Aula();
                    $obj_professor_disciplina->professor()->associate($professor);
                    $obj_professor_disciplina->disciplina()->associate($disciplina);
                    $obj_professor_disciplina->save();
                }
            }
        }
        return redirect()->route('disciplinas.index');
    }
}
