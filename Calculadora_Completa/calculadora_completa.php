<?php
$v1 = $_GET["a"];
$v2 = isset($_GET["b"]) ? $_GET["b"] : 0; // Verifica se o segundo valor foi fornecido
$oper = $_GET["operadores"];
$result = 0;

if ($oper == "adicao") {
    $result = $v1 + $v2;

} elseif ($oper == "subtracao") {
    $result = $v1 - $v2;

} elseif ($oper == "divisao") {
    $result = $v2 != 0 ? $v1 / $v2 : "Erro: Divisão por zero";

} elseif ($oper == "multiplicacao") {
    $result = $v1 * $v2;

} elseif ($oper == "seno") {
    
    $result = sin(deg2rad($v1)); 

} elseif ($oper == "cosseno") {

    $result = cos(deg2rad($v1)); 

} elseif ($oper == "tangente") {

    $result = tan(deg2rad($v1)); 

} elseif ($oper == "inversao_sinal") {
    $result = -$v1;

} elseif ($oper == "inverso") {
    $result = $v1 != 0 ? 1 / $v1 : "Erro: Divisão por zero";

} elseif ($oper == "raiz_quadrada") {
    $result = $v1 >= 0 ? sqrt($v1) : "Erro: Raiz quadrada de número negativo";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>

<body>
    <?php echo "<h1>Resultado: $result </h1>"; ?>
</body>

</html>
