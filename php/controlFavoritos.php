<?php
    session_start();

    require "config.php";

    $filme_id = $_POST["id"];
    $user_email = $_SESSION['mail'];

    $get_id_bd = mysqli_query($con, "SELECT id FROM usuarios WHERE cadMail = '$user_email'");
    $fetch_id = mysqli_fetch_row($get_id_bd);
    $user_id = $fetch_id[0];

    $verificaFav = mysqli_query($con, "SELECT * FROM favoritos WHERE id_usuario = '$user_id' AND id_filme = '$filme_id'");

    if (mysqli_num_rows($verificaFav) > 0){
        $remove_fav = mysqli_query($con, "DELETE FROM favoritos WHERE id_usuario = '$user_id' AND id_filme = '$filme_id'");
    } else if (mysqli_num_rows($verificaFav) == 0){
        $insert_fav = mysqli_query($con, "INSERT INTO favoritos (id_usuario, id_filme) VALUES ('$user_id', '$filme_id')");
    }    
?>