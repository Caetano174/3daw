<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Disciplinas</title>
</head>
<body>
    <h1>Gerenciamento de Disciplinas</h1>

    <h2>Incluir Disciplina</h2>
    <form method="POST">
        Nome: <input type="text" name="nome" required><br>
        Código: <input type="text" name="codigo" required><br>
        Professor: <input type="text" name="professor" required><br>
        <button type="submit" name="incluir">Incluir</button>
    </form>

    <h2>Alterar Disciplina</h2>
    <form method="POST">
        Código: <input type="text" name="codigo" required><br>
        Novo Nome: <input type="text" name="nome" required><br>
        Novo Professor: <input type="text" name="professor" required><br>
        <button type="submit" name="editar">Alterar</button>
    </form>

    <h2>Excluir Disciplina</h2>
    <form method="POST">
        Código: <input type="text" name="codigo" required><br>
        <button type="submit" name="excluir">Excluir</button>
    </form>

    <h2>Listar Todas as Disciplinas</h2>
    <?php listarTodasDisciplinas($disciplinas); ?>

    <h2>Listar uma Disciplina</h2>
    <form method="POST">
        Código: <input type="text" name="codigo" required><br>
        <button type="submit" name="listar">Listar</button>
    </form>
</body>
</html>