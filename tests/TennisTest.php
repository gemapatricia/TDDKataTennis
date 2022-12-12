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
}

?>