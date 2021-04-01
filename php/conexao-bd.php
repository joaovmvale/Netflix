<?php

$conexao = mysqli_connect ("127.0.0.1", "root", "root", "netflix");

$resultado = mysqli_query($conexao, "INSERT INTO usuarios_pendentes(email, senha) VALUES ($_GET('cadMail'), $_GET('cadSenha') ");

?>