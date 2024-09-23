<?php

$disciplinas = [];


function incluirDisciplina(&$disciplinas, $nome, $codigo, $professor) {
    $disciplinas[] = [
        'nome' => $nome,
        'codigo' => $codigo,
        'professor' => $professor
    ];
}


function alterarDisciplina(&$disciplinas, $codigo, $novoNome, $novoProfessor) {
    foreach ($disciplinas as &$disciplina) {
        if ($disciplina['codigo'] == $codigo) {
            $disciplina['nome'] = $novoNome;
            $disciplina['professor'] = $novoProfessor;
            return true;
        }
    }
    return false;
}


function excluirDisciplina(&$disciplinas, $codigo) {
    foreach ($disciplinas as $key => $disciplina) {
        if ($disciplina['codigo'] == $codigo) {
            unset($disciplinas[$key]);
            return true;
        }
    }
    return false;
}


function listarTodasDisciplinas($disciplinas) {
    echo "<h2>Lista de Disciplinas</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Código</th><th>Nome</th><th>Professor</th><th>Ações</th></tr>";
    foreach ($disciplinas as $disciplina) {
        echo "<tr>
                <td>{$disciplina['codigo']}</td>
                <td>{$disciplina['nome']}</td>
                <td>{$disciplina['professor']}</td>
                <td>
                    <form method='POST' style='display:inline'>
                        <input type='hidden' name='codigo' value='{$disciplina['codigo']}'>
                        <button type='submit' name='excluir'>Excluir</button>
                    </form>
                    <form method='POST' style='display:inline'>
                        <input type='hidden' name='codigo' value='{$disciplina['codigo']}'>
                        <button type='submit' name='editar'>Editar</button>
                    </form>
                </td>
            </tr>";
    }
    echo "</table>";
}


function listarDisciplina($disciplinas, $codigo) {
    foreach ($disciplinas as $disciplina) {
        if ($disciplina['codigo'] == $codigo) {
            echo "<h2>Detalhes da Disciplina</h2>";
            echo "Código: {$disciplina['codigo']}<br>";
            echo "Nome: {$disciplina['nome']}<br>";
            echo "Professor: {$disciplina['professor']}<br>";
            return;
        }
    }
    echo "Disciplina não encontrada!";
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['incluir'])) {
        $nome = $_POST['nome'];
        $codigo = $_POST['codigo'];
        $professor = $_POST['professor'];
        incluirDisciplina($disciplinas, $nome, $codigo, $professor);
    }

    if (isset($_POST['editar'])) {
        $codigo = $_POST['codigo'];
        $nome = $_POST['nome'];
        $professor = $_POST['professor'];
        alterarDisciplina($disciplinas, $codigo, $nome, $professor);
    }

    if (isset($_POST['excluir'])) {
        $codigo = $_POST['codigo'];
        excluirDisciplina($disciplinas, $codigo);
    }

    if (isset($_POST['listar'])) {
        $codigo = $_POST['codigo'];
        listarDisciplina($disciplinas, $codigo);
    }
}

?>
