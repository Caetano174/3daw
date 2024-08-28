<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nome = $_POST['nome'];
    $sigla = $_POST['sigla'];
    $cargaHoraria = $_POST['carga_horaria'];

    
    if (!empty($nome) && !empty($sigla) && !empty($cargaHoraria) && is_numeric($cargaHoraria) && $cargaHoraria >= 0 && $cargaHoraria <= 99) {
        
        
        $linha = $nome . ';' . $sigla . ';' . $cargaHoraria . PHP_EOL;

        
        $file = fopen('disciplinas.txt', 'a');

       
        fwrite($file, $linha);

        
        fclose($file);

        echo "Disciplina cadastrada com sucesso!";
    } else {
        echo "Por favor, preencha todos os campos corretamente.";
    }
}
?>