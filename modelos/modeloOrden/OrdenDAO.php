<?php
     //include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";

     class OrdenDAO extends ConBdMySql {
        public function __construct ($servidor, $base, $loginBD, $passwordBD) {
            parent::__construct($servidor, $base, $loginBD, $passwordBD);
        }

        public function seleccionarTodos(){ // Método: seleccionarTodos(), 
            $planConsulta = "SELECT  O.ordId,O.ordvalorTotal,
            Ms.mesCantidadComensales,Ms.mesNumeroMesa,
            Mn.menObservacion,
            Pl.plaDescripcion,
            Tp.tipPlaAdicional,Tp.tipPlaBebida,Tp.tipPlaPostre, Tp.tipPlaPlato 
                FROM orden O
                inner join mesa Ms on O.ordIdMesa = Ms.mesId 
                inner join menu Mn on O.ordIdMenu = Mn.menId 
                inner join plato Pl on Mn.menIdPlato = Pl.plaId 
                inner join tipo_plato Tp on Pl.plaIdTipoPlato= Tp.tipPlaId;";
            $registrosOrden = $this -> conexion -> prepare ($planConsulta);
            $registrosOrden -> execute();//ejecucion de la consulta
            $listadoRegistroOrden = array();
            while($registro=$registrosOrden -> fetch(PDO::FETCH_OBJ)){
                $listadoRegistroOrden[] = $registro;
            }
                $this->cierreBd();
                return $listadoRegistroOrden;
        }

        public function seleccionarId($ordId) { // Método: seleccionarId($ordId),  
            $planConsulta = " SELECT * FROM orden  ";
            $planConsulta .= " WHERE ordId =  ? ;";
            $listar = $this->conexion->prepare($planConsulta);
            $listar->execute(array($ordId[0]));
            $registroEncontrado = array();
            while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
                $registroEncontrado[] = $registro;
            }
            $this->cierreBd();
            if (!empty($registroEncontrado)) {
                return ['exitoSeleccionId' => true, 'registroEncontrado' => $registroEncontrado];
            } else {
                return ['exitoSeleccionId' => false, 'registroEncontrado' => $registroEncontrado];
            }
        }

         public function insertar($registro) { // Método: insertar($registro), 
            try {
                $consulta = "INSERT INTO orden (ordId,ordvalorTotal,ordIdMenu,ordIdMesa) VALUES (:ordId,:ordvalorTotal,:ordIdMenu,:ordIdMesa);";
                $insertar = $this -> conexion -> prepare($consulta);
                $insertar -> bindParam("ordId", $registro['ordId']);
                $insertar -> bindParam("ordvalorTotal", $registro['ordvalorTotal']);
                $insertar -> bindParam("ordIdMenu", $registro['ordIdMenu']);
                $insertar -> bindParam("ordIdMesa", $registro['ordIdMesa']);
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
                $Mesa = $registro[0]['ordIdMesa'];
                $ValorTotal = $registro[0]['ordValorTotal'];
                $Id = $registro[0]['ordId'];
                if (isset($Id)) {
                    $actualizar  = "UPDATE orden SET ordIdMesa = ?,";
                    $actualizar.= "ordValorTotal = ?";
                    $actualizar.= "WHERE ordId = ?;";
                    $actualizacion = $this->conexion->prepare($actualizar);
                    $resultadoAct = $actualizacion->execute(array($Mesa,$ValorTotal,$Id));
                    $this->cierreBd();
                    //MEJORAR LA SALIDA DE LOS DATOS DE ACTUALIZACIÓN EXITOSA
                    return ['actualizacion' => $resultadoAct, 'mensaje' => "Actualización realizada."];
                }
            } catch (PDOException $pdoExc) {
                $this->cierreBd();
                return ['actualizacion' => $resultadoAct, 'mensaje' => $pdoExc];
            }	
        }
        public function eliminar($Id = array()) {
            $planConsulta = "SET FOREIGN_KEY_CHECKS=0; DELETE FROM orden ";
            $planConsulta.= "WHERE ordId = :ordId;";
            $eliminar = $this -> conexion -> prepare($planConsulta);
            $eliminar -> bindParam(':ordId', $Id[0], PDO::PARAM_INT);    
            $resultado = $eliminar->execute();
            $this -> cierreBd();
            if (!empty($resultado)) {
                return ['eliminar' => TRUE, 'registroEliminado' => array($Id[0])];
            } else {
                return ['eliminar' => FALSE, 'registroEliminado' => array($Id[0])];
            }
        }
        public function habilitar($ordId = array()) {
            try {
            $cambiarValorTotal = 1;
            if (isset($ordId[0])) {
                $actualizar = "update orden set ordvalorTotal = ? where ordId = ?;";
                $actualizacion = $this-> conexion -> prepare($actualizar);
                $actualizacion = $actualizacion -> execute(array($cambiarValorTotal, $ordId[0]));
                return['actualizacion' => $actualizacion, 'mensaje' => "Registro activado"];
                }
            }catch (PDOException $pdoExc) {
                return['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
            }
        }
        public function eliminadorLogico($ordId = array()) {
            try {
            $cambiarEstado = 0;
            if (isset($ordId[0])) {
                $actualizar = "update orden set ordvalorTotal = ? where ordId = ?;";
                $actualizacion = $this->conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($cambiarEstado, $ordId[0]));
                return ['actualizacion' => $actualizacion, 'mensaje' => "Registro Desactivado."];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }

    }
}
      
?>