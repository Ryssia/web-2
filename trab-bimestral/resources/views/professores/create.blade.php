<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Novo Professor"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Professores @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <form action="{{ route('professores.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col" >
                <div class="form-floating mb-3">
                <div class="btn-group">
                    <input type="radio" class="btn-check" name="status" id="ativo" value="1"  autocomplete="off"/>
                    <label class="btn btn-primary" for="ativo">Ativo</label>

                    <input type="radio" class="btn-check" name="status" id="inativo" value="0" autocomplete="off" />
                    <label class="btn btn-secondary" for="inativo">Inativo</label>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col" >
                <div class="form-floating mb-3">
                    <input 
                        type="text" 
                        class="form-control" 
                        name="nome" 
                        placeholder="Nome"
                    />
                    <label for="nome">Nome</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col" >
                <div class="form-floating mb-3">
                    <input 
                        type="text" 
                        class="form-control" 
                        name="email" 
                        placeholder="Email"
                    />
                    <label for="emmail">Email</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col" >
                <div class="form-floating mb-3">
                    <input 
                        type="number"
                        class="form-control" 
                        name="siape" 
                        placeholder="Siape"
                    />
                    <label for="siape">Siape</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col" >
                <div class="form-floating mb-3">
                    <select name="eixo_id" class="form-select" >    <!--caixa do select-->
                        <option selected>Selecione o eixo</option>
                            <?php foreach($dados as $item){?>       <!--foreach que percorre os dados e exibe no select-->
                                <option value="<?php echo $item['id']?>"> <?php echo $item['nome']?>  </option>  
                            <?php } ?>
                    </select>
                    <label>Eixo</label>

                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <a href="{{route('professores.index')}}" class="btn btn-secondary btn-block align-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                        <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
                    </svg>
                    &nbsp; Voltar
                </a>
                <a href="javascript:document.querySelector('form').submit();" class="btn btn-success btn-block align-content-center">
                    Confirmar &nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                </a>
            </div>
        </div>
    </form>

@endsection