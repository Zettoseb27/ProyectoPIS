<?php
     //include_once '../../modelos/ConstantesConexion.php';
     include_once PATH.'modelos/ConBdMysql.php'; 
     class CocineroDAO extends ConBdMysql {
        public function __construct ($servidor, $base, $loginBD, $passwordBD) {
            parent::__construct($servidor, $base, $loginBD, $passwordBD);
        }
        public function seleccionarTodos() {
            $consulta = "select cocId, cocIdCodigoCocinero, cocCreated_at,
            perNombre,perApellido
            from cocinero C
            inner join persona P on C.cocIdCocinero = P.perId;";
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
            $consulta = "SELECT * FROM cocinero 
            WHERE cocId = ?;";
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
                $consulta = "INSERT INTO cocinero  (cocId,cocIdCocinero,cocIdCodigoCocinero) VALUES (:cocId, :cocIdCocinero, :cocIdCodigoCocinero);";
                $insertar = $this -> conexion -> prepare($consulta);
                $insertar -> bindParam("cocId",$registro['cocId']);
                $insertar -> bindParam("cocIdCocinero",$registro['cocIdCocinero']);
                $insertar -> bindParam("cocIdCodigoCocinero",$registro['cocIdCodigoCocinero']);
                $insercion = $insertar -> execute();
                $clavePrimaria = $this->conexion ->lastInsertId();
                return['inserto' => $insercion, 'resultado' => $clavePrimaria];
                $this -> cierreBd();
            } catch (PDOException $pdoExc) {
                return['inserto' => $insercion, $pdoExc -> errorInfo[2]];
            }
        }
        public function actualizar($registro) {
            try {
                
                //$Estado = $registro[0]['codMesEstado'];
                $CodigoCocinero = $registro[0]['cocIdCodigoCocinero'];
                //$Persona = $registro[0]['codMesIdMesero'];
                $Id = $registro[0]['cocId'];
                if (isset($Id)) {
                    $actualizar = "UPDATE cocinero SET cocIdCodigoCocinero = ?";
                   // $actualizar.= "codMesIdMesero = ?";
                    $actualizar.= "WHERE cocId = ?;";
                    $actualizacion = $this->conexion->prepare($actualizar);
                    $resultadoAct = $actualizacion->execute(array($CodigoCocinero,/*$Persona,$Estado,*/$Id));
                    $this->cierreBd();
                    return ['actualizacion' => $resultadoAct, 'mensaje' => "Actualización realizada."];
                }
            } catch (PDOException $pdoExc) {
                    $this->cierreBd(); 
                    return ['actualizacion' => $resultadoAct, 'mensaje' => $pdoExc];
            }
         }
        public function eliminar($Id = array()) {
            $consulta = "delete from cocinero where cocId = :cocId;";
            $eliminar = $this -> conexion -> prepare($consulta);
            $eliminar -> bindParam(':cocId', $Id[0], PDO:: PARAM_INT);    
            $resultado = $eliminar->execute();
            $this -> cierreBd();
            if (!empty($resultado)) {
                return ['eliminar' => TRUE, 'registroEliminado' => array($Id[0])];
            } else {
                return ['eliminar' => FALSE, 'registroEliminado' => array($Id[0])];
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