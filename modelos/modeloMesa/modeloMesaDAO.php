<?php
     include_once 'modelos/ConstantesConexion.php';
     include_once 'modelos/ConBdMysql.php';  

     class MesaDAO extends ConBdMysql {
         public function __construct($servidor, $base, $loginBD, $passwordBD) {
            parent::__construct($servidor, $base, $loginBD, $passwordBD);
         }

         public function seleccionarTodo() {

            $consultar = "";
         
         }
     }
?>