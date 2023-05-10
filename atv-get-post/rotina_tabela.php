<?php


function readArray(String $chave = null)
{

    $pessoas = array();
    $fp = fopen('pessoas.txt', 'r');

    if ($fp && $chave == null) {

        while (!feof($fp)) {
            $arr = array();
            $cpf = fgets($fp);
            $dados = fgets($fp);
            if (!empty($dados)) {
                $arr = explode("#", $dados);
                $pessoas[$cpf] = $arr;
            }
        }

        fclose($fp);
        return $pessoas;
    } else {
        while (!feof($fp)) {
            if (fgets($fp) == $chave) {
                $cpf = array();
                $dados = fgets($fp);
                if (!empty($dados)) {
                    $arr = explode("#", $dados);
                    $cpf = $arr;
                }
            }
        }
        fclose($fp);
        return $cpf;
    }
}

function loadTable()
{

    // Carrega Dados do Arquivo
    $arr = readArray();

    foreach ($arr as $chave => $dados) {
        echo "<tr>";
        echo "<th scope='row'>$chave</th>";
        foreach ($dados as $item) {
            echo "<td>" . $item . "</td>";
        }
        echo "<td>";
        echo "<a href='update.php?cpf=$chave' class='btn btn-success'>";
        echo "<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='#FFF' class='bi bi-arrow-counterclockwise' viewBox='0 0 16 16'>";
        echo "<path fill-rule='evenodd' d='M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z'/>";
        echo "<path d='M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z'/>";
        echo "</svg>";
        echo "</a>";
        echo "<a href='delete.php?cpf=$chave' class='btn btn-danger'>";
        echo "<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='#FFF' class='bi bi-trash-fill' viewBox='0 0 16 16'>";
        echo "<path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z' />";
        echo "</svg>";
        echo "</a>";
        echo "</td>";
        echo "</tr>";
    }
}




function create(array $pessoa)
{
    $fp = fopen("pessoas.txt", "a+");

    if ($fp) {
        foreach ($pessoa as $cpf => $dados) {

            if (!empty($cpf) && !empty($dados['endereco'] && !empty($dados['nome']) && !empty($dados['telefone']))) {

                fputs($fp, "$cpf\n");
                $linha = $dados['nome'] . "#" . $dados['endereco'] . "#" . $dados['telefone'];
                fputs($fp, "$linha\n");
            } else {
            }
        }
        fclose($fp);
    }
}

function update($cpf, $dados) {
    $arquivo = "pessoas.txt";
    $arquivoTemporario = "pessoas_temp.txt";
    $encontrou = false;

    // Abre o arquivo original para leitura e o arquivo temporário para escrita
    $fpOriginal = fopen($arquivo, "r");
    $fpTemp = fopen($arquivoTemporario, "w");

    if ($fpOriginal && $fpTemp) {
        while (!feof($fpOriginal)) {
            $linha = fgets($fpOriginal);

            if (trim($linha) != "") {
                $campos = explode("#", trim($linha));

                if ($campos[0] == $cpf) {
                    // Escreve a linha atualizada no arquivo temporário
                    fputs($fpTemp, "$cpf#{$dados['nome']}#{$dados['endereco']}#{$dados['telefone']}\n");
                    $encontrou = true;
                } else {
                    // Escreve a linha original no arquivo temporário
                    fputs($fpTemp, $linha);
                }
            }
        }

        fclose($fpOriginal);
        fclose($fpTemp);

        if (!$encontrou) {
            // Não encontrou o registro com o CPF informado
            unlink($arquivoTemporario);
            return false;
        } else {
            // Renomeia o arquivo temporário para o arquivo original
            unlink($arquivo);
            rename($arquivoTemporario, $arquivo);
            return true;
        }
    } else {
        return false;
    }
}

function delete($cpf) {
    $linhas = file("pessoas.txt");
    $novoConteudo = "";
    $excluindo = false;

    foreach ($linhas as $linha) {
        $campos = explode("#", trim($linha));

        if ($campos[0] == $cpf) {
            $excluindo = true;
            continue;
        }

        if (!$excluindo) {
            $novoConteudo .= $linha;
        } elseif ($campos[0] != "") {
            // Se chegou aqui, encontrou um novo CPF, então para de excluir
            $excluindo = false;
            $novoConteudo .= $linha;
        }
    }

    if (!$excluindo) {
        // Se não estava excluindo nada, não encontrou o registro com o CPF informado
        return false;
    }

    file_put_contents("pessoas.txt", $novoConteudo);
    return true;
}
