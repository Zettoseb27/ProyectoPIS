<?php
     //include_once '../../modelos/ConstantesConexion.php';
     include_once PATH.'modelos/ConBdMysql.php';
     class FacturaDAO extends ConBdMysql {
        public function __construct ($servidor, $base, $loginBD, $passwordBD) {
            parent::__construct($servidor, $base, $loginBD, $passwordBD);
        }
        public function seleccionarTodos() {
            $consultar = "select  fa.facId,fa.facNombreCliente,fa.facIdOrden,
            cm.codMesCodigoMesero,
            O.ordvalorTotal,
            Tp.tipPlaAdicional,Tp.tipPlaBebida,Tp.tipPlaPostre, Tp.tipPlaPlato
    from factura fa
    inner join codigo_mesero cm on fa.facIdCodigoMesero = cm.codMesId
    inner join orden O on fa.facIdOrden = O.ordId
    inner join menu Mn on O.ordIdMenu = Mn.menId 
            inner join plato Pl on Mn.menIdPlato = Pl.plaId 
            inner join tipo_plato Tp on Pl.plaIdTipoPlato= Tp.tipPlaId;";
            $registroFactura = $this->conexion ->prepare($consultar);
            $registroFactura -> execute();
            $listadoRegistroMenu = array();
            while ($registro = $registroFactura -> fetch(PDO::FETCH_OBJ)) {
                $listadoRegistroMenu[] = $registro;
            }
            $this->cierreBd();
            return $listadoRegistroMenu;
        }
        public function seleccionarId($facId) {
            $consultar = "select  fa.facId,fa.facNombreCliente,fa.facIdOrden,
            cm.codMesCodigoMesero,
            O.ordvalorTotal,
            Tp.tipPlaAdicional,Tp.tipPlaBebida,Tp.tipPlaPostre, Tp.tipPlaPlato
    from factura fa
    inner join codigo_mesero cm on fa.facIdCodigoMesero = cm.codMesId
    inner join orden O on fa.facIdOrden = O.ordId
    inner join menu Mn on O.ordIdMenu = Mn.menId 
            inner join plato Pl on Mn.menIdPlato = Pl.plaId 
            inner join tipo_plato Tp on Pl.plaIdTipoPlato= Tp.tipPlaId
            where facId = ?;";
            $listar = $this -> conexion -> prepare($consultar);
            $listar -> execute(array($facId[0]));
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
            $consultar = "insert into factura values (:facId,:facIdOrden,:facIdCodigoMesero,:facNombreCliente,:facEstado,:facSesion,:facCreated_at,:facUpdated_at);";
            $insertar = $this->conexion->prepare($consultar);
            $insertar -> bindParam("facId",$registro['facId']);
            $insertar -> bindParam("facIdOrden",$registro['facIdOrden']);
            $insertar -> bindParam("facIdCodigoMesero",$registro['facIdCodigoMesero']);
            $insertar -> bindParam("facNombreCliente",$registro['facNombreCliente']);
            $insertar -> bindParam("facEstado",$registro['facEstado']);
            $insertar -> bindParam("facSesion",$registro['facSesion']);
            $insertar -> bindParam("facCreated_at",$registro['facCreated_at']);
            $insertar -> bindParam("facUpdated_at",$registro['facUpdated_at']);
            $insercion = $insertar -> execute();
            $clavePrimaria = $this -> conexion -> lastInsertId();
            return['inserto' => 1, 'resultado' => $clavePrimaria];
            $this -> cierreBd();                
        }  catch (PDOException $pdoExc){
            return['inserto' > 0, $pdoExc -> errorInfo[2]];
         }
    } 
    public function eliminar($facId = array()) {
        $planConsulta = "delete from factura where facId = :facId;";
        $eliminar = $this -> conexion -> prepare($planConsulta);
        $eliminar -> bindParam(':facId', $facId[0], PDO:: PARAM_INT);    
        $resultado = $eliminar->execute();
        $this -> cierreBd();
        if (!empty($resultado)) {
            return ['eliminar' => TRUE, 'registroEliminado' => array($facId[0])];
        } else {
            return ['eliminar' => FALSE, 'registroEliminado' => array($facId[0])];
        }
    }
    public function habilitar($facId = array()) {
        try {
        $cambiarValorTotal = 1;
        if (isset($facId[0])) {
            $actualizar = "update factura set facEstado = ? where facId = ?;";
            $actualizacion = $this-> conexion -> prepare($actualizar);
            $actualizacion = $actualizacion -> execute(array($cambiarValorTotal, $facId[0]));
            return['actualizacion' => $actualizacion, 'mensaje' => "Registro activado"];
            }
        }catch (PDOException $pdoExc) {
            return['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
    }
    public function eliminadorLogico($facId = array()) {
        try {
        $cambiarEstado = 0;
        if (isset($facId[0])) {
            $actualizar = "update factura set facEstado = ? where facId = ?;";
            $actualizacion = $this->conexion->prepare($actualizar);
            $actualizacion = $actualizacion->execute(array($cambiarEstado, $facId[0]));
            return ['actualizacion' => $actualizacion, 'mensaje' => "Registro Desactivado."];
        }
    } catch (PDOException $pdoExc) {
        return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
    }

}
}

?>