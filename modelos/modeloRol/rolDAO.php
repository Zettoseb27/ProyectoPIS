<?php

        include_once "../../modelos/ConstantesConexion.php";
        include_once PATH."modelos/ConBdMysql.php";

     class RolDAO extends ConBdMySql {
        public function __construct ($servidor, $base, $loginBD, $passwordBD) {
            parent::__construct($servidor, $base, $loginBD, $passwordBD);
        }
       public function seleccionarTodos(){
           $planConsulta = "select rolId, rolNombre, rolDescripcion, rol_created_at
           from rol;";
           $registrosOrden = $this -> conexion -> prepare ($planConsulta);
           $registrosOrden -> execute();//ejecucion de la consulta
           $listadoRegistroOrden = array();
           while($registro=$registrosOrden -> fetch(PDO::FETCH_OBJ)){
               $listadoRegistroOrden[] = $registro;
           }
               $this->cierreBd();
               return $listadoRegistroOrden;
       }public function seleccionarId($rolId) {
            $consultar = "select rolId, rolNombre, rolDescripcion, rol_created_at
            from rol where rolId = ?;";
            $listar = $this -> conexion -> prepare($consultar);
            $listar -> execute(array($rolId[0]));
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
                $consultar = "insert into rol values (:rolId, :rolNombre, :rolDescripcion, :rolEstado, :rolUsuSesion, :rol_created_at, :rol_updated_at);";
                $insertar = $this -> conexion -> prepare($consultar);
                $insertar -> bindParam("rolId", $registro['rolId']);
                $insertar -> bindParam("rolNombre", $registro['rolNombre']);
                $insertar -> bindParam("rolDescripcion", $registro['rolDescripcion']);
                $insertar -> bindParam("rolEstado", $registro['rolEstado']);
                $insertar -> bindParam("rolUsuSesion", $registro['rolUsuSesion']);
                $insertar -> bindParam("rol_created_at", $registro['rol_created_at']);
                $insertar -> bindParam("rol_updated_at", $registro['rol_updated_at']);
                $clavePrimaria = $this -> conexion -> lastInsertId();
                return ['inserto' => 1, 'resultado' => $clavePrimaria];
                $this -> cierreBd();
            } catch (PDOException $pdoExc) {
                return['inserto' > 0, $pdoExc -> errorInfo[2]];
            }
       }
       public function eliminar($rolId = array()) {
        $planConsulta = "delete from rol where rolId = :rolId;";
        $eliminar = $this -> conexion -> prepare($planConsulta);
        $eliminar -> bindParam(':rolId', $rolId[0], PDO:: PARAM_INT);    
        $resultado = $eliminar->execute();
        $this -> cierreBd();
        if (!empty($resultado)) {
            return ['eliminar' => TRUE, 'registroEliminado' => array($rolId[0])];
        } else {
            return ['eliminar' => FALSE, 'registroEliminado' => array($rolId[0])];
        }
    }
    public function actualizar($registro) {
        try {
        $nombre = $registro[0]['rolNombre']; 
        $descripcion = $registro[0]['rolDescripcion'];
        $cambiarEstado = $registro[0]['rolEstado'];
        $usuSesion = $registro[0]['rolUsuSesion'];
        $created = $registro[0]['rol_created_at'];
        $updated = $registro[0]['rol_updated_at'];
        $Id = $registro[0]['rolId'];
        if (isset($Id)) {
            $actualizar = "UPDATE rol SET rolNombre=? ,";
            $actualizar.= "rolDescripcion=? ,";
            $actualizar.= "rolEstado=? ,";
            $actualizar.= "rolUsuSesion=? ,";
            $actualizar.= "rol_created_at=? ,";
            $actualizar.= "rol_updated_at=? ";
            $actualizar.= "where rolId=?;";
            $actualizacion = $this->conexion->prepare($actualizar);
            $resultadoAct=$actualizacion->execute(array($nombre,$descripcion,$cambiarEstado,$usuSesion,$created,$updated, $Id));
            $this->cierreBd();
						
            //MEJORAR LA SALIDA DE LOS DATOS DE ACTUALIZACIÓN EXITOSA
            return ['actualizacion' => $resultadoAct, 'mensaje' => "Actualización realizada."];	
        }
            } catch (PDOException $pdoExc) {
                $this->cierreBd();
                return ['actualizacion' => $resultadoAct, 'mensaje' => $pdoExc];
            }
    }
    public function habilitar($rolId = array()) {
        try {
        $cambiarValorTotal = 1;
        if (isset($rolId[0])) {
            $actualizar = "update rol set rolEstado = ? where rolId = ?;";
            $actualizacion = $this-> conexion -> prepare($actualizar);
            $actualizacion = $actualizacion -> execute(array($cambiarValorTotal, $rolId[0]));
            return['actualizacion' => $actualizacion, 'mensaje' => "Registro activado"];
            }
        }catch (PDOException $pdoExc) {
            return['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
    }
    public function eliminadorLogico($rolId = array()) {
        try {
        $cambiarEstado = 0;
        if (isset($rolId[0])) {
            $actualizar = "update rol set rolEstado = ? where rolId = ?;";
            $actualizacion = $this->conexion->prepare($actualizar);
            $actualizacion = $actualizacion->execute(array($cambiarEstado, $rolId[0]));
            return ['actualizacion' => $actualizacion, 'mensaje' => "Registro Desactivado."];
        }
    } catch (PDOException $pdoExc) {
        return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
    }

}
    }
    


