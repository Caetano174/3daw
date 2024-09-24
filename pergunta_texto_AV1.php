<?php

function perguntasTexto($pergunta, $resposta)
{
    $id= uniqid();
    $linha= "$id,$pergunta,$resposta";
    file_put_contents('perguntas.txt',$linha, FILE_APPEND);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset( $_POST['tipo']) && $_POST['tipo'] == 'texto')
{
    $pergunta= $_POST [ 'pergunta'];
    $resposta= $_POST [ 'resposta'];

    perguntasTexto($pergunta, $resposta);
    echo "Pergunta de texto foi criada ";
}
?>

<form method = "POST">

<input type= "hidden" name= "tipo" value="texto">
Pergunta: <input type= "text" name= "pergunta" required> <br>
Resposta: <input type= "text" name= "resposta" required> <br>
<input type= "submit" value= "Criar Pergunta">
</form>