<?php

    session_start();
    require "config.php";  

    $contaFilmes = mysqli_query($con, "SELECT COUNT(*) FROM filmes");
    $row1 = mysqli_fetch_row($contaFilmes);
    $retorno["tamanhoFilmes"] = $row1[0];


    $continuar = mysqli_query($con, "SELECT * FROM filmes");
    $row = mysqli_fetch_all($continuar);
    $retorno["filmes"] = $row;

    echo json_encode($retorno);

?>