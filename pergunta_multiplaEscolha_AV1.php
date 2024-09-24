<?php

function perguntaMultiplaEscolha ( $pergunta, $opcoes, $correta)
{
    $id= uniqid();
    $opcoes= implode(';', $opcoes);
    $lin= "$id, $pergunta, $opcoes, $correta";
    file_put_contents('perguntasMulti.txt', $linha, FILE_APPEND);
}

if ($_SERVER['REQUEST_METHOD']== 'POST' && isset ( $_POST['tipo']) && $_POST['tipo'] == 'multipla')
{
    $pergunta= $_POST ['pergunta'];
    $opcoes= [ $_POST['opcaoA'], $_POST['opcaoB'], $_POST['opcaoC', $_POST['opcaoD']]] ;
    $correta= $_POST[ 'correta'];

    perguntaMultiplaEscolha($pergunta,$opcoes,$correta);
    echo "Pergunta criada";
}
?>

<form method = "POST">
    <input type="hidden" name="tipo" value="multipla">
    Pergunta: <input type="text" name="pergunta" required> <br>
    Opção 1 : <input type="text" name="opcaoA" required> <br>
    Opção 2 : <input type="text" name="opcaoB" required> <br>
    Opção 3 : <input type="text" name="opcaoC" required> <br>
    Opção 4 : <input type="text" name="opcaoD" required> <br>
    Resposta Correta: <input type="number" name="correta" min="1" max="4"  required>
    <input type="submit" value="Criar Pergunta">

</form>