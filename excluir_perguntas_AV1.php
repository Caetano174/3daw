<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idPergunta = $_POST['id'];

 
    $arquivo = file('perguntas.txt');
    $novoArquivo = [];
    
    
    foreach ($arquivo as $linha) {
        $partes = explode('|', $linha);
        if ($partes[0] != $idPergunta) {
            $novoArquivo[] = $linha;
        }
    }

    
    file_put_contents('perguntas.txt', implode('', $novoArquivo));

    echo "Pergunta excluída";
}
?>
