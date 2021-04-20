<?php
if(isset($_POST['submit'])){
    session_start();

    $mysqli = NEW MySQLI("127.0.0.1:3307", "root", "root", "netflix");

    $u = $mysqli->real_escape_string($_POST['username']);
    $p = $mysqli->real_escape_string($_POST['password']);
    $p = md5($p);

    $_SESSION['us'] = $u;
    $_SESSION['ps'] = $p;

    $resultSet = $mysqli->query("SELECT * FROM usuarios_pendentes WHERE email = '$u' AND senha = '$p' LIMIT 1");

    $resultSet1 = $mysqli->query("SELECT * FROM usuarios WHERE cadMail = '$u' AND cadSenha = '$p' LIMIT 1");

    if(mysqli_num_rows($resultSet1) != 0){
        $row = $resultSet1 -> fetch_assoc();
        $verMail = $row['cadMail'];
        $verSenha = $row['cadSenha'];

        if($u == $verMail && $p == $verSenha){
            header("Location: home.html");
            die();
        }
    }
    
    if(mysqli_num_rows($resultSet) != 0){ 
        $row = $resultSet-> fetch_assoc();
        $ativado = $row['ativado'];
        
        if($ativado == 0){
            header("Location: cadastroenviado.html");
            die();
        }else{
            header("Location: cadastrook.php");
            die();
        }
    }else{
        header("Location: cadastro.html");
        die();
    }
}

?>

<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Netflix</title>
        <link rel="stylesheet" href="../css/patterns.css">
        <link rel="stylesheet" href="../css/login.css">
        <script type="text/javascript" src="../js/jquery-3.6.0.js"></script>
        <script type="text/javascript" src="../js/login.js"></script>
    </head>

    <body>

        <header>
            <a href="../pages/login.html"><img src="../img/netflix-logo.png" alt="logo-netflix"></a>
        </header>

        <div class="login-box">
            <form method="POST" action="">
                <h1>Entrar</h1>
                <input class="entradas" name="username" id="username" type="text" placeholder="Email ou número de telefone"> <br>
                <input class="entradas" name="password" id="password" type="password" placeholder="Senha"> <br>
                <input class="botao1" type="SUBMIT" name="submit" value="Entrar" required/>
                <div class="loginBox-footer">
                    <input id="rememberPassword" type="checkbox">
                    <span>Lembre-se de mim</span>
                    <a href="../pages/ajuda.html" ><span id="ajuda">Precisa de ajuda?</span></a>
                    
                    <div class="div-cadastro">
                        <span>Novo por aqui?</span>
                        <a href="../pages/cadastro.html"> <span id="cadastro">Assine agora</span> </a>
                    </div>
                </div>
            </form>
        </div>

        <footer>
            
        </footer>
    </body>
</html>