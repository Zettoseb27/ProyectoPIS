<?php
      class Operaciones{
          public function __constructor() {
            
          }
          public function sum($n1,$n2) {
            if ($n1 === null || $n2 ===null || !is_numeric($n1) || !is_numeric($n2)) {
                throw new InvalidArgumentException("Valores no son numericos");   
            }
            return $n1 +$n2;
          }
          public function division($n1,$n2) {
            if ($n1 === null || $n2 === null || !is_numeric($n1) || !is_numeric($n2)) {
                throw new InvalidArgumentException("Valores no son numericos");
            }
            if ($n2 == 0) {
                throw new InvalidArgumentException("Division por cero"); 
            }
            return $n1 / $n2;
          }
      }

?>