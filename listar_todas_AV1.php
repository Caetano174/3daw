<?php

$arquivo = file('perguntas.txt');


if (!$arquivo) {
    echo "Nenhuma pergunta cadastrada.";
    exit;
}

echo "<h1>Lista de Perguntas</h1>";

foreach ($arquivo as $linha) {
    $partes = explode('|', $linha);

   
    $idPergunta = $partes[0];
    $tipo = $partes[1];
    $enunciado = $partes[2];

   
    echo "<h2>Pergunta ID: $idPergunta</h2>";
    echo "<strong>Enunciado:</strong> $enunciado<br>";

    if ($tipo == 'multipla') {
        
        echo "<strong>Tipo:</strong> Múltipla Escolha<br>";
        echo "<strong>Opções:</strong><br>";
        
        
        for ($i = 3; $i <= 6; $i++) {
            echo "Opção " . ($i - 2) . ": " . $partes[$i] . "<br>";
        }
        
       
        echo "<strong>Resposta Correta:</strong> Opção " . $partes[7] . "<br>";
    } elseif ($tipo == 'texto') {
        
        echo "<strong>Tipo:</strong> Texto Livre<br>";
        echo "<strong>Resposta:</strong> " . $partes[3] . "<br>";
    }
    
    echo "<hr>";
}
?>
