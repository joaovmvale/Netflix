<?php
    require "config.php";

    $id = $_POST["id"];

    $rst = mysqli_query($con, "SELECT * FROM filmes WHERE id = '$id'");

    $row = mysqli_fetch_assoc($rst);

    echo json_encode($row);
?>