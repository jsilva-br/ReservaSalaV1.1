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
       
        $id= addslashes(trim($_GET["id"]));
        //REALIZA A CONSULTA        
        $delete=$pdo->prepare("DELETE FROM salas WHERE id_sala=:id");
        $delete->bindValue(":id",$id);
        $delete->execute();
        //  echo $delete->rowCount();
        if ($delete->rowCount() > 0):
            echo "<script>alert('SALA DELETADA COM SUCESSO!')</script>";
        else:
            echo "<script>alert('DESCULPE! A SALA NÃO FOI DELETADA.')</script>";
        endif;
        
       
    endif;
   


?>
<html>
<body>
    <form id="form1" name="form1" method="GET   " action="">
    <center>
    <table border=1>
	<tr><td colspan=4 align=center>...::: TODAS AS SALAS JÁ CADASTRADAS :::...</td></tr>
        <tr><td>ID SALA</td><td>NÚMERO</td><td>NOME DA SALA</td><td>EXCLUIR</td></tr>
	</tr>
	<?php
            $pdo=Conectar();
            $buscasimple=$pdo->query("SELECT * FROM salas");
           	
            while ($linha= $buscasimple->fetch(PDO::FETCH_ASSOC)) { 
                echo "<br><tr><td>{$linha['id_sala']}</td><td>{$linha['sala']}</td><td>{$linha['nome_sala']}</td><td><a href=sala_excluir.php?id={$linha['id_sala']}>EXCLUIR</td></tr>";
                
            }
            @mysql_close();

	?>
    </form>

</body>
</html>