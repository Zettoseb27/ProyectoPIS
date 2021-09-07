<?php
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";

     class OrdenDAO extends ConBdMySql {
        public function __construct ($servidor, $base, $loginBD, $passwordBD) {
            parent::__construct($servidor, $base, $loginBD, $passwordBD);
        }

        public function seleccionarTodos(){ // Método: seleccionarTodos(), 
            $planConsulta = "select  O.ordId,O.ordvalorTotal,
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

            $planConsulta = " SELECT * FROM orden O ";
            $planConsulta .= " WHERE O.ordId =  ? ;";

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
                $consulta = "insert into orden values (:ordId, :ordIdMenu, :ordIdMesa, :ordvalorTotal, :ordEstado, :ordSesion, :ordCreated_at, :ordUpdate_at);";

                $insertar = $this -> conexion -> prepare($consulta);

                $insertar -> bindParam("ordId", $registro['ordId']);
                $insertar -> bindParam("ordIdMenu", $registro['ordIdMenu']);
                $insertar -> bindParam("ordIdMesa", $registro['ordIdMesa']);
                $insertar -> bindParam("ordvalorTotal", $registro['ordvalorTotal']);
                $insertar -> bindParam("ordEstado", $registro['ordEstado']);
                $insertar -> bindParam("ordSesion", $registro['ordSesion']);
                $insertar -> bindParam("ordCreated_at", $registro['ordCreated_at']);
                $insertar -> bindParam("ordUpdate_at", $registro['ordUpdate_at']);

                $insercion = $insertar -> execute();
                $clavePrimaria = $this -> conexion -> lastInsertId();

                return ['inserto' => 1, 'resultado' => $clavePrimaria];
                $this -> cierreBd();
            } catch (PDOException $pdoExc) {
                return['inserto' > 0, $pdoExc -> errorInfo[2]];
            }

        }

        public function eliminar($ordId = array()) {

            $planConsulta = "delete from orden where ordId = :ordId;";

            $eliminar = $this -> conexion -> prepare($planConsulta);
            $eliminar -> bindParam(':ordId', $ordId[0], PDO:: PARAM_INT);    
            $resultado = $eliminar->execute();

            $this -> cierreBd();

            if (!empty($resultado)) {
                return ['eliminar' => TRUE, 'registroEliminado' => array($ordId[0])];
            } else {
                return ['eliminar' => FALSE, 'registroEliminado' => array($ordId[0])];
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