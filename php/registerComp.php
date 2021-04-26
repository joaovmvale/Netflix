<?php   
    session_start();

    require "config.php";    

    $email = $_SESSION['mail'];
    
    $password = mysqli_query($con, "SELECT senha FROM usuarios_pendentes WHERE email = '$email'");

    $row = mysqli_fetch_row($password);

    $senha = $row[0];

    $nome = $_POST['nome'];
    $cadNasc = $_POST['cadNasc'];
    $cadNroCartao = $_POST['cadNroCartao'];
    $cadVldCartao = $_POST['cadVldCartao'];
    $cadCodCartao = $_POST['cadCodCartao'];
    $cadNomeCartao = $_POST['cadNomeCartao'];
    $cadCpfCnpj = $_POST['cadCpfCnpj'];

    $cadastro = mysqli_query($con,"INSERT INTO usuarios (nome, cadNasc, cadMail, cadSenha, cadNroCartao, cadVldCartao, cadCodCartao, cadNomeCartao, cadCpfCnpj) VALUES('$nome', '$cadNasc', '$email', '$senha', '$cadNroCartao', '$cadVldCartao', '$cadCodCartao', '$cadNomeCartao', '$cadCpfCnpj')");

    $retorno["funcao"] = "cadastro";

    if ($cadastro == true){
        $retorno["status"] = "ok";
        $retorno["mensagem"] = "Cadastro concluido!";
    }else{
        $retorno["status"] = "nok";
        $retorno["mensagem"] = "Falha no cadastro";
    }

    echo json_encode($retorno);
?>