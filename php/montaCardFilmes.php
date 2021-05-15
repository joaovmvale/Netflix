<?php

    session_start();
    require "config.php";  

    $user_email = $_SESSION['mail'];

    /* RETORNA VALORES DE CADA FILME/SERIE */
    $continuar = mysqli_query($con, "SELECT * FROM filmes WHERE tipo = 'filmes'");
    $row = mysqli_fetch_all($continuar);
    $retorno["filmes"] = $row;

    $continuar2 = mysqli_query($con, "SELECT * FROM filmes WHERE tipo = 'series'");
    $row2 = mysqli_fetch_all($continuar2);
    $retorno["series"] = $row2;

    /* RETORNA FILMES FAVORITADOS */
    $get_id_bd = mysqli_query($con, "SELECT id FROM usuarios WHERE cadMail = '$user_email'");
    $fetch_id = mysqli_fetch_row($get_id_bd);
    $user_id = $fetch_id[0];

    $continuar10 = mysqli_query($con, "SELECT filmes.* FROM favoritos, filmes WHERE id_usuario = '$user_id' AND favoritos.id_filme = filmes.id");
    $row10 = mysqli_fetch_all($continuar10);
    $retorno["favoritos"] = $row10;

    /* CONTA PARA CADA CAROUSEL */
    $contaFilmes = mysqli_query($con, "SELECT COUNT(*) FROM filmes WHERE tipo = 'filmes'");
    $rowFilmes = mysqli_fetch_row($contaFilmes);
    $retorno["tamanhoFilmes"] = $rowFilmes[0];

    $contaSeries = mysqli_query($con, "SELECT COUNT(*) FROM filmes WHERE tipo = 'series'");
    $rowSeries = mysqli_fetch_row($contaSeries);
    $retorno["tamanhoSeries"] = $rowSeries[0];
    
    $contaFavoritos = mysqli_query($con, "SELECT COUNT(*) FROM favoritos WHERE id_usuario = '$user_id'");
    $rowFavoritos = mysqli_fetch_all($contaFavoritos);
    $retorno["tamanhoFavoritos"] = $rowFavoritos[0];

    echo json_encode($retorno);
?>