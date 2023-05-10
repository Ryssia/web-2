<?php
    include_once 'rotina_tabela.php';
    $cpf = $_GET['cpf'];
    
    
    $dados = readArray($cpf);

    
    
    
    
    
?>

<html lang="pt-br">

<head>
    <title> Formulário - POST </title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-md navbar-dark bg-secondary">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">
                <span class="ms-3 fs-5">Usuários do Sistema</span>
            </a>
    </nav>
    <div class="container">

        <form action="trata_update.php" method="post">
            <h1>UPDATE</h1>
            <input type="hidden" name="form_submit" value="ok">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="cpf" id="floatingCpf" placeholder="Cpf" value=<?php echo $cpf ?>>
                <label for="floatingCpf">Cpf</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nome" id="floatingNome" placeholder="Nome" value=<?php echo $dados[0] ?> >
                <label for="floatingNome">Nome</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="telefone" id="floatingTelefone" placeholder="Telefone" value=<?php echo $dados[2] ?> >
                <label for="floatingPTelefone">Telefone</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="endereco" id="floatingEndereco" placeholder="Endereco" value=<?php echo $dados[1] ?> >
                <label for="floatingEndereco">Endereco</label>
            </div>
            



            <div class="d-grid gap-2 d-md-block ">

                <a href="index.php" class="btn btn-danger btn-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                    </svg>
                    Voltar</a>

                <button class="btn btn-danger btn-lg" type="submit" >Enviar
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                        <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                    </svg>
                </button>


            </div>

        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>

<?php

    