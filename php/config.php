<?php

	define("ENDERECO", "localhost");
	define("PORTA", "3307");
	define("BANCO", "netflix");
	define("USUARIO_MYSQL", "root");
	define("SENHA_MYSQL", "root");

	$con = mysqli_connect(ENDERECO.":".PORTA, USUARIO_MYSQL, SENHA_MYSQL, BANCO);

?>