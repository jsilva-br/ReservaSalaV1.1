
<html>
<head>
        <meta charset="UTF-8">
  </head>
<body>

<?php
		require_once "config.php";
		session_start();
		echo "<center>Você já esta logado como ".$_SESSION["nome"]."<br>";
		echo "<p><a href= 'logado.php'> HOME </a>";
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
</table>
</body>
</html>