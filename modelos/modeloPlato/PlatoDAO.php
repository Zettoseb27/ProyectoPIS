<?php

     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH.'modelos/ConBdMysql.php'; 
     
     class PlatoDAO extends ConBdMysql{
        public function __construct ($servidor, $base, $loginBD, $passwordBD) {
            parent::__construct($servidor, $base, $loginBD, $passwordBD);
     }
     public function seleccionarTodos() {

        $consultar = "select Pl.plaId, Pl.plaDescripcion, Pl.plaPrecio, Pl.plaEstado, Tp.tipPlaPlato
        from plato Pl
        inner join tipo_plato Tp on Pl.plaIdTipoPlato = Tp.tipPlaId;";

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
         $consultar = "SELECT * FROM plato where plaId = ?;";

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
        $consultar = "INSERT INTO plato (plaId,plaDescripcion,plaPrecio,plaEstado,plaIdTipoPlato) VALUES (:plaId, :plaDescripcion, :plaPrecio, :plaEstado, :plaIdTipoPlato);";
        $insertar = $this -> conexion -> prepare($consultar);
        $insertar -> bindParam("plaId", $registro['plaId']);
        $insertar -> bindParam("plaDescripcion", $registro['plaDescripcion']);
        $insertar -> bindParam("plaPrecio", $registro['plaPrecio']);
        $insertar -> bindParam("plaEstado", $registro['plaEstado']);
        $insertar -> bindParam("plaIdTipoPlato", $registro['plaIdTipoPlato']);
        $insercion = $insertar -> execute();
        $clavePrimaria = $this -> conexion -> lastInsertId();
        return ['inserto' => $insercion, 'resultado' => $clavePrimaria];
        $this -> cierreBd();
        } catch (PDOException $pdoExc) {
        return['inserto' => $insercion, $pdoExc -> errorInfo[2]];
        }
    }
    public function actualizar($registro) {  
        try {
            $Descripcion = $registro[0]['plaDescripcion'];
            $Precio = $registro[0]['plaPrecio'];
            //$Estado = $registro[0]['plaEstado'];
            $TipoPlato = $registro[0]['plaIdTipoPlato'];
            $Id = $registro[0]['plaId'];
            if (isset($Id)) {
                $actualizar  = "UPDATE plato SET plaDescripcion = ?,";
                $actualizar.= " plaPrecio = ? ,";
                //$actualizar.= " plaEstado = ? ,";
                $actualizar.= " plaIdTipoPlato = ? ";
                $actualizar.= " WHERE plaId = ?;";
                $actualizacion = $this->conexion->prepare($actualizar);
                $resultadoAct = $actualizacion->execute(array($Descripcion, $Precio,/* $Estado,*/ $TipoPlato, $Id));
                $this->cierreBd();
                //MEJORAR LA SALIDA DE LOS DATOS DE ACTUALIZACIÓN EXITOSA
                return ['actualizacion' => $resultadoAct, 'mensaje' => "Actualización realizada."];
            }
        } catch (PDOException $pdoExc) {
			$this->cierreBd();
            return ['actualizacion' => $resultadoAct, 'mensaje' => $pdoExc];
        }	
    }
    public function eliminar($plaId = array()) {
        $planConsulta = "delete from plato where plaId = ?;";
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