<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eixo;

class EixoController extends Controller{
    
    public function index() {   //tela principal, passa dados

        $dados = Eixo::all();
        return view('eixos.index')->with('dados', $dados);
    }


    public function create(){      //chama view do create 
        return view('eixos.create');
    }


    public function store(Request $request){    //salva dados no banco
        Eixo::create(['nome' => $request->nome]);
        return redirect()->route('eixos.index');
    }

 
    // public function show($id){
        

    // }

    public function edit($id){

        $dados = Eixo::find($id);   //buscando um dado específico no banco de dados
        return view('eixos.edit')->with('dados', $dados);
    }


    public function update(Request $request, $id) {
        $eixo = Eixo::find($id);
        $eixo->fill(['nome' => $request->nome]);    //altera nome no banco
        $eixo->save();
        return redirect()->route('eixos.index');    //retorna para a view principal
    }

 
    public function destroy($id) {
        Eixo::destroy($id);
        return redirect()->route('eixos.index');
    }
}
