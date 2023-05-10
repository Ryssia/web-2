
<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Veterinarios", 'rota' => "veterinarios.create"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Veterinarios @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">
            <x-datatable 
                title="Veterinario" 
                crud="veterinarios" 
                :header="['id','nome','crmv','ações']" 
                :data="$veterinarios"
                :hide="[true, false, true, false]" 
            /> 
        </div>
    </div>
@endsection