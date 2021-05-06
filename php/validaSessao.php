<?php

    session_start();

    require "config.php";

    $retorno["funcao"] = "valida-sessao";
    $retorno["status"] = "f";
    $retorno["mensagem"] = "";

    if(isset($_SESSION["id"]) == false){
        $retorno["status"] = "f";
        $retorno["mensagem"] = "Nao existe sessao";
    } else{
        $segundos = time() - $_SESSION["inicio"];

        if ($segundos > $_SESSION["tempolimite"]){
            unset($_SESSION["usuario"]);
            unset($_SESSION["inicio"]);
            unset($_SESSION["tempolimite"]);
            unset($_SESSION["id"]);
            session_destroy();

            $retorno["status"] = "f";
            $retorno["mensagem"] = "Sessão expirada, entre novamente!";
        }else{
            $_SESSION["inicio"] = time();
            $retorno["status"] = "t";
        }
    }

    echo json_encode($retorno);
?>