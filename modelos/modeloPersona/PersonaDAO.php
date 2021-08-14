<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH.'modelos/ConBdMysql.php';
     
     class PersonaDAO extends ConBdMysql {

        public function __construct($servidor, $base, $loginBD, $passwordBD) {
            parent::__construct($servidor, $base, $loginBD, $passwordBD);
        }

        public function seleccionarTodos() {
            $Consulta = "select perId ,perDocumento, perNombre, perApellido, per_created_at
            from persona ;";
             $registroPersona = $this -> conexion -> prepare ($Consulta);
             $registroPersona -> execute();

             $listadoPersona = array();

             while ($registro = $registroPersona -> fetch(PDO::FETCH_OBJ)) {
                $listadoPersona[] = $registro;
             }

             $this->cierreBd();
             return $listadoPersona;
        }
     }

     
?>