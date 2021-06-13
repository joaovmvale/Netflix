<?php
    session_start();

    require 'config.php';

    $keyword = $_POST['keyword'];

    $search = mysqli_query($con, "SELECT * FROM filmes WHERE genero LIKE '%$keyword%' OR titulo LIKE '%$keyword%' OR ano LIKE '$keyword' OR relevancia LIKE '$keyword%' OR elenco LIKE '%$keyword%'");
    $row = mysqli_fetch_all($search);
    $_SESSION['idSearch'] = $row;

    $contaSearch = mysqli_query($con, "SELECT COUNT(*) FROM filmes WHERE genero LIKE '%$keyword%' OR titulo LIKE '%$keyword%' OR ano LIKE '$keyword' OR relevancia LIKE '$keyword%' OR elenco LIKE '%$keyword%'");
    $rowConta = mysqli_fetch_row($contaSearch);
    $_SESSION['countSearch'] = $rowConta[0];

    echo json_encode($row);
?>