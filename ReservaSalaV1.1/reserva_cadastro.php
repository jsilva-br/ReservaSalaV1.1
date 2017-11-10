<html>
  <head>
        <meta charset="UTF-8">
  </head>
<body>
	<form id="form1" name="form1" method="post" action="">
	<center>
<table border=1>
		<tr><td colspan=2 align=center >RESERVAS DE SALAS</td></tr>
		<?php
		require_once "config.php";
		session_start();
		echo "<center>Você já esta logado como ".$_SESSION["nome"]."<br>";
		echo "<p><a href= 'logado.php'> HOME </a>";
		?>
		<?php
			$login=$_SESSION["nome"];
			$sql = mysql_query("SELECT * FROM  salas") or die(mysql_error());
			$row = mysql_num_rows($sql);
			//echo $row."<br>";
			
			while($l = mysql_fetch_array($sql)) {
					$id_sala   = $l["id_sala"];
					$sala =$l["sala"];	
					$nome_sala =$l["nome_sala"];
			}
		echo "<tr><td>Selecione.....:</td><p>";
		?>
                    <td align="left" valign="middle"><select name="id_sala" ">
                      <option value="0">-- Selecione Sala --</option>
                      <?php for($i=0; $i<$row; $i++) { ?>
                      <option value="<?php echo mysql_result($sql, $i, "id_sala"); ?>"> <?php echo mysql_result($sql, $i, "sala"); ?></option>
                      <?php } ?>
                    </select></td>

<tr><td>Data .......:</td><td> <input  type="text" name="data1" id="login" size= 10 ></td></tr>
<tr><td>Hora inicio .......:</td><td> <input  type="text" name="hora_inicio" id="login" size= 10 ></td></tr>
</table>
<br>
<table border=1>
<tr><td><input type="submit" name="OK" id="button" value="Gravar"></td>
<td><input type="reset" name="reset" id="button" value="Limpar"></td></tr>
</table>

<?php

if (isset($_POST["OK"])){
	$sala = $_POST["id_sala"];
	$data= $_POST["data1"];
	$hora_inicio = $_POST["hora_inicio"];
	echo "Numero da sala:".$sala." Para usuario:".$login." no dia ".$data." na hora incial ".$hora_inicio;
	
	$sql1 = mysql_query("SELECT * FROM  usuarios WHERE usuario = '".$login."'") or die(mysql_error());
			$row1 = mysql_num_rows($sql1);
			//echo "<br> Encontrado :".$row1." usuarios";
			
			while($b = mysql_fetch_array($sql1)) {
					
					$id_usuario   = $b["id_usuario"];
					$nome = $b["nome"];
					$usuario      =$b["usuario"];
			}
	
	mysql_query("INSERT INTO reservas (id_reserva,id_sala,data,hora_inicial, hora_final, disponivel, id_usuario)
			VALUES ('', '$sala','$data','$hora_inicio','','1','$id_usuario')") or die( mysql_error());
//FINALIZA A CONEXÃO COM O MYSQL
	  mysql_close($conecta);
	 echo "AGUARDE REDIRECIONANDO PARA O PAINEL! ";
	 echo "<script>setTimeout(window.location='logado.php',5000);</script>";
	
}
?>
<table border=1>
		<tr><td colspan=7 align=center>RESERVAS JÁ FEITAS</td></tr>
			<tr><td>ID da Reserva</td><td>Número da Sala</td><td>Usuário</td><td>Data</td><td>Hora Inicial</td><td>Hora Final</td><td>Disponibilidade</td></tr>
		</tr>
		<?php
			
            //echo " Para usuario:".$login."<p>";
			
			$sql = mysql_query("SELECT * FROM  reservas") or die(mysql_error());
			$row = mysql_num_rows($sql);
			//echo "<br>".$row;
			
			while($l = mysql_fetch_array($sql)) {
					$id_reserva = $l["id_reserva"];
					$id_usuario   = $l["id_usuario"];
					$sala = $l["id_sala"];
					$data      =$l["data"];
					$hora_inicial =$l["hora_inicial"];
					$disponivel	 = $l["disponivel"];				
			
						
			$sql_user = mysql_query("SELECT * FROM  usuarios WHERE id_usuario = '".$id_usuario."'") or die(mysql_error());
			$row_user = mysql_num_rows($sql_user);
			//echo "<br> Encontrado :".$row1." usuarios";
			
			while($b = mysql_fetch_array($sql_user)) {
					
					$id_usuario = $b["id_usuario"];
					$nome 	 	= $b["nome"];
					$usuario 	=$b["usuario"];
			}
			
			$sql_sala = mysql_query("SELECT * FROM  salas WHERE id_sala = '".$sala."'") or die(mysql_error());
			$row_sala = mysql_num_rows($sql_sala);
			//echo "<br> Encontrado :".$row1." usuarios";
			
			while($b = mysql_fetch_array($sql_sala)) {
					
					$id_sala   = $b["id_sala"];
					$nome_sala = $b["nome_sala"];
					$sala      =$b["sala"];
			}
			
			
			$hora_final=$hora_inicial +1;
			
					echo "<br><tr><td>".$id_reserva."</td><td>".$sala."</td><td>".$usuario."</td><td>".$data."</td><td>".$hora_inicial."</td><td>".$hora_final."</td><td>".$disponivel."</td></tr>";
					}	 


			@mysql_close();

		?>
</tablet>
</form>

</body>
</html>