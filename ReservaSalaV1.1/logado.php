<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
<?php
session_start();

function __autoload($class_name){
		require_once 'classes/' . $class_name . '.php';
	}

if (isset($_GET['logout'])):
    if (isset($_GET['logout']) == "ok"):
        Login::deslogar();
    endif;
endif;

if (isset($_SESSION['logado'])):
    //echo $_SESSION['admin']; 
    echo "<center>Você já esta logado como ".$_SESSION["admin"]."<br>";
    echo "<br>.....::::: Painel de Usuário :::::.....<br><p>";
    echo '<a href="usuario_cadastro.php"> Cadastro de Usuário </a> <br>';
    echo '<a href="usuario_consulta.php"> Consulta de Usuário </a> <br>';
    echo '<a href="usuario_atualiza.php"> Atualizar de Usuário </a> <br>';
    echo '<a href="usuario_excluir.php"> Excluir de Usuário </a> <br>';

    echo "<br>.....::::: Painel de Salas :::::.....<br><p>";
    echo '<a href="sala_cadastro.php"> Cadastro de Sala </a><br> ';
    echo '<a href="sala_consulta.php"> Consulta de Sala </a> <br>';
    echo '<a href="sala_atualiza.php"> Atualizar de Sala </a> <br>';
    echo '<a href="sala_excluir.php"> Excluir de Sala </a> <br>';
    echo "<br>.....::::: Painel de Reservas :::::.....<br><p>";
    echo '<a href="reserva_cadastro.php"> Reserva de Sala </a> <br>';
    echo '<a href="reserva_consulta.php"> Consultar Reservas de Sala </a> <br>';
    echo '<a href="reserva_excluir.php"> Cancelar Reservas de Sala </a> <br>';
		
    ?>
<br>
<a href="logado.php?logout=ok">Sair do Sistema</a>
<?php
else:
    echo "Você não tem permissao de acesso";
    echo "<script>setTimeout(window.location='index.php',30000);</script>";
endif;
?>