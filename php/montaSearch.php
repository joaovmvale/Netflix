<?php
    session_start();

    require 'config.php';

    $retorno['arraySearch'] = $_SESSION['idSearch'];
    $retorno['tamanhoSearch'] = $_SESSION['countSearch'];
    
    echo json_encode($retorno);
?>