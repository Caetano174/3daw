<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idPergunta = $_POST['id'];
    $novoEnunciado = $_POST['enunciado'];
    $novaResposta = $_POST['resposta'];

    
    $arquivo = file('perguntas.txt');
    foreach ($arquivo as $key => $linha) {
        $partes = explode('|', $linha);
        if ($partes[0] == $idPergunta && $partes[1] == 'texto') {
            
            $arquivo[$key] = "$idPergunta|texto|$novoEnunciado|$novaResposta\n";
        }
    }

    
    file_put_contents('perguntas.txt', implode('', $arquivo));

    echo "Pergunta de texto alterada";
}
?>
