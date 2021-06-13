<?php
	
	$arquivo_nome = $_FILES["file"]["name"];
	$arquivo = explode('.', $arquivo_nome);
	$arquivo_ext = strtolower(end($arquivo));
	$titulo = $_POST["titulo"];

	if($arquivo_ext == "jpg"){
		$imagem_temp = imagecreatefromjpeg($_FILES["file"]["tmp_name"]);
		imagejpeg($imagem_temp, "../images/thumbnails/".$titulo.".jpg");
	}

	echo json_encode($retorno);

?>



