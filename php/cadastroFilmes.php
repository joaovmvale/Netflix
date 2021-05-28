<?php

    require "config.php";

    $titulo = $_POST["titulo"];
    $tipo = $_POST["tipo"];
    $genero = $_POST["genero"];
    $elenco = $_POST["elenco"];
    $cenas = $_POST["cenas"];
    $ano = $_POST["ano"];
    $duracao = $_POST["duracao"];
    $relevancia = $_POST["relevancia"];
    $sinopse = $_POST["sinopse"];
    $trailer = $_POST["trailer"];

    $query = mysqli_query($con, "INSERT INTO filmes (titulo, tipo, genero, elenco, cenas, ano, duracao, relevancia, sinopse, trailer) VALUES ('$titulo', '$tipo', '$genero', '$elenco', '$cenas', '$ano', '$duracao', '$relevancia', '$sinopse', '$trailer')");

    if($query) {
        $retorno["mensagem"] = "Filme inserido com sucesso!";
    } else {
        $retorno["mensagem"] = "Ocorreu um erro!";
    }
    

    echo json_encode($retorno);

?>