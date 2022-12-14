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

    public function ganadorSet($jugadorGanador){
        if ($jugadorGanador == 1){
            $this->setMarcador1("1");
            $this->setMarcador2("0");
        }
        elseif ($jugadorGanador == 2){
            $this->setMarcador1("0");
            $this->setMarcador2("1");
        }
    }

    public function calcularPuntuacion($array){
        $puntuaciones = ["Love", "15", "30", "40"];
        $puntosJug1 = $puntosJug2 = 0;

        foreach ($array as $clave => $valor){
            $punto = $array[$clave];

            if ($punto[0] + $punto[1] != 1) throw new Exception("Valores para el punto inválidos");

            if ($punto[0]==1){
                if (++$puntosJug1==4 && $puntosJug2==3) $this->setMarcador1("AD");
                elseif (($puntosJug1==4 && $this->getMarcador2()!="AD") || $this->getMarcador1()=="AD") $this->ganadorSet(1);
                elseif ($puntosJug1==4 && $this->getMarcador2()=="AD"){
                    $puntosJug1 = $puntosJug2 = 3;
                    $this->setMarcador2($puntuaciones[$puntosJug2]);
                }
                else $this->setMarcador1($puntuaciones[$puntosJug1]);
            }
            else if ($punto[1]==1){
                if (++$puntosJug2==4 && $puntosJug1==3) $this->setMarcador2("AD");
                elseif ($puntosJug2==4 || $this->getMarcador2()=="AD") $this->ganadorSet(2);
                else $this->setMarcador2($puntuaciones[$puntosJug2]);
            }
        }
        
        return [$this->getMarcador1(), $this->getMarcador2()];
    }
}

?>