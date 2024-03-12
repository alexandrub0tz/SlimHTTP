<?php

class Alunno implements JsonSerializable{

    private $nome;
    private $cognome;
    private $eta;

    public function __construct($nome, $cognome, $eta){
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->eta = $eta;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setCognome($cognome){
        $this->cognome = $cognome;
    }

    public function setEta($eta){
        $this->eta = $eta;
    }

    public function getNome(){
        return $this->nome;
    }

    public function toString() {
        return "Nome: " . $this->nome . ", Cognome: " . $this->cognome . ", Età: " . $this->eta;
    }

    public function jsonSerialize() {
        return [
            'nome' => $this->nome,
            'cognome' => $this->cognome,
            'eta' => $this->eta
        ];
    }

   

}
?>