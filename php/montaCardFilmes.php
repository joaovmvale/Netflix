<?php

    session_start();

    require "config.php";    
    $contaFilmes = mysqli_query($con, "SELECT COUNT(*) FROM filmes");
    $row1 = mysqli_fetch_row($contaFilmes);
    $retorno["tamanhoFilmes"] = $row1[0];








    $continuar = mysqli_query($con, "SELECT * FROM filmes");
    $row = mysqli_fetch_all($continuar);
    print_r($row);
    //$rst = $row[0];
    $retorno["id"] = $rst;

    /*

    $i = 1;
    while ($i < $row) {
        $phpArray = array(
            0 => $row[0], 
            1 => $row[1], 
            2 => $row[2], 
            3 => $row[3],
            4 => $row[4], 
            5 => $row[5],
            6 => $row[6],
            7 => $row[7], 
            8 => $row[8],
            9 => $row[9],
        );
        
        $phpMatrix = array(
            $i - 1 => $phpArray
        );

        $i++;
    }


    $jsArray = json_encode($phpMatrix);

    $retorno["array"] = $row; 


    /*
    WHILE(i = 1; i < $row1; i++) {
        matrix = [[filme1], [filme2]]
        $var = 
    }

    */

    

    echo json_encode($retorno);

?>