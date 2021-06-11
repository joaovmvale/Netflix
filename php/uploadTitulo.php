<?php
	
	$arquivo_nome = $_FILES["file"]["name"];
	$arquivo = explode('.', $arquivo_nome);
	$arquivo_ext = strtolower(end($arquivo));
    $titulo = $_POST["titulo"];

	if($arquivo_ext == "png"){
		$imagem_temp = imagecreatefrompng($_FILES["file"]["tmp_name"]);
		imagepng($imagem_temp, "../images/titulos/".$titulo.".png");
	}

	echo json_encode($retorno);

?>



