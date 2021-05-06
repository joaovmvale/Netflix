<?php
	require "config.php";

	$email = $_POST["email"];
	$password = $_POST["password_hash"];
	$vKey = md5(time().$email);

	$verificador = mysqli_query($con, "SELECT * FROM usuarios_pendentes WHERE email = '$email' AND senha = '$password'");
	$retorno["funcao"] = "cadastro";

	if (mysqli_num_rows($verificador) > 0){
		$retorno["status"] = "n";
		$retorno["mensagem"] = "Usuario ja cadastrado!";
	} else {
		mysqli_query($con, "INSERT INTO usuarios_pendentes (email, senha, vKey) VALUES ('$email', '$password','$vKey')");
		$retorno["status"] = "s";
		$retorno["mensagem"] = "Cadastro enviado com sucesso!";

		date_default_timezone_set('Etc/UTC');
        require '../PHPMailer/PHPMailerAutoload.php';

        $tituloEmail = "Netflix - Confirmação de e-mail";

        $message = "<h1>Ficamos felizes com o seu cadastro!</h1>
		<em>Para concluir o seu cadastro, <strong>clique</strong> no link abaixo:</em><br>
		<a href='http://localhost/Netflix/php/verificarEmail.php?vKey=$vKey'>CONFIRMAÇÃO DE E-MAIL</a>";

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
	}

	echo json_encode($retorno);
?>