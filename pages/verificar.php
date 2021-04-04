<?php
$con = mysqli_connect("127.0.0.1:3307", "root", "root", "netflix");

if (isset($_GET['vKey'])){
    $vKey = $_GET['vKey'];

    $resultSet = mysqli_query($con, "SELECT ativado, vKey FROM usuarios_pendentes WHERE ativado = 0 AND vKey = '$vKey' LIMIT 1");

    if ($resultSet->num_rows == 1) {
        $update = mysqli_query($con, "UPDATE usuarios_pendentes SET ativado = 1 WHERE vKey = '$vKey' LIMIT 1");

        if ($update) {
            echo "Conta verificada, vamos prosseguir com o cadastro ;D";
        }else{
            echo "Opa, algo de errado não está certo! ;C";
        }

    }else{
        echo "Conta inválida ou já foi verificada ;S";
    }
    
}else{
    die("Hmm, algo não deu certo :C");
}
?>

<html>
    <head>
    </head>

    <body>
    </body>
</html>