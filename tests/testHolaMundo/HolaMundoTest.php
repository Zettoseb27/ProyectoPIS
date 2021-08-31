<?php


    use PHPUnit\Framework\TestCase;
    require_once "HolaMundo.php";
    final class HolaMundoTest extends TestCase {
        public function testDiceHolaMundoCuandoSaluda(){
            $holaMundo = new holaMundo();
            $this-> assertEquals('Hola Mundo!!',$holaMundo->saluda());
        }
    }
?>