<?php
     
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";

     class tipoDePlatoDAO extends ConBdMySql {
        public function __construct ($servidor, $base, $loginBD, $passwordBD) {
            parent::__construct($servidor, $base, $loginBD, $passwordBD);
        }

        public function seleccionarTodos(){
            $consulta = "select tipPlaId, tipPlaPlato, tipPlaAdicional, tipPlaBebida, tipPlaPostre
            from tipo_plato;";

            $registroTipoPlato = $this-> conexion -> prepare($consulta);
            $registroTipoPlato -> execute();

            $listadoTipoPlato = array();
            while ($registro = $registroTipoPlato -> fetch(PDO::FETCH_OBJ)) {
                $listadoTipoPlato[] = $registro;
            }

            $this->cierreBd();

            return $listadoTipoPlato;
        }

        public function seleccionarId($tipPlaId) {

            $consulta = "select tipPlaId, tipPlaPlato, tipPlaAdicional, tipPlaBebida, tipPlaPostre
            from tipo_plato
            where tipPlaId = ?;";

            $listar = $this->conexion->prepare($consulta);
            $listar -> execute(array($tipPlaId[0]));
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
                $consulta = "insert into tipo_plato values (:tipPlaId,:tipPlaPlato,:tipPlaAdicional,:tipPlaBebida,:tipPlaPostre,:tipPlaEstado,:tipPlaSesion,:tipPlacreated_at,:tipPlaupdated_at);";

                $insertar = $this -> conexion -> prepare($consulta);

                $insertar -> bindParam("tipPlaId", $registro["tipPlaId"]);
                $insertar -> bindParam("tipPlaPlato", $registro["tipPlaPlato"]);
                $insertar -> bindParam("tipPlaAdicional", $registro["tipPlaAdicional"]);
                $insertar -> bindParam("tipPlaBebida", $registro["tipPlaBebida"]);
                $insertar -> bindParam("tipPlaPostre", $registro["tipPlaPostre"]);
                $insertar -> bindParam("tipPlaEstado", $registro["tipPlaEstado"]);
                $insertar -> bindParam("tipPlaSesion", $registro["tipPlaSesion"]);
                $insertar -> bindParam("tipPlacreated_at", $registro["tipPlacreated_at"]);
                $insertar -> bindParam("tipPlaupdated_at", $registro["tipPlaupdated_at"]);

                $insercion = $insertar -> execute();
                $claveprimaria = $this -> conexion-> lastInsertId();

                return ['inserto' => 1, 'resultado' => $claveprimaria];
                $this -> cierreBd();

            } catch (PDOException $pdoExc) {
                return['inserto' > 0, $pdoExc -> errorInfo[2]];
            }
        }

        public function eliminar($tipPlaId = array()) {

            $consulta = "delete from tipo_plato Tp where Tp.tipPlaId = :tipPlaId;";

            $eliminar = $this -> conexion -> prepare($consulta);
            $eliminar -> bindParam(':tipPlaId', $tipPlaId[0], PDO:: PARAM_INT);
            $resultado = $eliminar -> execute();

            $this->cierreBd();

            if (!empty($resultado)) {
                return ['eliminar' => TRUE, 'registroEliminado' => array($tipPlaId[0])];
            } else {
                return ['eliminar' => FALSE, 'registroEliminado' => array($tipPlaId[0])];
            }
        }
        public function habilitar($tipPlaId = array()) {

            try {

                $cambiarValorTotal = 1;
    
                if (isset($tipPlaId[0])) {
    
                    $actualizar = "update tipo_plato set tipPlaEstado = ? where tipPlaId = ?;";
                    $actualizacion = $this-> conexion -> prepare($actualizar);
                    $actualizacion = $actualizacion -> execute(array($cambiarValorTotal, $tipPlaId[0]));
                    return['actualizacion' => $actualizacion, 'mensaje' => "Registro activado"];
                    }
    
                }catch (PDOException $pdoExc) {
                    return['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
                }
        }
        public function eliminadorLogico($tipPlaId = array()) {

            try {

                $cambiarEstado = 0;
                if (isset($tipPlaId[0])) {
                    $actualizar = "update tipo_plato set tipPlaAdicional = ? where tipPlaId = ?;";
                    $actualizacion = $this->conexion->prepare($actualizar);
                    $actualizacion = $actualizacion->execute(array($cambiarEstado, $tipPlaId[0]));
                    return ['actualizacion' => $actualizacion, 'mensaje' => "Registro Desactivado."];
                }
            } catch (PDOException $pdoExc) {
                return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
            }

        } 
        
     }

?>