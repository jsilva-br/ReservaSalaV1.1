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

?>
<html>
<body>
    <form id="form1" name="form1" method="POST" action="">
    <center>
    <table border=1>
	<tr><td colspan=3 align=center>...::: TODAS SALAS JÁ CADASTRADAS :::...</td></tr>
	<tr><td>ID SALA</td><td>NÚMERO</td><td>NOME DA SALA</td></tr>
	</tr>
	<?php
            $pdo=Conectar();
            $buscasimple=$pdo->query("SELECT * FROM salas");
            //echo $buscasimple->rowCount()." encontrados com busca simple 2<br>";
            //echo "<hr>";
			
            while ($linha= $buscasimple->fetch(PDO::FETCH_ASSOC)) { 
                echo "<br><tr><td>{$linha['id_sala']}</td><td>{$linha['sala']}</td><td>{$linha['nome_sala']}</td></tr>";
                //echo "<br><tr><td>".$id_usuario."</td><td>".$usuario."</td><td>".$nome_usuario."</td></tr>";
            }
            @mysql_close();

	?>
    </form>

</body>
</html>