<?php

class Reservas {
    //Atributos
    private $id_sala;
    private $data;
    private $hora_inicial;
    private $hora_final;
    private $disponivel;
    private $id_usuario;
    
    
    //Metodos Gets e Sets
    function getId_sala() {
        return $this->id_sala;
    }

    function getData() {
        return $this->data;
    }

    function getHora_inicial() {
        return $this->hora_inicial;
    }

    function getHora_final() {
        return $this->hora_final;
    }

    function getDisponivel() {
        return $this->disponivel;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function setId_sala($id_sala) {
        $this->id_sala = $id_sala;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setHora_inicial($hora_inicial) {
        $this->hora_inicial = $hora_inicial;
    }

    function setHora_final($hora_final) {
        $this->hora_final = $hora_final;
    }

    function setDisponivel($disponivel) {
        $this->disponivel = $disponivel;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    //Metodos da Classes
    
    public function fazerReservar(){
        
    }
    
    public function consultarReservar(){
        
    }
    
    public function deletarReservar(){
        
    }
    
    public function alterarReservar(){
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
