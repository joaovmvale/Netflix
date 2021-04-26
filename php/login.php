<?php

    session_start();

    require "config.php";    

    $email = $_POST["email"];
	$password = $_POST["password_hash"];

    $_SESSION['mail'] = $email;

    $continuar = mysqli_query($con, "SELECT * FROM usuarios_pendentes WHERE email = '$email'");
    $verificar = mysqli_query($con, "SELECT * FROM usuarios_pendentes WHERE email = '$email' AND ativado = '0'");
    $logar = mysqli_query($con, "SELECT * FROM usuarios WHERE cadMail = '$email' AND cadSenha = '$password'");

    $retorno["funcao"] = "login";
    if (mysqli_num_rows($verificar) > 0){
        $retorno["status"] = "verificar";
        $retorno["mensagem"] = "Por favor, verifique o seu e-mail!";
    } else if (mysqli_num_rows($continuar) == 0){
        $retorno["status"] = "cadastrar";
        $retorno["mensagem"] = "Email nao cadastrado";
    }else if (mysqli_num_rows($continuar) > 0){
        $retorno["status"] = "continuar";
        $retorno["mensagem"] = "Por favor, continue seu cadastro!";
    }else if (mysqli_num_rows($logar) > 0){
        $retorno["status"] = "logar";
        $retorno["mensagem"] = "";
    }

    echo json_encode($retorno);
?>