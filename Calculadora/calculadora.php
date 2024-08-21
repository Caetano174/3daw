<?php
$v1 = $_GET["a"];
$v2 = $_GET["b"];
$oper = $_GET["operadores"];
$result = 0;


if ($oper == "adicao")
 {
    $result = $v1 + $v2;

} elseif ($oper == "subtracao") 
{
    $result = $v1 - $v2;

} elseif ($oper == "divisao") 
{
    $result = $v1 / $v2;
    
} elseif ($oper == "multiplicacao") 
{
    $result = $v1 * $v2;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php echo "<h1>Resultado: $result </h1>"; ?>
</body>

</html>