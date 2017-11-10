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
       
        $num_sala=$_POST["num_sala"];
        $nome_sala=$_POST["nome_sala"];
        $grava=$pdo->prepare("INSERT INTO salas(sala,nome_sala)VALUES(:num_sala,:nome_sala)");
        $grava->bindValue(":num_sala",$num_sala);
        $grava->bindValue(":nome_sala",$nome_sala);
        
        //Valida o cadastro
        $validar=$pdo->prepare("SELECT * FROM salas WHERE sala=?");
        $validar->execute(array($num_sala));
        if($validar->rowCount() == 0):
            //EXECUTA O CADASTRO
            $grava->execute();
            echo "<script>alert('SALA REGISTRADA COM SUCESSO!')</script>";
        else:
            echo "<script>alert('SALA JÁ CADASTRADA!')</script>";
        endif;
       
    endif;
   


?>
<html>
<body>
    <form id="form1" name="form1" method="POST" action="">
    <center>
    <table border=1>
	<tr><td colspan=2 align=center>...::: CADASTRO DE SALAS :::...</td></tr>
	<tr><td>Número da Sala:</td><td><input  type="text" name="num_sala"  size= 10 ></td></tr><p>
	<tr><td>Nome da Sala:</td><td><input  type="text" name="nome_sala"  size= 50 ></td></tr><p>
	
    </table>
    <br>
    <table border=1>
        <tr><td><input type="submit" name="ok" id="button" value="Gravar"></td>
        <td><input type="reset" name="reset" id="button" value="Limpar"></td><tr>
    </table>

    <table border=1>
	<tr><td colspan=3 align=center>SALAS JÁ CADASTRADAS</td></tr>
	<tr><td>Id Sala</td><td>Número da Sala</td><td>Nome da Sala</td></tr>
	</tr>
	<?php
            $pdo=Conectar();
            $buscasimple=$pdo->query("SELECT * FROM salas");
            //echo $buscasimple->rowCount()." encontrados com busca simple 2<br>";
            //echo "<hr>";
			
            while ($linha= $buscasimple->fetch(PDO::FETCH_ASSOC)) { 
                echo "<br><tr><td>{$linha['id_sala']}</td><td>{$linha['sala']}</td><td>{$linha['nome_sala']}</td></tr>";
                
            }
            @mysql_close();

	?>
    </form>

</body>
</html>