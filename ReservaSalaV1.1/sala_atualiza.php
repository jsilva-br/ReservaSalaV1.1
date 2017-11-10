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
    $id=$_GET['id'];
    echo $id;
    $buscasimple=$pdo->query("SELECT * FROM salas WHERE id_sala= '".$id."'");      
    //echo $buscasimple->rowCount()." encontrados com busca simple 2<br>";
    
    while ($linha= $buscasimple->fetch(PDO::FETCH_ASSOC)) { 
        $id_sala=$linha['id_sala'];
        $sala=$linha['sala'];
        $nome_sala=$linha['nome_sala'];
        
        //echo "<br>".$id_sala." - ".$sala." - ".$nome_sala;
    }
?>
<body>
    <form id="form1" name="form1" method="GET" action="">
    <center>
    <table border=1>
	<tr><td colspan=2 align=center>...::: ATUALIZAR SALA :::...</td></tr>
        <tr><td>ID SALA:</td><td><input  type="text" name="id_user" id="usuario1"    value="<?php echo $id_sala; ?>"></td></tr><p>
	<tr><td>NÚMERO:</td><td><input  type="text" name="nome" id="usuario" size= 10  value="<?php echo $sala; ?>"></td></tr><p>
	<tr><td>NOME DA SALA:</td><td><input  type="text" name="login" id="login" size= 10 value="<?php echo $nome_sala; ?>"></td></tr><p>
	
    </table>
        
    <br>
    <table border=1>
        <tr><td><input type="submit" name="ok" id="button" value="Gravar"></td>
        <td><input type="reset" name="reset" id="button" value="Limpar"></td><tr>
    </table>
    </form>
</body>
<?php
endif;
    $pdo=Conectar();
    if(isset($_GET['id'])):
       
        $id= addslashes(trim($_GET["id"]));
        //REALIZA A CONSULTA        
        $update=$pdo->prepare("UPDATE salas SET sala=:sala, nome_sala=:nome_sala WHERE id_sala=:id");
        $update->bindValue(":sala",$sala);
        $update->bindValue(":nome_sala", $nome_sala);
        $update->bindValue(":id_sala", $id);
        
        //  echo $delete->rowCount();
        if ($update->rowCount() > 0):
            $update->execute();
            echo "<script>alert('SALA ATUALIZADA  COM SUCESSO!')</script>";
        else:
            echo "<script>alert('DESCULPE! A SALA NÃO FOI ATUALIZADA.')</script>";
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
                echo "<br><tr><td>{$linha['id_sala']}</td><td>{$linha['sala']}</td><td>{$linha['nome_sala']}</td><td><a href=sala_atualiza.php?id={$linha['id_sala']}>ATUALIZAR</td></tr>";
                
            }
            @mysql_close();

	?>
    </form>

</body>
</html>