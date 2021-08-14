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

        public function seleccionarId($perId) {

         $Consulta = "select perId ,perDocumento, perNombre, perApellido, per_created_at
         from persona
         where perId = ? ;";

         $lista = $this-> conexion -> prepare($Consulta);
         $lista -> execute(array($perId[0]));

         $registroEncontrado = array();

         while ($registro = $lista -> fetch(PDO::FETCH_OBJ)) {
            $registroEncontrado[] = $registro;
         }

         $this->cierreBd();

         if (!empty($registroEncontrado)) {
             return ['exitoSeleccionId' => true, 'registroEncontrado' => $registroEncontrado];
         } else {
             return ['exitoSeleccionId' => false, 'registroEncontrado' => $registroEncontrado];
         }
        
        }
     }

     
?>