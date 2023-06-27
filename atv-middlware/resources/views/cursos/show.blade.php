<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos</title>
</head>

<body>
    <a href="{{route('cursos.index')}}">Voltar</a>
    <br>
    <label>ID: </label>{{$curso['id']}}
    <br>
    <label>Nome: </label>{{$curso['nome']}}
    <br>
    <label>Sigla: </label>{{$curso['sigla']}}
    <br>
    <label>Tempo: </label>{{$curso['tempo']}}
    <br>
    <label>Eixo: </label>{{$eixo['nome']}}
</body>

</html>