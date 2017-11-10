<?php
/*require_once "Conectar.php";
class Usuarios {
    
        //Atributos
        private $nome;
        private $senha;
        private $login;

        //Metodos Gets e Sets    
        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getNome(){
            return $this->nome;
        }

        function getSenha() {
            return $this->senha;
        }

        function getLogin() {
            return $this->login;
        }

        function setSenha($senha) {
            $this->senha = $senha;
        }

        function setLogin($login) {
            $this->login = $login;
        }

        //Metodos da Classe
        public function CadastrarUser($usuario,$nome,$senha){
        $pdo=Conectar();
        $usuario=$_POST["login"];
        $nome=$_POST["nome"];
        $senha=$_POST["senha"];
        $grava=$pdo->prepare("INSERT INTO usuarios(usuario,nome,senha)VALUES(:usuario,:nome,:senha)");
        $grava->bindValue(":usuario",$usuario);
        $grava->bindValue(":nome",$nome);
        $grava->bindValue(":senha",$senha);
        //Valida o cadastro
        $validar=$pdo->prepare("SELECT * FROM usuarios WHERE usuario=?");
        $validar->execute(array($usuario));
        if($validar->rowCount() == 0):
            //EXECUTA O CADASTRO
            $grava->execute();
        else:
            echo "Ja cadastro";
        endif;

        }

        public function AlterarUser(){

        }

        public function ConsultarUser(){

        }
        
        public function ConsultarUserAll(){

        }
        
        public function ExcluirUser(){
            
        }

    
}
   */ 

