<?php
require_once "classes/Conectar.php";
header('Content-Type: text/html; charset=utf-8');
session_start();
if (isset($_SESSION['logado'])):	
    echo "<center>Você já esta logado como ".$_SESSION["admin"].".";
    echo "<p><a href= 'logado.php'> HOME </a>";
else:
    echo "<center><p><a href= 'logado.php'> HOME </a>";
endif;

$pdo=Conectar();

    if(isset($_POST['ok'])):
       
        $usuario=$_POST["login"];
        $nome=$_POST["nome"];
        $senha=$_POST["senha"];
        $grava=$pdo->prepare("INSERT INTO usuarios(usuario,nome,senha)VALUES(:usuario,:nome,:senha)");
        $grava->bindValue(":usuario",$usuario);
        $grava->bindValue(":nome",$nome);
        $grava->bindValue(":senha",$senha);
        //Valida o cadastro
        $validar=$pdo->prepare("SELECT * FROM usuarios WHERE usuario=?");
        $validar->execute(array($usuario));
        if($validar->rowCount() == 0):
            //EXECUTA O CADASTRO
            $grava->execute();
            echo "<script>alert('USUARIO CADASTRADO COM SUCESSO!')</script>";
        else:
            echo "<script>alert('USUARIO JÁ CADASTRADO!')</script>";
        endif;
       
    endif;
   


?>
<html>
<body>
    <form id="form1" name="form1" method="POST" action="">
    <center>
    <table border=1>
	<tr><td colspan=2 align=center>...::: CADASTRO DE USUÁRIOS :::...</td></tr>
	<tr><td>Nome Completo.....:</td><td><input  type="text" name="nome" id="usuario" size= 10 ></td></tr><p>
	<tr><td>Usuário..:</td><td><input  type="text" name="login" id="login" size= 10 ></td></tr><p>
	<tr><td>Senha....:</td><td><input  type="password" name="senha" id="passwords" size= 10 ></td></tr><p>
    </table>
    <br>
    <table border=1>
        <tr><td><input type="submit" name="ok" id="button" value="Gravar"></td>
        <td><input type="reset" name="reset" id="button" value="Limpar"></td><tr>
    </table>

    <table border=1>
	<tr><td colspan=3 align=center>USUÁRIOS JÁ CADASTRADOS</td></tr>
	<tr><td>Id Usuário</td><td>Usuário</td><td>Nome do Usuário</td></tr>
	</tr>
	<?php
            $pdo=Conectar();
            $buscasimple=$pdo->query("SELECT * FROM usuarios");
            //echo $buscasimple->rowCount()." encontrados com busca simple 2<br>";
            //echo "<hr>";
			
            while ($linha= $buscasimple->fetch(PDO::FETCH_ASSOC)) { 
                echo "<br><tr><td>{$linha['id_usuario']}</td><td>{$linha['usuario']}</td><td>{$linha['nome']}</td></tr>";
                //echo "<br><tr><td>".$id_usuario."</td><td>".$usuario."</td><td>".$nome_usuario."</td></tr>";
            }
            @mysql_close();

	?>
    </form>

</body>
</html>