<?php

	date_default_timezone_set('Etc/UTC');
	require '../PHPMailer/PHPMailerAutoload.php';
    
	$tituloEmail = "Netflix - Confirmação de email";

	$message = 'Confirmação de email';

	$mail= new PHPMailer;
	$mail->IsSMTP(); 
	$mail->CharSet = 'UTF-8';   
	$mail->SMTPDebug = 0;       // 0 = nao mostra o debug, 2 = mostra o debug
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
?>