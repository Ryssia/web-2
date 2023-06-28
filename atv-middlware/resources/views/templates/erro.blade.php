<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Acesso negado"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Eixos @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

<body class="aw-layout-simple-page">
        <img src="https://media3.giphy.com/media/zCpYQh5YVhdI1rVYpE/giphy.gif?cid=ecf05e47ufqg8fbbyr5r049ncd5gimufk9vic1414rjj0azo&ep=v1_gifs_search&rid=giphy.gif&ct=g" 
            alt="Imagem de stop"
            width="300"
            height="300"
        >
        <br/><br/>
     <a href="javascript:history.back()" class="btn btn-primary">Voltar</a>
        
    

  
</body>
</html>


@endsection