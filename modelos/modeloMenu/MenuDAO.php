<?php
    include_once '../../modelos/ConstantesConexion.php';
    include_once PATH.'modelos/ConBdMysql.php';
    class MenuDAO extends ConBdMysql{
        public function __construct ($servidor, $base, $loginBD, $passwordBD) {
            parent::__construct($servidor, $base, $loginBD, $passwordBD);
        }  
        public function seleccionarTodos() {
            $consultar = "select menId,menObservacion,menEstado,menCreated_at
            from menu ;";
            $registroMenu = $this -> conexion -> prepare($consultar);
            $registroMenu -> execute();
            $listadoRegistroMenu = array();
            while ($registro = $registroMenu -> fetch(PDO::FETCH_OBJ)) {
                $listadoRegistroMenu[] = $registro;
            }
            $this->cierreBd();
            return $listadoRegistroMenu;
        }
        public function seleccionarId($menId) {
            $consultar = "select menId,menObservacion,menEstado,menCreated_at
            from menu where menId = ? ;";
            $listar = $this -> conexion -> prepare($consultar);
            $listar -> execute(array($menId[0]));
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
            try{
                $consultar = "insert into menu values (:menId, :menIdPlato, :menObservacion, :menEstado, :menSesion, :menCreated_at, :menUpdated_at);";
                $insertar = $this -> conexion -> prepare($consultar);
                $insertar -> bindParam("menId",$registro['menId']);
                $insertar -> bindParam("menIdPlato",$registro['menIdPlato']);
                $insertar -> bindParam("menObservacion",$registro['menObservacion']);
                $insertar -> bindParam("menEstado",$registro['menEstado']);
                $insertar -> bindParam("menSesion",$registro['menSesion']);
                $insertar -> bindParam("menCreated_at",$registro['menCreated_at']);
                $insertar -> bindParam("menUpdated_at",$registro['menUpdated_at']);
                $insercion = $insertar -> execute();
                $clavePrimaria = $this -> conexion -> lastInsertId();
                return['inserto' => 1, 'resultado' => $clavePrimaria];
                $this -> cierreBd();                
            }  catch (PDOException $pdoExc){
                return['inserto' > 0, $pdoExc -> errorInfo[2]];
            }      
        }
        public function eliminar($menId = array()) {
            $planConsulta = "delete from menu where menId = :menId;";
            $eliminar = $this -> conexion -> prepare($planConsulta);
            $eliminar -> bindParam(':menId', $menId[0], PDO:: PARAM_INT);    
            $resultado = $eliminar->execute();
            $this -> cierreBd();
            if (!empty($resultado)) {
                return ['eliminar' => TRUE, 'registroEliminado' => array($menId[0])];
            } else {
                return ['eliminar' => FALSE, 'registroEliminado' => array($menId[0])];
            }
        }
        public function habilitar($menId = array()) {
            try {
            $cambiarValorTotal = 1;
            if (isset($menId[0])) {
                $actualizar = "update menu set menEstado = ? where menId = ?;";
                $actualizacion = $this-> conexion -> prepare($actualizar);
                $actualizacion = $actualizacion -> execute(array($cambiarValorTotal, $menId[0]));
                return['actualizacion' => $actualizacion, 'mensaje' => "Registro activado"];
                }
            }catch (PDOException $pdoExc) {
                return['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
            }
        }
        public function eliminadorLogico($menId = array()) {
            try {
            $cambiarEstado = 0;
            if (isset($menId[0])) {
                $actualizar = "update menu set menEstado = ? where menId = ?;";
                $actualizacion = $this->conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($cambiarEstado, $menId[0]));
                return ['actualizacion' => $actualizacion, 'mensaje' => "Registro Desactivado."];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }

    }
    }
    
?>