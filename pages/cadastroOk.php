<?php
$con = mysqli_connect("127.0.0.1:3307", "root", "root", "netflix");

?>

<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Netflix</title>
        <link rel="stylesheet" href="../css/patterns.css">
        <link rel="stylesheet" href="../css/cadastro.css">
        <script type="text/javascript" src="../js/jquery-3.6.0.js"></script>
        <script src='../js/jquery.md5.js'></script>
        <script src='../js/sjcl.js'></script>
        <script type="text/javascript" src="../js/cadastro.js"></script>
    </head>
    <body>
        
        <header>
            <a href="../pages/login.html"><img src="../img/netflix-logo.png" alt="neflix-logo"></a>
            <div class="entrar">
                <a href="../pages/login.html"><p>Entrar</p></a>
            </div>
        </header>

        <div class="content2">

            <form method="POST" class="form">
                                
                <p class="passo">PASSO <b>3</b> DE <b>3</b></p>
                <p class="titulo">Complete a sua assinatura.</p>
                <p class="subtitulo">Faltam só mais alguns passos! Nós também detestamos formulários.</p>
                <input name="nome" id="cadNome" type="text" placeholder="Nome"> <br>
                <input name="cadNasc" id="cadNasc" type="text" placeholder="Data de nascimento"> <br>
                <input name="cadNroCartao" id="cadNroCartao" type="text" placeholder="Número do cartão"> <br>
                <input name="cadVldCartao" id="cadVldCartao" type="text" placeholder="Validade do cartão"> <br>
                <input name="cadCodCartao" id="cadCodCartao" type="text" placeholder="Código de segurança do cartão"> <br>
                <input name="cadNomeCartao" id="cadNomeCartao" type="text" placeholder="Nome do titular do cartão"> <br>
                <input name="cadCpfCnpj" id="cadCpfCnpj" type="text" placeholder="CPF/CNPJ">
                <button class="botao1" id="btnCadastrar" type="submit">Continuar</button>

            </form>
        </div>
    </body>

    <footer>

    </footer>
</html>