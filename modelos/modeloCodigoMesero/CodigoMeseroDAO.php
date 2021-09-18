<?php
     //include_once '../../modelos/ConstantesConexion.php';
     include_once PATH.'modelos/ConBdMysql.php';  
     class CodigoMeseroDAO extends ConBdMysql {
        public function __construct ($servidor, $base, $loginBD, $passwordBD) {
            parent::__construct($servidor, $base, $loginBD, $passwordBD);
     }
     public function seleccionarTodos() {
        $constultar = "select codMesId, codMesCodigoMesero,
        P.perNombre, P.perApellido, P.perDocumento
        from codigo_mesero Cm
        inner join persona P on Cm.codMesIdMesero = P.perId;";
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
        $constultar = "SELECT * FROM codigo_mesero WHERE codMesId = ?;";
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
     public function actualizar($registro) {
        try {
            
            //$Estado = $registro[0]['codMesEstado'];
            $CodigoMesero = $registro[0]['codMesCodigoMesero'];
            $Persona = $registro[0]['codMesIdMesero'];
            $Id = $registro[0]['codMesId'];
            if (isset($Id)) {
                $actualizar = "UPDATE codigo_mesero SET codMesCodigoMesero = ? ,codMesIdMesero = ? WHERE codMesId = ?;";
                $actualizacion = $this->conexion->prepare($actualizar);
                $resultadoAct = $actualizacion->execute(array($CodigoMesero,$Persona,/*$Estado,*/$Id));
                $this->cierreBd();
                return ['actualizacion' => $resultadoAct, 'mensaje' => "Actualización realizada."];
            }
        } catch (PDOException $pdoExc) {
                $this->cierreBd(); 
                return ['actualizacion' => $resultadoAct, 'mensaje' => $pdoExc];
        }
     }
     public function insertar($registro) {
        try {
            $constultar = "INSERT INTO codigo_mesero  (codMesId, codMesIdMesero, codMesCodigoMesero) VALUES (:codMesId, :codMesIdMesero, :codMesCodigoMesero);";
            $insertar = $this -> conexion -> prepare($constultar);
            $insertar -> bindParam("codMesId", $registro['codMesId']);
            $insertar -> bindParam("codMesIdMesero", $registro['codMesIdMesero']);
            $insertar -> bindParam("codMesCodigoMesero", $registro['codMesCodigoMesero']);
            $insercion = $insertar -> execute();
            $clavePrimaria = $this -> conexion -> lastInsertId();
            return ['inserto' => $insercion, 'resultado' => $clavePrimaria];
            $this -> cierreBd();
        } catch (PDOException $pdoExc) {
            return['inserto' => $insercion, $pdoExc -> errorInfo[2]];
        }
     }
     public function eliminar($codMesId = array()) {
        $planConsulta = "SET FOREIGN_KEY_CHECKS=0; delete from codigo_mesero where codMesId = :codMesId;";
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