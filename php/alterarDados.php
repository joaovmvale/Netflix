<?php
    session_start();

    require "config.php";

    $email = $_SESSION["usuario"];
    $cadNroCartao = $_POST["cadNroCartao"];
    $cadVldCartao = $_POST["cadVldCartao"];
    $cadCodCartao = $_POST["cadCodCartao"];
    $cadNomeCartao = $_POST["cadNomeCartao"];

    $altNro = mysqli_query($con, "UPDATE usuarios SET cadNroCartao = '$cadNroCartao' WHERE cadMail = '$email'");
    $altVld = mysqli_query($con, "UPDATE usuarios SET cadVldCartao = '$cadVldCartao' WHERE cadMail = '$email'");
    $altCod = mysqli_query($con, "UPDATE usuarios SET cadCodCartao = '$cadCodCartao' WHERE cadMail = '$email'");
    $altNome = mysqli_query($con, "UPDATE usuarios SET cadNomeCartao = '$cadNomeCartao' WHERE cadMail = '$email'");

    $retorno["funcao"] = "retorno";
    $retorno["mensagem"] = "Dados alterados!";

    echo json_encode($retorno);
?>