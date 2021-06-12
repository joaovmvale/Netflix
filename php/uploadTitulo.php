<?php
	
	$arquivo_nome = $_FILES["file"]["name"];
	$arquivo = explode('.', $arquivo_nome);
	$arquivo_ext = strtolower(end($arquivo));
    $titulo = $_POST["titulo"];

	if($arquivo_ext == "png"){
		$imagem_temp = imagecreatefrompng($_FILES["file"]["tmp_name"]);

		$black = imagecolorallocate($imagem_temp, 0, 0, 0);
		imagecolortransparent($imagem_temp, $black);

		imagepng($imagem_temp, "../images/titulos/".$titulo.".png");
	}

	echo json_encode($retorno);

?>



