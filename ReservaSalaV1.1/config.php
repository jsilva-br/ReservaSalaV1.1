<?php
/*
$host = "localhost";
$user = "root";
$pass = "";
$banco   = "reservasala";
$conecta = mysql_connect("$host", "$user", "$pass") or print (mysql_error());
//SELECIONA A BASE DE DADOS                
$db = mysql_select_db($banco, $conecta)   
         or die("Erro na seleחדo da base de dados");*/  
		 
$host = "localhost";
$user = "root";
$pass = "";
$banco   = "reservasala";
$conecta = mysql_connect("$host", "$user", "$pass") or die(mysql_error());
//SELECIONA A BASE DE DADOS                
//$db = mysql_select_db($banco, $conecta) or die("Erro na seleחדo da base de dados");  
mysql_select_db($banco) or die("mysql_error()");  
?>