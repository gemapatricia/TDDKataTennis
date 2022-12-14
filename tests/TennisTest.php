<?php declare( strict_types = 1 );

use App\Tennis;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

Class TennisTest extends TestCase{

    public function testInicio():void{
        $objeto = new Tennis();
        assertEquals("Love", $objeto->getMarcador1(), "No coincide la puntuacion inicial");
    }
    
    public function testInicio2():void{
        $objeto = new Tennis();
        assertEquals("Love", $objeto->getMarcador2(), "No coincide la puntuacion inicial");
    } 

    public function testPrimerPunto1():void{
        $objeto = new Tennis();
        assertEquals(["15", "Love"], $objeto->calcularPuntuacion([[1,0]]), "No coincide la puntuacion primer punto");
    } 

    public function testPrimerPunto2():void{
        $objeto = new Tennis();
        assertEquals(["Love", "15"], $objeto->calcularPuntuacion([[0,1]]), "No coincide la puntuacion primer punto");
    } 

    public function testPrimerPuntoInvalido():void{
        try{
            $objeto = new Tennis();
            $objeto->calcularPuntuacion([[1,1]]);
        }
        catch(Exception $e){
            assertEquals($e->getMessage(), "Valores para el punto inválidos", "No coincide la excepción");
        }
    } 

    public function testPrimerPuntoInvalido2():void{
        try{
            $objeto = new Tennis();
            $objeto->calcularPuntuacion([[0,0]]);
        }
        catch(Exception $e){
            assertEquals($e->getMessage(), "Valores para el punto inválidos", "No coincide la excepción");
        }
    }
    
    public function testSegundoPunto1():void{
        $objeto = new Tennis();
        assertEquals(["30", "Love"], $objeto->calcularPuntuacion([[1,0], [1,0]]), "No coincide la puntuacion segundo punto");
    } 

    public function testSegundoPunto2():void{
        $objeto = new Tennis();
        assertEquals(["Love", "30"], $objeto->calcularPuntuacion([[0,1], [0,1]]), "No coincide la puntuacion segundo punto");
    } 

    public function testPrimerPunto1SegundoPunto2():void{
        $objeto = new Tennis();
        assertEquals(["15", "15"], $objeto->calcularPuntuacion([[1,0], [0,1]]), "No coincide la puntuacion segundo punto");
    }
    
    public function testPrimerPunto1SegundoPunto2TercerPunto2():void{
        $objeto = new Tennis();
        assertEquals(["15", "30"], $objeto->calcularPuntuacion([[1,0], [0,1], [0,1]]), "No coincide la puntuacion segundo punto");
    } 

    public function testTercerPunto1():void{
        $objeto = new Tennis();
        assertEquals(["40", "Love"], $objeto->calcularPuntuacion([[1,0], [1,0], [1,0]]), "No coincide la puntuacion segundo punto");
    } 

    public function testGanadorJugador1Set():void{
        $objeto = new Tennis();
        assertEquals(["1", "0"], $objeto->calcularPuntuacion([[1,0], [1,0], [1,0], [1,0]]), "No coincide la puntuacion segundo punto");
    } 

    public function testGanadorJugador2Set():void{
        $objeto = new Tennis();
        assertEquals(["0", "1"], $objeto->calcularPuntuacion([[0,1], [0,1], [1,0], [1,0], [0,1], [0,1]]), "No coincide la puntuacion segundo punto");
    }

    public function testIguales():void{
        $objeto = new Tennis();
        assertEquals(["40", "40"], $objeto->calcularPuntuacion([[0,1], [0,1], [1,0], [1,0], [0,1], [1,0]]), "No coincide la puntuacion segundo punto");
    }

    public function testVentajaIguales():void{
        $objeto = new Tennis();
        assertEquals(["AD", "40"], $objeto->calcularPuntuacion([[0,1], [0,1], [1,0], [1,0], [0,1], [1,0], [1,0]]), "No coincide la puntuacion segundo punto");
    }

    public function testVentajaIguales2():void{
        $objeto = new Tennis();
        assertEquals(["40", "AD"], $objeto->calcularPuntuacion([[0,1], [0,1], [1,0], [1,0], [0,1], [1,0], [0,1]]), "No coincide la puntuacion segundo punto");
    }

    public function testVentajaIgualesGana():void{
        $objeto = new Tennis();
        assertEquals(["1", "0"], $objeto->calcularPuntuacion([[0,1], [0,1], [1,0], [1,0], [0,1], [1,0], [1,0], [1,0]]), "No coincide la puntuacion segundo punto");
    }

    public function testVentajaIgualesGana2():void{
        $objeto = new Tennis();
        assertEquals(["0", "1"], $objeto->calcularPuntuacion([[0,1], [0,1], [1,0], [1,0], [0,1], [1,0], [0,1], [0,1]]), "No coincide la puntuacion segundo punto");
    }

    public function testIgualesVentajaIguales():void{
        $objeto = new Tennis();
        assertEquals(["40", "40"], $objeto->calcularPuntuacion([[0,1], [0,1], [1,0], [1,0], [0,1], [1,0], [0,1], [1,0]]), "No coincide la puntuacion segundo punto");
    }

    public function testIgualesVentajaIguales2():void{
        $objeto = new Tennis();
        assertEquals(["40", "40"], $objeto->calcularPuntuacion([[0,1], [0,1], [1,0], [1,0], [0,1], [1,0], [1,0], [0,1]]), "No coincide la puntuacion segundo punto");
    }

    public function testIgualesVentajaIgualesVentajaIguales():void{
        $objeto = new Tennis();
        assertEquals(["40", "40"], $objeto->calcularPuntuacion([[0,1], [0,1], [1,0], [1,0], [0,1], [1,0], [1,0], [0,1], [1,0], [0,1]]), "No coincide la puntuacion segundo punto");
    }

    public function testIgualesVentajaIgualesVentajaIgualesGana():void{
        $objeto = new Tennis();
        assertEquals(["1", "0"], $objeto->calcularPuntuacion([[0,1], [0,1], [1,0], [1,0], [0,1], [1,0], [1,0], [0,1], [1,0], [0,1], [1,0], [1,0]]), "No coincide la puntuacion segundo punto");
    }


}

?>