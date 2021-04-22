<?php

	require "config.php";

	$email = $_POST["email"];
	$password = $_POST["password_hash"];

    $verificador = mysqli_query($con, "SELECT * FROM usuarios_pendentes WHERE email='$email' AND senha='$password'");
	$resultado = mysqli_query($con, "INSERT INTO usuarios_pendentes (email, senha) VALUES ('$email', '$password')");

	$retorno["status"] = "n";
	$retorno["mensagem"] = "erro ao cadastrar usuario";
	$retorno["funcao"] = "cadastro";

    if($resultado == true){
		$retorno["status"] = "s";
		$retorno["mensagem"] = "usuario cadastrado";
	}

	echo json_encode($retorno);
?>