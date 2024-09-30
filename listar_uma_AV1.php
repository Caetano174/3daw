<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idPergunta = $_POST['id'];

   
    $arquivo = file('perguntas.txt');

    
    $perguntaEncontrada = false;

    foreach ($arquivo as $linha) {
        $partes = explode('|', $linha);

        if ($partes[0] == $idPergunta) {
            $perguntaEncontrada = true;

            
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
            break;
        }
    }

    
    if (!$perguntaEncontrada) {
        echo "Pergunta com ID $idPergunta não encontrada.";
    }
}
?>
