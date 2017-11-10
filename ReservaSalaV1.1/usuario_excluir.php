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

    if(isset($_GET['id'])):
       
        //$id_usuario=$_GET["id"];
        //echo $id_usuario."<br>";
        $id= addslashes(trim($_GET["id"]));
        //REALIZA A CONSULTA        
        $delete=$pdo->prepare("DELETE FROM usuarios WHERE id_usuario=:id");
        $delete->bindValue(":id", $id);
        $delete->execute();
        if ($delete->rowCount() > 0):
            echo "<script>alert('USUARIO DELETADO COM SUCESSO!')</script>";
        else:
            echo "<script>alert('DESCULPE! O USUÁRIO NÃO FOI DELETADO.')</script>";
        endif;
        
       
    endif;
   


?>
<html>
<body>
    <form id="form1" name="form1" method="POST" action="">
    <center>
    <table border=1>
	<tr><td colspan=4 align=center>...::: TODOS USUÁRIOS JÁ CADASTRADOS :::...</td></tr>
        <tr><td>Id Usuário</td><td>Usuário</td><td>Nome do Usuário</td><td>EXCLUIR</td></tr>
	</tr>
	<?php
            $pdo=Conectar();
            $buscasimple=$pdo->query("SELECT * FROM usuarios");
            //echo $buscasimple->rowCount()." encontrados com busca simple 2<br>";
            //echo "<hr>";
			
            while ($linha= $buscasimple->fetch(PDO::FETCH_ASSOC)) { 
                echo "<br><tr><td>{$linha['id_usuario']}</td><td>{$linha['usuario']}</td><td>{$linha['nome']}</td><td><a href=usuario_excluir.php?id={$linha['id_usuario']}>EXCLUIR</td></tr>";
                //echo "<br><tr><td>".$id_usuario."</td><td>".$usuario."</td><td>".$nome_usuario."</td></tr>";
            }
            @mysql_close();

	?>
    </form>

</body>
</html>