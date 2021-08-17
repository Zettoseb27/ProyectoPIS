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

        public function insertar($registro) {
        
            try {
               $consulta = "insert into persona values (:perId, :perDocumento, :perNombre, 
               :perApellido, :perEstado, :perUsuSesion, :per_created_at, :per_updated_at,
               :usuario_s_usuId);";

               $insertar = $this -> conexion -> prepare($consulta);
              
               $insertar -> bindParam("perId",$registro['perId']);
               $insertar -> bindParam("perDocumento",$registro['perDocumento']);
               $insertar -> bindParam("perNombre",$registro['perNombre']);
               $insertar -> bindParam("perApellido",$registro['perApellido']);
               $insertar -> bindParam("perEstado",$registro['perEstado']);
               $insertar -> bindParam("perUsuSesion",$registro['perUsuSesion']);
               $insertar -> bindParam("per_created_at",$registro['per_created_at']);
               $insertar -> bindParam("per_updated_at",$registro['per_updated_at']);
               $insertar -> bindParam("usuario_s_usuId",$registro['usuario_s_usuId']);


               $insercion = $insertar -> execute();
               $clavePrimaria = $this->conexion -> lastInsertId();

               return['insertar' => 1, 'resultado' => $clavePrimaria];

            } catch (PDOException $pdoExc) {
               return['inserto' > 0, $pdoExc -> errorInfo[2]];
            }
        }

        public function eliminar($perId=array()) {

         $planConsulta = "delete from persona where perId = :perId;";

         $eliminar = $this->conexion -> prepare($planConsulta);
         $eliminar -> bindParam(':perId', $perId[0], PDO:: PARAM_INT);
         $resultado = $eliminar -> execute();
         
         $this-> cierreBd();

            if (!empty($resultado)) {
               return ['eliminar' => TRUE, 'registroEliminado' => array($perId[0])];
         } else {
               return ['eliminar' => FALSE, 'registroEliminado' => array($perId[0])];
         }
        }

      public function habilitar($perId = array()) {
         
         try {
            $cambiarValor = 1;

            if (isset($perId[0])) {

               $actualizar  = "update persona set perEstado = ? where perId = ?;";
               $actualizacion = $this -> conexion -> prepare($actualizar);
               $actualizacion = $actualizacion -> execute(array($cambiarValor, $perId[0]));
               return['actualizacion' => $actualizacion, 'mensaje' => "Registro activado"];
            }
         } catch (PDOException $pdoExc) {
            
            return['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
         }
      }
         public function eliminadorLogico($perId = array()) {

            try {

            $cambiarEstado = 0;
            if (isset($perId[0])) {
               $actualizar = "update persona set perEstado = ? where perId = ?;";
               $actualizacion = $this->conexion->prepare($actualizar);
               $actualizacion = $actualizacion->execute(array($cambiarEstado, $perId[0]));
               return ['actualizacion' => $actualizacion, 'mensaje' => "Registro Desactivado."];
            }
      } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
      }
     }
}

     
?>