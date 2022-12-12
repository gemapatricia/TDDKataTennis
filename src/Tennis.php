<?php declare( strict_types = 1 );

namespace App;

Class Tennis{

    private $marcador1="Love";
    private $marcador2="Love";

    public function getMarcador1(){
        return $this->marcador1;
    }

    public function getMarcador2(){
        return $this->marcador2;
    }

    public function setMarcador1($valor){
        $this->marcador1=$valor;
    }

    public function calcularPuntuacion($array){
        $punto = $array[0];

        if ($punto[0]==1) $this->setMarcador1("15");
        
        return [$this->getMarcador1(), $this->getMarcador2()];
    }
}

?>