<?php
    session_start();

    require "config.php";

    $email = $_POST["email"];

    $_SESSION['mail'] = $email;

    $recoverPass = mysqli_query($con, "SELECT cadMail FROM usuarios WHERE cadMail = '$email'");
    $row = mysqli_fetch_row($recoverPass);
    $recoverEmail = $row[0];

    $complete = mysqli_query($con, "SELECT * FROM usuarios_pendentes WHERE email = '$email'");
    $retorno["funcao"] = "recover";

    if (mysqli_num_rows($recoverPass) > 0){
        $retorno["status"] = "enviado";
        $retorno["mensagem"] = "Recuperacao enviada";

		date_default_timezone_set('Etc/UTC');
        require '../PHPMailer/PHPMailerAutoload.php';

        $tituloEmail = "Netflix - Recuperação de senha";

        $message = "<h1>Ficamos felizes com o seu cadastro!</h1><br>
		Para concluir o seu cadastro, <strong>clique</strong> no link abaixo:<br>
		<a href='http://www.youtube.com'>RECUPERAÇÃO DE SENHA</a>";

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
        $mail->addAddress($recoverEmail);
        $mail->Subject = $tituloEmail;
        $mail->msgHTML($message);
        $mail->send();
    }else if (mysqli_num_rows($complete) > 0){
        $retorno["status"] = "completar";
        $retorno["mensagem"] = "Complete o seu cadastro";
    }else{
        $retorno["status"] = "cadastrar";
        $retorno["mensagem"] = "E-mail nao encontrado, se cadastre";
    }

    echo json_encode($retorno);
?>