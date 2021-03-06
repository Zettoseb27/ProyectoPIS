<?php
          //include_once '../../modelos/ConstantesConexion.php'; 
          include_once PATH.'modelos/ConBdMysql.php'; 
          class HorarioDAO extends ConBdMysql{
             public function __construct ($servidor, $base, $loginBD, $passwordBD) {
                 parent::__construct($servidor, $base, $loginBD, $passwordBD);
             }
             public function seleccionarTodos() {
                $consultar = "select hr.horId,hr.horHoraFin,hr.horFecha,
                cm.codMesCodigoMesero,hr.horHoraInicio,
                p.perNombre, p.perApellido
            from horario hr 
            inner join codigo_mesero cm on hr.horIdCodigoMesero = cm.codMesId
            inner join persona p on cm.codMesIdMesero = p.perId;";
                $registroHorario = $this -> conexion -> prepare($consultar);
                $registroHorario -> execute();
                $listaRegistro = array();
                while ($registro = $registroHorario -> fetch(PDO::FETCH_OBJ)) {
                    $listaRegistro[] = $registro; 
                }
                $this->cierreBd();
                return $listaRegistro;
             }
             public function seleccionarId($hoRId) {
                $consultar = "SELECT * FROM horario WHERE horId = ?;";
                $listar = $this -> conexion -> prepare($consultar);
                $listar -> execute(array($hoRId[0]));
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
            public function actualizar($registro) {
                try {
                    $HoraInicio = $registro[0]['horHoraInicio'];
                    $HoraFin = $registro[0]['horHoraFin'];
                    //$Fecha = $registro[0]['horFecha'];
                    //$CodigoMesero = $registro[0]['horIdCodigoMesero'];
                    $Id = $registro[0]['horId'];
                    if (isset($Id)) {
                        $actualizar = "update horario set  horHoraInicio = ?, horHoraFin = ? where horId = ?;"; 
                        $actualizacion = $this->conexion->prepare($actualizar);
                        $resultadoAct = $actualizacion->execute(array($HoraInicio,$HoraFin,$Id));
                        $this->cierreBd();
                        return ['actualizacion' => $resultadoAct, 'mensaje' => "Actualizaci??n realizada."];
                    }
                } catch (PDOException $pdoExc) {
                    $this->cierreBd();
                    return ['actualizacion' => $resultadoAct, 'mensaje' => $pdoExc];
                }
            
            }
            public function insertar($registro) {
                try {
                    $consultar = "INSERT INTO horario (horId,horHoraInicio,horHoraFin,horFecha,horObservacion,horIdCodigoMesero) VALUES (:horId,:horHoraInicio, :horHoraFin,:horFecha,:horObservacion,:horIdCodigoMesero);";
                    $insertar = $this-> conexion -> prepare($consultar);
                    $insertar -> bindParam("horId", $registro['horId']);
                    $insertar -> bindParam("horHoraInicio", $registro['horHoraInicio']);
                    $insertar -> bindParam("horHoraFin", $registro['horHoraFin']);
                    $insertar -> bindParam("horFecha", $registro['horFecha']);
                    $insertar -> bindParam("horObservacion", $registro['horObservacion']);
                    $insertar -> bindParam("horIdCodigoMesero", $registro['horIdCodigoMesero']);
                    $insercion = $insertar -> execute();
                    $clavePrimaria = $this -> conexion -> lastInsertId();
                    return ['inserto' => $insercion, 'resultado' => $clavePrimaria];
                    $this -> cierreBd();
                } catch (PDOException $pdoExc) {
                    return['inserto' => $insercion, $pdoExc -> errorInfo[2]];
                }
            }
            public function eliminar($horId = array()) {

                $planConsulta = "delete from horario where horId = :horId;";
    
                $eliminar = $this -> conexion -> prepare($planConsulta);
                $eliminar -> bindParam(':horId', $horId[0], PDO:: PARAM_INT);    
                $resultado = $eliminar->execute();
    
                $this -> cierreBd();
    
                if (!empty($resultado)) {
                    return ['eliminar' => TRUE, 'registroEliminado' => array($horId[0])];
                } else {
                    return ['eliminar' => FALSE, 'registroEliminado' => array($horId[0])];
                }
    
            }
            public function habilitar($horId = array()) {
    
    
                try {
    
                $cambiarValorTotal = 1;
    
                if (isset($horId[0])) {
    
                    $actualizar = "update horario set horEstado = ? where horId = ?;";
                    $actualizacion = $this-> conexion -> prepare($actualizar);
                    $actualizacion = $actualizacion -> execute(array($cambiarValorTotal, $horId[0]));
                    return['actualizacion' => $actualizacion, 'mensaje' => "Registro activado"];
                    }
    
                }catch (PDOException $pdoExc) {
                    return['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
                }
            }
    
            public function eliminadorLogico($horId = array()) {
    
                try {
    
                $cambiarEstado = 0;
                if (isset($horId[0])) {
                    $actualizar = "update horario set horEstado = ? where horId = ?;";
                    $actualizacion = $this->conexion->prepare($actualizar);
                    $actualizacion = $actualizacion->execute(array($cambiarEstado, $horId[0]));
                    return ['actualizacion' => $actualizacion, 'mensaje' => "Registro Desactivado."];
                }
            } catch (PDOException $pdoExc) {
                return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
            }
    
        }
    
}
?>