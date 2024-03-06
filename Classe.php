<?php

include_once "Alunno.php";

class Classe implements JsonSerializable {
    private $alunni = array();

    public function __construct(){
        $this->alunni = [
            new Alunno("mario","rossi",21),
            new Alunno("giuseppina","bianchi",22),
            new Alunno("marco","verdi",23)
        ];
    }


    public function trovaAlunno($nome) {
    foreach ($this->alunni as $alunno) {
        if ($alunno->getNome() == $nome) {
            return $alunno;
        }
    }
    return null; // Nessun alunno trovato con quel nome
}


    public function toString(){

        $somma = "";

        foreach($this->alunni as $alunno){
            $somma = $somma . $alunno->toString() . "<br>";
        }

        return $somma;
    }




    public function jsonSerialize() {
        return $this->alunni;
    }

}



?>