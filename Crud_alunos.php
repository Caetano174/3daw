<?php

$alunos = [];


function incluirAluno(&$alunos, $nome, $cpf, $matricula, $dataNascimento) {
    $alunos[] = [
        'nome' => $nome,
        'cpf' => $cpf,
        'matricula' => $matricula,
        'dataNascimento' => $dataNascimento
    ];
}


function alterarAluno(&$alunos, $matricula, $novoNome, $novoCpf, $novaDataNascimento) {
    foreach ($alunos as &$aluno) {
        if ($aluno['matricula'] == $matricula) {
            $aluno['nome'] = $novoNome;
            $aluno['cpf'] = $novoCpf;
            $aluno['dataNascimento'] = $novaDataNascimento;
            return true;
        }
    }
    return false;
}


function excluirAluno(&$alunos, $matricula) {
    foreach ($alunos as $key => $aluno) {
        if ($aluno['matricula'] == $matricula) {
            unset($alunos[$key]);
            return true;
        }
    }
    return false;
}


function listarTodosAlunos($alunos) {
    echo "<h2>Lista de Alunos</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Nome</th><th>CPF</th><th>Matrícula</th><th>Data de Nascimento</th><th>Ações</th></tr>";
    foreach ($alunos as $aluno) {
        echo "<tr>
                <td>{$aluno['nome']}</td>
                <td>{$aluno['cpf']}</td>
                <td>{$aluno['matricula']}</td>
                <td>{$aluno['dataNascimento']}</td>
                <td>
                    <form method='POST' style='display:inline'>
                        <input type='hidden' name='matricula' value='{$aluno['matricula']}'>
                        <button type='submit' name='excluir'>Excluir</button>
                    </form>
                    <form method='POST' style='display:inline'>
                        <input type='hidden' name='matricula' value='{$aluno['matricula']}'>
                        <button type='submit' name='editar'>Editar</button>
                    </form>
                </td>
            </tr>";
    }
    echo "</table>";
}


function listarAluno($alunos, $matricula) {
    foreach ($alunos as $aluno) {
        if ($aluno['matricula'] == $matricula) {
            echo "<h2>Detalhes do Aluno</h2>";
            echo "Nome: {$aluno['nome']}<br>";
            echo "CPF: {$aluno['cpf']}<br>";
            echo "Matrícula: {$aluno['matricula']}<br>";
            echo "Data de Nascimento: {$aluno['dataNascimento']}<br>";
            return;
        }
    }
    echo "Aluno não encontrado!";
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['incluir'])) {
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $matricula = $_POST['matricula'];
        $dataNascimento = $_POST['dataNascimento'];
        incluirAluno($alunos, $nome, $cpf, $matricula, $dataNascimento);
    }

    if (isset($_POST['editar'])) {
        $matricula = $_POST['matricula'];
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $dataNascimento = $_POST['dataNascimento'];
        alterarAluno($alunos, $matricula, $nome, $cpf, $dataNascimento);
    }

    if (isset($_POST['excluir'])) {
        $matricula = $_POST['matricula'];
        excluirAluno($alunos, $matricula);
    }

    if (isset($_POST['listar'])) {
        $matricula = $_POST['matricula'];
        listarAluno($alunos, $matricula);
    }
}
?>
