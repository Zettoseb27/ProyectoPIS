<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH.'modelos/ConBdMysql.php';  
     class CodigoMeseroDAO extends ConBdMysql {
        public function __construct ($servidor, $base, $loginBD, $passwordBD) {
            parent::__construct($servidor, $base, $loginBD, $passwordBD);
     }
     public function seleccionarTodos() {
        $constultar = "select codMesId, codMesCodigoMesero,codMescreated_at
        from codigo_mesero;";
        $registroCodigoMesero = $this -> conexion -> prepare($constultar);
        $registroCodigoMesero -> execute();
        $listaRegistroCodigoMesero = array();
        while ($registro = $registroCodigoMesero -> fetch(PDO::FETCH_OBJ)) {
            $listaRegistroCodigoMesero[] = $registro;
        }
        $this-> cierreBd();
        return $listaRegistroCodigoMesero;
     }
     public function seleccionarId($codMesId) {
        $constultar = "select codMesId, codMesCodigoMesero,codMescreated_at
        from codigo_mesero
        where codMesId = ?;";
        $listar = $this -> conexion -> prepare($constultar);
        $listar -> execute(array($codMesId[0]));
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
            $constultar = "insert into codigo_mesero values (:codMesId, :codMesIdMesero, :codMesCodigoMesero, :codMesEstado, :codMesSesion, :codMescreated_at, :codMesupdated_at );";
            $insertar = $this -> conexion -> prepare($constultar);
            $insertar -> bindParam("codMesId", $registro['codMesId']);
            $insertar -> bindParam("codMesIdMesero", $registro['codMesIdMesero']);
            $insertar -> bindParam("codMesCodigoMesero", $registro['codMesCodigoMesero']);
            $insertar -> bindParam("codMesEstado", $registro['codMesEstado']);
            $insertar -> bindParam("codMesSesion", $registro['codMesSesion']);
            $insertar -> bindParam("codMescreated_at", $registro['codMescreated_at']);
            $insertar -> bindParam("codMesupdated_at", $registro['codMesupdated_at']);
            $insercion = $insertar -> execute();
            $clavePrimaria = $this -> conexion -> lastInsertId();
            return ['inserto' => 1, 'resultado' => $clavePrimaria];
            $this -> cierreBd();
        } catch (PDOException $pdoExc) {
            return['inserto' > 0, $pdoExc -> errorInfo[2]];
        }
     }
     public function eliminar($codMesId = array()) {
        $planConsulta = "delete from codigo_mesero where codMesId = :codMesId;";
        $eliminar = $this -> conexion -> prepare($planConsulta);
        $eliminar -> bindParam(':codMesId', $codMesId[0], PDO:: PARAM_INT);    
        $resultado = $eliminar->execute();
        $this -> cierreBd();
        if (!empty($resultado)) {
            return ['eliminar' => TRUE, 'registroEliminado' => array($codMesId[0])];
        } else {
            return ['eliminar' => FALSE, 'registroEliminado' => array($codMesId[0])];
        }
    }
    public function habilitar($codMesId = array()) {
        try {
        $cambiarValorTotal = 1;
        if (isset($codMesId[0])) {
            $actualizar = "update codigo_mesero set codMesEstado = ? where codMesId = ?;";
            $actualizacion = $this-> conexion -> prepare($actualizar);
            $actualizacion = $actualizacion -> execute(array($cambiarValorTotal, $codMesId[0]));
            return['actualizacion' => $actualizacion, 'mensaje' => "Registro activado"];
            }
        }catch (PDOException $pdoExc) {
            return['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
    }
    public function eliminadorLogico($codMesId = array()) {
        try {
        $cambiarEstado = 0;
        if (isset($codMesId[0])) {
            $actualizar = "update codigo_mesero set codMesEstado = ? where codMesId = ?;";
            $actualizacion = $this->conexion->prepare($actualizar);
            $actualizacion = $actualizacion->execute(array($cambiarEstado, $codMesId[0]));
            return ['actualizacion' => $actualizacion, 'mensaje' => "Registro Desactivado."];
        }
        } catch (PDOException $pdoExc) {
        return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
    }
}
     
?>