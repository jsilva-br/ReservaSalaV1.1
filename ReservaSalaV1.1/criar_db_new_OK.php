<?php
    $host = "localhost";
    $user = "root";
    $password = ""; 
    $banco = "reservasala";
    $tabela1 = "usuarios";
	$tabela2 = "salas";
	$tabela3 = "reservas";

	

  
  $conecta = mysql_connect($host, $user, $password) or die('Não foi possível conectar: ' . mysql_error());
  
  $db_select = mysql_select_db($banco);

    if (!$db_select) { // Aqui ele verifica se naum existe o banco
        $sql = "CREATE DATABASE $banco";
        if (mysql_query($sql)) {
            echo "O banco de dados $banco foi criado <br>";

            mysql_select_db($banco);

            mysql_query("CREATE TABLE $tabela1 (
						id_usuario int(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
						usuario varchar(10),
						nome varchar(30),
						senha varchar(10)
						
			    )") or die('Não foi possível criar: ' . mysql_error());
            echo "A tabela $tabela1 foi criada <br>";
			
			mysql_query("CREATE TABLE $tabela2 (
						id_sala int(6) NOT NULL PRIMARY KEY AUTO_INCREMENT,
						sala int(6),
						nome_sala varchar(30)
						
			    )") or die('Não foi possível criar: ' . mysql_error());
            echo "A tabela $tabela2 foi criada <br>";
			
			mysql_query("CREATE TABLE $tabela3 (
						id_reserva int(6) NOT NULL PRIMARY KEY AUTO_INCREMENT,
						id_sala int(6),
						data varchar(17),
						hora_inicial varchar(10),
						hora_final varchar(10),
						disponivel char(1),
						id_usuario int(4)
						
			    )") or die('Não foi possível criar: ' . mysql_error());
            echo "A tabela $tabela3 foi criada <br>";
			
			mysql_query("INSERT INTO usuarios (id_usuario, usuario, nome, senha)
			VALUES ('', 'Admin', 'Administrador', '123')") or die( mysql_error());

        } // FECHA  ####  if (mysql_query($sql)) {
    } // FECHA  ####  if (!$db_selected) {
?>
