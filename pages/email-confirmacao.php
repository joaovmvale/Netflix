<?php
    $con = mysqli_connect("127.0.0.1:3307", "root", "root", "netflix");

    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $vKey = md5(time().$email);

    $insereBD = mysqli_query($con, "INSERT INTO usuarios_pendentes (email, senha, vKey) VALUES('$email', '$senha', '$vKey')");

    if ($insereBD){
        date_default_timezone_set('Etc/UTC');
        require '../PHPMailer/PHPMailerAutoload.php';

        $tituloEmail = "Netflix - Confirmação de email";

        $message = "Prezado, utilize o link abaixo para verificar o seu e-mail.\n<a href='http://localhost/Netflix/pages/verificar.php?vKey=$vKey'>Confirmação de E-mail</a>";

        $mail= new PHPMailer;
        $mail->IsSMTP(); 
        $mail->CharSet = 'UTF-8';   
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;     
        $mail->SMTPSecure = 'ssl';  
        $mail->Host = 'smtp.gmail.com'; 
        $mail->Port = 465; 
        $mail->Username = 'netflix.puc@gmail.com'; 
        $mail->Password = 'zepelintrameumalandro';
        $mail->SetFrom('netflix.puc@gmail.com', 'Netflix');
        $mail->addAddress($_POST["email"]);
        $mail->Subject = $tituloEmail;
        $mail->msgHTML($message);
        $mail->send();
    }else{
        echo "Não foi possível se comunicar ao banco de dados. :C SAD BOYS";
    }
?>