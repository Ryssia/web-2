<?php
include_once 'rotina_tabela.php';
header('Location: index.php');

    



$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$cpf = $_POST['cpf'];

$pessoa = array(
    $cpf => array(
        "nome" => $nome,
        "telefone" => $telefone,
        "endereco" => $endereco

    )
);


create($pessoa);


















?>



