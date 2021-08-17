<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH.'modelos/ConBdMysql.php'; 
     class CocineroDAO extends ConBdMysql {
        public function __construct ($servidor, $base, $loginBD, $passwordBD) {
            parent::__construct($servidor, $base, $loginBD, $passwordBD);
        }
        public function seleccionarTodos() {
            $consulta = "select cocId, cocIdCodigoCocinero, cocCreated_at
            from cocinero ;";
            $registroCocinero = $this->conexion->prepare($consulta);
            $registroCocinero -> execute();
            $listadoRegistroCocinero =array();
            while ($registro = $registroCocinero->fetch(PDO::FETCH_OBJ)) {
                $listadoRegistroCocinero[] = $registro;
            }
            $this->cierreBd();
                return $listadoRegistroCocinero;
        
        }
        public function seleccionarId($cocId) {
            $consulta = "select cocId, cocIdCodigoCocinero, cocCreated_at
            from cocinero 
            where cocId = ?;";
            $listar = $this -> conexion -> prepare($consulta);
            $listar -> execute(array($cocId[0]));
            $registroEncontrado = array();
            while ($registro = $listar -> fetch(PDO::FETCH_OBJ)) {
                $registroEncontrado[] = $registro;
            }
            $this -> cierreBd();
            if (!empty($registroEncontrado)) {
                return ['exitoSeleccionId' => true, 'registroEncontrado' => $registroEncontrado];
            } else {
                return ['exitoSeleccionId' => false, 'registroEncontrado' => $registroEncontrado];
            }
        }
        public function insertar($registro) {
            try {
                $consulta = "insert into cocinero values (:cocId, :cocIdCocinero, :cocCodigoCocinero, :cocEstado, :cocSesion, :cocCreated_at, :cocUpdated_at);";
                $insertar = $this -> conexion -> prepare($consulta);
                $insertar -> bindParam("cocId",$registro['cocId']);
                $insertar -> bindParam("cocIdCocinero",$registro['cocIdCocinero']);
                $insertar -> bindParam("cocCodigoCocinero",$registro['cocCodigoCocinero']);
                $insertar -> bindParam("cocEstado",$registro['cocEstado']);
                $insertar -> bindParam("cocSesion",$registro['cocSesion']);
                $insertar -> bindParam("cocCreated_at",$registro['cocCreated_at']);
                $insertar -> bindParam("cocUpdated_at",$registro['cocUpdated_at']);
                $insercion = $insertar -> execute();
                $clavePrimaria = $this->conexion ->lastInsertId();
                return['inserto' => 1, 'resultado' => $clavePrimaria];
                $this -> cierreBd();
            } catch (PDOException $pdoExc) {
                return['inserto' > 0, $pdoExc -> errorInfo[2]];
            }
        }
        public function eliminar($cocId = array()) {

            $planConsulta = "delete from cocinero where cocId = :cocId;";

            $eliminar = $this -> conexion -> prepare($planConsulta);
            $eliminar -> bindParam(':cocId', $cocId[0], PDO:: PARAM_INT);    
            $resultado = $eliminar->execute();

            $this -> cierreBd();

            if (!empty($resultado)) {
                return ['eliminar' => TRUE, 'registroEliminado' => array($cocId[0])];
            } else {
                return ['eliminar' => FALSE, 'registroEliminado' => array($cocId[0])];
            }

        }
        public function habilitar($cocId = array()) {


            try {

            $cambiarValorTotal = 1;

            if (isset($cocId[0])) {

                $actualizar = "update cocinero set cocEstado = ? where cocId = ?;";
                $actualizacion = $this-> conexion -> prepare($actualizar);
                $actualizacion = $actualizacion -> execute(array($cambiarValorTotal, $cocId[0]));
                return['actualizacion' => $actualizacion, 'mensaje' => "Registro activado"];
                }

            }catch (PDOException $pdoExc) {
                return['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
            }
        }

        public function eliminadorLogico($cocId = array()) {

            try {

            $cambiarEstado = 0;
            if (isset($cocId[0])) {
                $actualizar = "update cocinero set cocEstado = ? where cocId = ?;";
                $actualizacion = $this->conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($cambiarEstado, $cocId[0]));
                return ['actualizacion' => $actualizacion, 'mensaje' => "Registro Desactivado."];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }

    }
         
     }
     
?>