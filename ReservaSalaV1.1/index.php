<?php
session_start();
require_once '/classes/Conectar.php';
require_once '/classes/Login.php';
/*
function __autoload($class_name){
		require_once '/classes/' . $class_name . '.php';
	}*/
//include("/classes/Conectar.php");
$pdo=Conectar();

    if(isset($_POST['ok'])):
        
        $login=$_POST["login"];
        $senha=$_POST["senha"];
        
        //echo  "LOGIN:".$login." SENHA: ".$senha."<br>";
        $buscasegura=$pdo->prepare("SELECT * FROM usuarios WHERE usuario=:usuario AND senha=:senha");
        $buscasegura->bindValue(":usuario", $login);
        $buscasegura->bindValue(":senha", "$senha");
        $buscasegura->execute();
        //echo $buscasegura->rowCount()." encontrados com busca segura modelo 2<br>";
        if($buscasegura->rowCount()== 1):
            $_SESSION['admin'] = $login;
            $_SESSION['logado'] = true;           
            header("Location: logado.php");   
            return true;   
        else:
            $erro = "Erro ao logar";
        endif;
     
    endif;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <div id="login" align="center">
            <form action="" method="POST" id="form_login">
                ...::: SISTEMA DE RESERVA DE SALAS :::...<p>
                <label for="login">Login:</label>
                <input type="text" name="login" class="input" id="input_login">
                <p>
                <label for="senha">Senha:</label>
                <input type="text" name="senha" class="input" id="input_senha">
                
                <label for="submit"></label><p>
                <input type="submit" name="ok" id="bt_logar" value="logar" class="input_button">
            </form>
             
            <p> Cadastrar novo usuário <a href = "usuario_cadastro.php">Clique Aqui</a>
            
        </div>
        
    </body>
</html>
