<?php

    session_start();

    require "config.php";    

    $email = $_POST["email"];
	$password = $_POST["password_hash"];

    $_SESSION['mail'] = $email;

    $continuar = mysqli_query($con, "SELECT * FROM usuarios_pendentes WHERE email = '$email' and senha = '$password'");
    $verificar = mysqli_query($con, "SELECT * FROM usuarios_pendentes WHERE email = '$email' AND ativado = '0'");
    $logar = mysqli_query($con, "SELECT * FROM usuarios WHERE cadMail = '$email' AND cadSenha = '$password'");
    $senhaErrada = mysqli_query($con, "SELECT * FROM usuarios WHERE cadMail = '$email'");
    $senhaErradaP = mysqli_query($con, "SELECT * FROM usuarios_pendentes WHERE email = '$email' AND senha <> '$password'");
    $adminLogin = mysqli_query($con, "SELECT * FROM usuarios WHERE cadMail = '$email' AND cadSenha = '$password' AND adm = 1");
    $retorno["funcao"] = "login";
    if (mysqli_num_rows($verificar) > 0){
        $retorno["status"] = "verificar";
        $retorno["mensagem"] = "Por favor, verifique o seu e-mail!";
    }else if (mysqli_num_rows($logar) > 0){
        if (mysqli_num_rows($adminLogin) > 0){

            $registro = mysqli_fetch_assoc($logar);

            $_SESSION["usuario"] = $registro["cadMail"];
            $_SESSION["id"] = session_id();
            $_SESSION["inicio"] = time();
            $_SESSION["tempolimite"] = 1000;

            $retorno["mensagem"] = "Seja bem-vindo administrador!";
            $retorno["status"] = "adm";
        } else {
            $registro = mysqli_fetch_assoc($logar);

            $_SESSION["usuario"] = $registro["cadMail"];
            $_SESSION["id"] = session_id();
            $_SESSION["inicio"] = time();
            $_SESSION["tempolimite"] = 1000;

            $retorno["mensagem"] = "Seja bem-vindo!";
            $retorno["status"] = "logar";
        }
    }else if (mysqli_num_rows($senhaErrada) > 0 || mysqli_num_rows($senhaErradaP) > 0){
        $retorno["status"] = "senha";
        $retorno["mensagem"] = "Senha errada!";
    }
    else if (mysqli_num_rows($continuar) == 0){
        $retorno["status"] = "cadastrar";
        $retorno["mensagem"] = "Email nao cadastrado";
    }else if (mysqli_num_rows($continuar) > 0){
        $retorno["status"] = "continuar";
        $retorno["mensagem"] = "Por favor, continue seu cadastro!";
    }
    echo json_encode($retorno);
?>