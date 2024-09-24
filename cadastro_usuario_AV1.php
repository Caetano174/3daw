<?php

if($_Server['REQUEST_METHOD'] == 'POST')
{
    $nome = $_POST ['nome'];
    $email = $_POST ['email'];
    $senha = password_hash ($_POST ['senha'], PASSWORD_DEFAULT);

    $usuario = "$nome, $email, $senha";
    file_put_contents('usuario.txt', $usuario, FILE_APPEND);
    echo "Usuário foi cadastrado";
}

?>
<form method= "POST">
    
Nome: <input type="text" name="nome" required> 
Email: <input type="email" name="email" required> 
Senha: <input type="passworld" name="senha" required> 
<input type="submit" value = " Finalizar ">

</form>