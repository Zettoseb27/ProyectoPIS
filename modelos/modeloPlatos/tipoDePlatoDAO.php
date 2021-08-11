<?php
     
     include_once "../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";

     class PlatoDAO extends ConBdMySql {
        public function __construct ($servidor, $base, $loginBD, $passwordBD) {
            parent::__construct($servidor, $base, $loginBD, $passwordBD);
        }

        public function seleccionarTodos(){

        }
        public function seleccionarId($plaId /* llave foranea */) {

        }
        public function insertar($plaDescripcion) {

        }
        public function actualizar($plaDescripcion) {

        }
        public function eliminar($plaId = array()) {

        }
        public function habilitar($plaId = array()) {

        }
        public function eliminadorLogico($plaId = array()) {

        }
     }

?>