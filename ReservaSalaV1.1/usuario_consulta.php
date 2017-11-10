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
       
        $validar=$pdo->prepare("SELECT * FROM usuarios WHERE usuario=?");
        $validar->execute(array($usuario));
        if($validar->rowCount() == 0):
            //EXECUTA O CADASTRO
            echo "<script>alert('USUÁRIO NÃO CADASTRADO')</script>";
        else:
            
            //echo "<script>window.open('','pop','scrollbars=no,width=300,height=200,top=200,left=200')</script>";
            echo "<script>alert('USUÁRIO CADASTRADO')</script>";
        endif;
       
    endif;
   


?>
<html>
<body>
    <form id="form1" name="form1" method="POST" action="">
    <center>
    <table border=1>
	<tr><td colspan=2 align=center>...::: CONSULTA DE USUÁRIOS :::...</td></tr>
	<tr><td>Usuário..:</td><td><input  type="text" name="login" id="login" size= 10 ></td></tr>
	
    </table>
    <br>
    <table border=1>
        <tr><td><input type="submit" name="ok" id="button" value="Consultar"></td>
        <td><input type="reset" name="reset" id="button" value="Limpar"></td><tr>
    </table>

    <table border=1>
	<tr><td colspan=3 align=center>...::: TODOS USUÁRIOS JÁ CADASTRADOS :::...</td></tr>
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