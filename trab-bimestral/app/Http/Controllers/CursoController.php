<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Eixo;

class CursoController extends Controller
{

    public function index()
    {

        $dados = Curso::all();
        return view('cursos.index')->with('dados', $dados);
    }


    public function create()
    {

        $dados = Eixo::all();
        return view('cursos.create')->with('dados', $dados);
    }


    public function store(Request $request)
    {

        $regras = [

            'nome' => 'required|max:50|min:10',
            'sigla' => 'required|max:8|min:2',
            'tempo' => 'required|max:2|min:1'

        ];

        $msgs = [

            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",

        ];

        $request->validate($regras, $msgs);

        Curso::create([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'sigla' => $request->sigla,
            'tempo' => $request->tempo,
            'eixo_id' => $request->eixo_id
        ]);

        //Curso::create(['nome' => $request->nome, 'sigla' => $request->sigla, 'tempo' => $request->tempo, 'eixo_id' => $request->eixo_id]);
        return redirect()->route('cursos.index');
    }


    public function show($id)
    {

        $curso = Curso::find($id);
        $eixo = Eixo::find($curso->eixo_id);

        return view('cursos.show')->with('curso', $curso)->with('eixo', $eixo);
    }


    public function edit($id)
    {

        $eixos = Eixo::all();
        $dados = Curso::find($id);   //buscando um dado específico no banco de dados
        return view('cursos.edit')->with('dados', $dados)->with('eixos', $eixos);
    }

    public function update(Request $request, $id)
    {

        $curso = Curso::find($id);
        $curso->fill(['nome' => $request->nome, 'sigla' => $request->sigla, 'tempo' => $request->tempo, 'eixo_id' => $request->eixo_id]);    //altera nome no banco
        $curso->save();
        return redirect()->route('cursos.index');    //retorna para a view principal
    }

    public function destroy($id)
    {

        Curso::destroy($id);
        return redirect()->route('cursos.index');
    }
}
