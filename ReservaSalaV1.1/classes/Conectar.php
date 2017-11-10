<?php
function Conectar(){
try{
$pdo=new PDO("mysql:host=localhost;dbname=reservasala","root","");
}catch(PDOException $e){
    //var_dump($e);
    echo $e->getMessage();
    echo $e->getCode();
}
return $pdo;
}
  
