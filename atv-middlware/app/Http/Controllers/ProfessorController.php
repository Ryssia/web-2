<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;
use App\Models\Eixo;

class ProfessorController extends Controller
{

    public function index()
    {

        $eixo = Eixo::all();
        // $dados = Professor::all();
        // return view('professores.index')->with('dados', $dados)->with('eixo', $eixo);

        $professores = Professor::all();
        foreach ($professores as $professor) {
            $eixo = $eixo->firstWhere('id', $professor->eixo_id);
            $professor->eixo = $eixo->nome;
        }
        return view('professores.index', compact('professores'));
    }


    public function create()
    {

        $dados = Eixo::all();
        return view('professores.create', compact('dados'));
    }


    public function store(Request $request) {

        $regras = [

            'nome' => 'required|max:100|min:10',
            'email' => 'required|max:250|min:15|unique:professores',
            'siape' => 'required|max:10|min:8|unique:professores',
            'eixo_id' => 'required',
            'status' => 'required'

        ];

        $msgs = [

            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
            "unique" => "Já existe um professor cadastrado com esse [:attribute]!"

        ];

        $request->validate($regras, $msgs);

        $professor = new Professor();
        $professor->nome = $request->nome;
        $professor->email = $request->email;
        $professor->siape = $request->siape;
        $professor->ativo = $request->status;

        $eixo = Eixo::find($request->input('eixo_id'));
        $professor->eixo()->associate($eixo);
        $professor->save();
        return redirect()->route('professores.index');
    }


    public function show($id)
    {
    }


    public function edit($id)
    {
        $eixos = Eixo::all();
        $dados = Professor::find($id);   //buscando um dado específico no banco de dados
        return view('professores.edit')->with('dados', $dados)->with('eixos', $eixos);
    }


    public function update(Request $request, $id)
    {

        $curso = Professor::find($id);
        $curso->fill(['nome' => $request->nome, 'email' => $request->email, 'siape' => $request->siape, 'eixo_id' => $request->eixo_id, 'ativo' => $request->status]);    //altera nome no banco
        $curso->save();
        return redirect()->route('professores.index');
    }


    public function destroy($id)
    {

        Professor::destroy($id);
        return redirect()->route('professores.index');
    }
}
