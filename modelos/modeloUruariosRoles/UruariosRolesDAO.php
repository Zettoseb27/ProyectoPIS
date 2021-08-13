<?php
     
    include_once "../modelos/ConstantesConexion.php";
    include_once PATH."modelos/ConBdMysql.php";

    class UruariosRoles extends ConBdMysql {

        public function __construct($servidor, $base, $loginBD, $passwordBD) {
            parent::__construct($servidor, $base, $loginBD, $passwordBD);
        }
    }

?>