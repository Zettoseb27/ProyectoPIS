<?php
     //include_once '../../modelos/ConstantesConexion.php'; 
     include_once PATH.'modelos/ConBdMysql.php'; 
     class HorarioCocineroDAO extends ConBdMysql{
        public function __construct ($servidor, $base, $loginBD, $passwordBD) {
            parent::__construct($servidor, $base, $loginBD, $passwordBD);
        }
        public function seleccionarTodos() {
            $consultar = "SELECT Hc.horCocId, C.cocIdCodigoCocinero,Hc.horCocHoraInicio, Hc.horCocHoraFin, Hc.horCocFecha
            FROM horario_cocinero Hc 
            INNER JOIN cocinero C ON Hc.horCocIdCocinero = C.cocId;";
            $registroHorario = $this -> conexion -> prepare($consultar);
            $registroHorario -> execute();
            $listaRegistro = array();
            while ($registro = $registroHorario -> fetch(PDO::FETCH_OBJ)) {
                $listaRegistro[] = $registro; 
            }
            $this->cierreBd();
            return $listaRegistro;
        }
        public function seleccionarId($horCocId) {
            $consultar = "SELECT horCocId, horCocHoraInicio, horCocHoraFin, horCocFecha
            FROM horario_cocinero WHERE horCocId = ?;";
            $listar = $this -> conexion -> prepare($consultar);
            $listar -> execute(array($horCocId[0]));
            $registroEncontrado = array();
            while ($registro = $listar -> fetch(PDO::FETCH_OBJ)) {
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
                $consultar = "insert into horario_cocinero values (:horCocId, :horCocIdCocinero, :horCocHoraInicio, :horCocHoraFin, :horCocFecha, :horCocEstado, :horCocSesion, :horCocCreated_at, :horCocUpdated_at);";
                $insertar = $this-> conexion -> prepare($consultar);
                $insertar -> bindParam("horCocId", $registro['horCocId']);
                $insertar -> bindParam("horCocIdCocinero", $registro['horCocIdCocinero']);
                $insertar -> bindParam("horCocHoraInicio", $registro['horCocHoraInicio']);
                $insertar -> bindParam("horCocHoraFin", $registro['horCocHoraFin']);
                $insertar -> bindParam("horCocFecha", $registro['horCocFecha']);
                $insertar -> bindParam("horCocEstado", $registro['horCocEstado']);
                $insertar -> bindParam("horCocSesion", $registro['horCocSesion']);
                $insertar -> bindParam("horCocCreated_at", $registro['horCocCreated_at']);
                $insertar -> bindParam("horCocUpdated_at", $registro['horCocUpdated_at']);
                $insercion = $insertar -> execute();
                $clavePrimaria = $this -> conexion -> lastInsertId();
                return ['inserto' => 1, 'resultado' => $clavePrimaria];
                $this -> cierreBd();
            } catch (PDOException $pdoExc) {
                return['inserto' > 0, $pdoExc -> errorInfo[2]];
            }
        }
        public function eliminar($horCocId = array()) {

            $planConsulta = "delete from horario_cocinero where horCocId = :horCocId;";

            $eliminar = $this -> conexion -> prepare($planConsulta);
            $eliminar -> bindParam(':horCocId', $horCocId[0], PDO:: PARAM_INT);    
            $resultado = $eliminar->execute();

            $this -> cierreBd();

            if (!empty($resultado)) {
                return ['eliminar' => TRUE, 'registroEliminado' => array($horCocId[0])];
            } else {
                return ['eliminar' => FALSE, 'registroEliminado' => array($horCocId[0])];
            }

        }
        public function habilitar($horCocId = array()) {


            try {

            $cambiarValorTotal = 1;

            if (isset($horCocId[0])) {

                $actualizar = "update horario_cocinero set horCocEstado = ? where horCocId = ?;";
                $actualizacion = $this-> conexion -> prepare($actualizar);
                $actualizacion = $actualizacion -> execute(array($cambiarValorTotal, $horCocId[0]));
                return['actualizacion' => $actualizacion, 'mensaje' => "Registro activado"];
                }

            }catch (PDOException $pdoExc) {
                return['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
            }
        }

        public function eliminadorLogico($horCocId = array()) {

            try {

            $cambiarEstado = 0;
            if (isset($horCocId[0])) {
                $actualizar = "update horario_cocinero set horCocEstado = ? where horCocId = ?;";
                $actualizacion = $this->conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($cambiarEstado, $horCocId[0]));
                return ['actualizacion' => $actualizacion, 'mensaje' => "Registro Desactivado."];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }

    }
         
     }
     
?>