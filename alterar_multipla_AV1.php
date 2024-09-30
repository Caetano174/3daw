<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idPergunta = $_POST['id'];
    $novoEnunciado = $_POST['enunciado'];
    $novasRespostas = [
        $_POST['resposta1'],
        $_POST['resposta2'],
        $_POST['resposta3'],
        $_POST['resposta4']
    ];
    $novaRespostaCorreta = $_POST['resposta_correta'];

    
    $arquivo = file('perguntas.txt');
    foreach ($arquivo as $key => $linha) {
        $partes = explode('|', $linha);
        if ($partes[0] == $idPergunta && $partes[1] == 'multipla') {
            
            $arquivo[$key] = "$idPergunta|multipla|$novoEnunciado|" . implode('|', $novasRespostas) . "|$novaRespostaCorreta\n";
        }
    }

    
    file_put_contents('perguntas.txt', implode('', $arquivo));

    echo "Pergunta de múltipla escolha alterada";
}
?>
