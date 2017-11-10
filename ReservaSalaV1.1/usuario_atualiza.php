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
$login = $_SESSION["admin"];
$buscasimple=$pdo->query("SELECT * FROM usuarios WHERE usuario = '".$login."'");      
//echo $buscasimple->rowCount()." encontrados com busca simple 2<br>";

			
    while ($linha= $buscasimple->fetch(PDO::FETCH_ASSOC)) { 
        $id_usuario=$linha['id_usuario'];
        $usuario=$linha['usuario'];
        $nome_usuario=$linha['nome'];
        $senha =$linha['senha'];
        echo "<br>".$id_usuario." - ".$usuario." - ".$nome_usuario." - ".$senha;
    }


     if(isset($_GET['ok'])):
    $pdo=Conectar();
    $id_user= addslashes(trim($_GET["id_user"]));
    $usuario=$_GET["login"];
    $nome=$_GET["nome"];
    $senha=$_GET["senha"];
    echo "<br>".$id_user." - ".$usuario." - ".$nome." - ".$senha;
    //REALIZA A CONSULTA        
    $update=$pdo->prepare("UPDATE usuarios SET usuario=:usuario, nome=:nome, senha=:senha WHERE id_usuario='".$id_user."'");
    $update->bindValue(":usuario",$usuario);
    $update->bindValue(":nome",$nome);
    $update->bindValue(":senha",$senha);
    $update->bindValue(":id_usuario",$id_user);
    $update->execute();
   
    if ($update->rowCount() > 0):
        echo "<script>alert('USUARIO ATUALIZADO COM SUCESSO!')</script>";
    else:
        echo "<script>alert('DESCULPE! O USUÁRIO NÃO FOI ATUALIZADO.')</script>";
    endif;
        
       
    endif;

?>
<html>
<body>
    <form id="form1" name="form1" method="GET" action="">
    <center>
    <table border=1>
	<tr><td colspan=2 align=center>...::: ATUALIZAR USUÁRIO :::...</td></tr>
        <tr><td>ID Uusuário.....:</td><td><input  type="text" name="id_user" id="usuario1"    value="<?php echo $id_usuario; ?>"></td></tr><p>
	<tr><td>Nome Completo.....:</td><td><input  type="text" name="nome" id="usuario" size= 10  value="<?php echo $usuario; ?>"></td></tr><p>
	<tr><td>Usuário..:</td><td><input  type="text" name="login" id="login" size= 10 value="<?php echo $nome_usuario; ?>"></td></tr><p>
	<tr><td>Senha....:</td><td><input  type="password" name="senha" id="passwords" size= 10 value="<?php echo $senha; ?>"></td></tr><p>
    </table>
        
    <br>
    <table border=1>
        <tr><td><input type="submit" name="ok" id="button" value="Gravar"></td>
        <td><input type="reset" name="reset" id="button" value="Limpar"></td><tr>
    </table>

</body>
</html>