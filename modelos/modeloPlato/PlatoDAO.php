<?php

     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH.'modelos/ConBdMysql.php'; 
     
     class PlatoDAO extends ConBdMysql{
        public function __construct ($servidor, $base, $loginBD, $passwordBD) {
            parent::__construct($servidor, $base, $loginBD, $passwordBD);
     }
     public function seleccionarTodos() {

        $consultar = "select plaId, plaDescripcion ,plaPrecio, plaEstado
        from plato ;";

        $registroPlato = $this -> conexion -> prepare($consultar);
        $registroPlato -> execute();

        $listadoPlato = array();

        while ($registro = $registroPlato -> fetch(PDO::FETCH_OBJ)) {
            $listadoPlato[] = $registro;
        }
        $this->cierreBd();
        return $listadoPlato;
     }
     public function seleccionarId($plaId) {
         $consultar = "select plaId, plaDescripcion ,plaPrecio, plaEstado
         from plato where plaId = ?;";

         $listar = $this -> conexion -> prepare($consultar);
         $listar -> execute(array($plaId[0]));
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
        $consultar = "insert into plato values (:plaId, :plaIdTipoPlato, :plaDescripcion, :plaPrecio, :plaEstado, :plaSesion, :placreated_at, :plaupdate_at);";
        $insertar = $this -> conexion -> prepare($consultar);
        $insertar -> bindParam("plaId", $registro['plaId']);
        $insertar -> bindParam("plaIdTipoPlato", $registro['plaIdTipoPlato']);
        $insertar -> bindParam("plaDescripcion", $registro['plaDescripcion']);
        $insertar -> bindParam("plaPrecio", $registro['plaPrecio']);
        $insertar -> bindParam("plaEstado", $registro['plaEstado']);
        $insertar -> bindParam("plaSesion", $registro['plaSesion']);
        $insertar -> bindParam("placreated_at", $registro['placreated_at']);
        $insertar -> bindParam("plaupdate_at", $registro['plaupdate_at']);
        $insercion = $insertar -> execute();
        $clavePrimaria = $this -> conexion -> lastInsertId();
        return ['inserto' => 1, 'resultado' => $clavePrimaria];
        $this -> cierreBd();
        } catch (PDOException $pdoExc) {
        return['inserto' > 0, $pdoExc -> errorInfo[2]];
        }
    }
    public function eliminar($plaId = array()) {
        $planConsulta = "delete from plato where plaId = :plaId;";
        $eliminar = $this -> conexion -> prepare($planConsulta);
        $eliminar -> bindParam(':plaId', $plaId[0], PDO:: PARAM_INT);    
        $resultado = $eliminar->execute();
        $this -> cierreBd();
        if (!empty($resultado)) {
            return ['eliminar' => TRUE, 'registroEliminado' => array($plaId[0])];
        } else {
            return ['eliminar' => FALSE, 'registroEliminado' => array($plaId[0])];
        }
    }
    public function habilitar($plaId = array()) {
        try {
        $cambiarValorTotal = 1;
        if (isset($plaId[0])) {
            $actualizar = "update plato set plaEstado = ? where plaId = ?;";
            $actualizacion = $this-> conexion -> prepare($actualizar);
            $actualizacion = $actualizacion -> execute(array($cambiarValorTotal, $plaId[0]));
            return['actualizacion' => $actualizacion, 'mensaje' => "Registro activado"];
            }
        }catch (PDOException $pdoExc) {
            return['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
    }
    public function eliminadorLogico($plaId = array()) {
        try {
        $cambiarEstado = 0;
        if (isset($plaId[0])) {
            $actualizar = "update plato set plaEstado = ? where plaId = ?;";
            $actualizacion = $this->conexion->prepare($actualizar);
            $actualizacion = $actualizacion->execute(array($cambiarEstado, $plaId[0]));
            return ['actualizacion' => $actualizacion, 'mensaje' => "Registro Desactivado."];
        }
    } catch (PDOException $pdoExc) {
        return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
    }

}
}
     
?>