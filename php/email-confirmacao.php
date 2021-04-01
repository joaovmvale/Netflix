<?php

$email = $_POST["email"];
$senha = $_POST["senha"];

$con = mysqli_connect("127.0.0.1:3307", "root", "root", "netflix");

mysqli_query($con, "INSERT INTO usuarios_pendentes (email, senha) VALUES('$email', '$senha') ");

?>