<?php
    require "config.php";

    if (isset($_GET['vKey'])){
        $vKey = $_GET['vKey'];

        $resultSet = mysqli_query($con, "SELECT ativado, vKey FROM usuarios_pendentes WHERE ativado = 0 AND vKey = '$vKey' LIMIT 1");

        if ($resultSet->num_rows == 1) {
            $update = mysqli_query($con, "UPDATE usuarios_pendentes SET ativado = 1 WHERE vKey = '$vKey' LIMIT 1");

            if ($update) {
                header("Location: http://localhost/Netflix/pages/emailOk");
            }else{
                header("Location: http://localhost/Netflix/pages/emailNok");
            }

        }else{
            header("Location: http://localhost/Netflix/pages/emailNok");
        }
        
    }else{
        header("Location: http://localhost/Netflix/pages/emailNok");
    }
?>