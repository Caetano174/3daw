<?php
function listarDisciplinas() {
    $arquivo = 'disciplinas.txt';

    if (file_exists($arquivo)) {
        $disciplinas = file($arquivo); 
        
        if (!empty($disciplinas)) {
            echo "<table>";
            echo "<tr><th>Nome</th><th>Sigla</th><th>Carga Horária</th></tr>";
            
            foreach ($disciplinas as $disciplina) {
                $dados = explode(';', trim($disciplina)); 
                if (count($dados) == 3) { 
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($dados[0]) . "</td>"; // Nome
                    echo "<td>" . htmlspecialchars($dados[1]) . "</td>"; // Sigla
                    echo "<td>" . htmlspecialchars($dados[2]) . "</td>"; // Carga Horária
                    echo "</tr>";
                }
            }

            echo "</table>";
        } else {
            echo "Nenhuma disciplina cadastrada.";
        }
    } else {
        echo "Nenhuma disciplina cadastrada.";
    }
}

listarDisciplinas();
?>
