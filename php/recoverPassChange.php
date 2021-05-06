<?php
    require "config.php";

    $email = $_POST['email'];
    $tokenUser = $_POST['token'];
    $senha = $_POST['senha'];
    $senhaConf = $_POST['senhaConf'];
    $senhaCrip = hash('sha256', $senha);

    $tokenGet = mysqli_query($con, "SELECT token FROM usuarios_recupera WHERE email = '$email'");
    $row = mysqli_fetch_row($tokenGet);
    $token = $row[0];    

    $retorno["funcao"] = "change";

    if($token == $tokenUser && $senha == $senhaConf){
        $changePass = mysqli_query($con, "UPDATE usuarios SET cadSenha = '$senhaCrip' WHERE cadMail = '$email'");
        $retorno["status"] = "ok";
        $retorno["mensagem"] = "Senha alterada!";
        $deleteToken = mysqli_query($con, "DELETE FROM usuarios_recupera WHERE email = '$email'");
    }else if ($token != $tokenUser){
        $retorno["status"] = "nok";
        $retorno["mensagem"] = "$token";
    }else if ($senha != $senhaConf){
        $retorno["status"] = "senha";
        $retorno["Mensagem"] = "Senhas não conferem.";
    }

    echo json_encode($retorno);
?>