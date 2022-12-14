<?php declare( strict_types = 1 );

namespace App;

use Exception;

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

    public function setMarcador2($valor){
        $this->marcador2=$valor;
    }

    public function calcularPuntuacion($array){
        $puntuaciones = ["Love", "15", "30", "40", "Set"];
        $puntosJug1 = $puntosJug2 = 0;

        foreach ($array as $clave => $valor){
            $punto = $array[$clave];

            if ($punto[0] + $punto[1] != 1) throw new Exception("Valores para el punto inválidos");

            if ($punto[0]==1) $this->setMarcador1($puntuaciones[++$puntosJug1]);
            else if ($punto[1]==1) $this->setMarcador2($puntuaciones[++$puntosJug2]);
        }
        
        return [$this->getMarcador1(), $this->getMarcador2()];
    }
}

?>