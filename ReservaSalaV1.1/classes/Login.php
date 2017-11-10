<?php
require_once '/classes/Conectar.php';
//class Login  extends Conectar{
class Login{
    private $login;
    private $senha;
    
    public function setLogin($login){
        $this->login = $login;
    }
    
    public function setSenha($senha){
        $this->senha = $senha;
    }
    
    public function getLogin(){
        return $this->login;
    }
    public function getSenha(){
        return $this->senha;
    }
    
    public function logar(){
        echo "VOCE ESTA LOGADO COM: ".$_SESSION['admin']."<br>";
        
    }
    
    public static function deslogar(){
        if (isset($_SESSION['logado'])):
            unset($_SESSION['logado']);
            session_destroy();
            //header("Location: index.php");
            echo "<center>Você esta saindo do sistema!";
            echo "<script>setTimeout(window.location='index.php',30000);</script>";
        endif;
    }
    
}
