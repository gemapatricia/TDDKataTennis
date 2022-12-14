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

    public function comprobarVentaja($puntJug1, $puntJug2){
        if ($puntJug1==4 && $puntJug2==3) return true;
        elseif ($puntJug2==4 && $puntJug1==3) return true;
        else return false;
    }

    public function comprobarVictoria($puntosJug, $numJugador){
        if ($numJugador==1){
            if ($puntosJug==4 && $this->getMarcador2()!="AD") return true;
            elseif ($this->getMarcador1()=="AD") return true;
        }
        elseif ($numJugador==2){
            if ($puntosJug==4 && $this->getMarcador1()!="AD") return true;
            elseif ($this->getMarcador2()=="AD") return true;
        }
        else return false;
        
    }

    public function calcularPuntuacion($array){
        $puntuaciones = ["Love", "15", "30", "40"];
        $puntosJug1 = $puntosJug2 = 0;

        foreach ($array as $clave => $valor){
            $punto = $array[$clave];

            if ($punto[0] + $punto[1] != 1) throw new Exception("Valores para el punto inválidos");

            if ($punto[0]==1){
                if ($this->comprobarVentaja(++$puntosJug1, $puntosJug2)) $this->setMarcador1("AD");
                elseif ($this->comprobarVictoria($puntosJug1, 1)) $this->ganadorSet(1);
                elseif ($puntosJug1==4 && $this->getMarcador2()=="AD"){
                    $puntosJug1 = $puntosJug2 = 3;
                    $this->setMarcador2($puntuaciones[$puntosJug2]);
                }
                else $this->setMarcador1($puntuaciones[$puntosJug1]);
            }
            else if ($punto[1]==1){
                if ($this->comprobarVentaja($puntosJug1, ++$puntosJug2)) $this->setMarcador2("AD");
                elseif ($this->comprobarVictoria($puntosJug2, 2)) $this->ganadorSet(2);
                elseif ($puntosJug2==4 && $this->getMarcador1()=="AD"){
                    $puntosJug1 = $puntosJug2 = 3;
                    $this->setMarcador1($puntuaciones[$puntosJug1]);
                }
                else $this->setMarcador2($puntuaciones[$puntosJug2]);
            }
        }
        
        return [$this->getMarcador1(), $this->getMarcador2()];
    }
}

?>