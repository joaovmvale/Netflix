<?php
    session_start();

    require "config.php";

    unset($_SESSION["usuario"]);
    unset($_SESSION["inicio"]);
    unset($_SESSION["tempolimite"]);
    unset($_SESSION["id"]);
    session_destroy();

    header("Location: http://localhost/Netflix");
?>