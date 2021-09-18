<?php
    //include_once '../../modelos/ConstantesConexion.php';
    include_once PATH.'modelos/ConBdMysql.php';
    class CocinaDAO extends ConBdMysql {
        public function __construct ($servidor, $base, $loginBD, $passwordBD) {
            parent::__construct($servidor, $base, $loginBD, $passwordBD);
        }
        public function seleccionarTodos() {
            $consultar = "select Co.cociId, Co.cociEstado, Co.cociIdOrden, Mn.menObservacion,
            Tp.tipPlaPlato,Tp.tipPlaPostre,Tp.tipPlaBebida, tipPlaAdicional
            from cocina Co
            join menu Mn on Co.cociIdOrden= menId
            join tipo_plato Tp on Co.cociIdOrden = tipPlaId
            join plato Pl on Co.cociIdOrden = plaId;";
            $registroCocina = $this -> conexion -> prepare($consultar);
            $registroCocina -> execute();
            $listadoRegistroCocina = array();
            while ($registro = $registroCocina -> fetch(PDO::FETCH_OBJ)) {
                $listadoRegistroCocina[] = $registro;
            }
            $this->cierreBd();
            return $listadoRegistroCocina;
        }
        public function insertar($registro) {
            try {
                $consultar = "insert into cocina values (:cociId, :cociIdCocinero, :cociIdOrden, :cociIdEstado, :cociSesion, :cociCreated_at, :cociUpdated_at);";
                $insertar = $this -> conexion -> prepare($consultar);
                $insertar -> bindParam("cociId", $registro['cociId']);
                $insertar -> bindParam("cociIdCocinero", $registro['cociIdCocinero']);
                $insertar -> bindParam("cociIdOrden", $registro['cociIdOrden']);
                $insertar -> bindParam("cociIdEstado", $registro['cociIdEstado']);
                $insertar -> bindParam("cociSesion", $registro['cociSesion']);
                $insertar -> bindParam("cociCreated_at", $registro['cociCreated_at']);
                $insertar -> bindParam("cociUpdated_at", $registro['cociUpdated_at']);
                $insercion = $insertar -> execute();
                $clavePrimaria = $this -> conexion -> lastInsertId();
                return ['inserto' => 1, 'resultado' => $clavePrimaria];
                $this -> cierreBd();
            } catch (PDOException $pdoExc) {
                return['inserto' > 0, $pdoExc -> errorInfo[2]];
            }
        }
        public function SeleccionarId($cociId) {
            $consultar = "select Co.cociId, Co.cociEstado, Co.cociIdOrden, Mn.menObservacion, Tp.tipPlaPlato, Pl.plaPrecio, Tp.tipPlaPostre,Tp.tipPlaBebida, tipPlaAdicional
            from cocina Co
            join menu Mn on Co.cociIdOrden= menId
            join tipo_plato Tp on Co.cociIdOrden = tipPlaId
            join plato Pl on Co.cociIdOrden = plaId
            where Co.cociId = ?;";
            $listar = $this -> conexion -> prepare($consultar);
            $listar -> execute(array($cociId[0]));
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
        public function eliminar($cociId = array()) {

            $planConsulta = "delete from cocina where cociId = :cociId;";

            $eliminar = $this -> conexion -> prepare($planConsulta);
            $eliminar -> bindParam(':cociId', $cociId[0], PDO:: PARAM_INT);    
            $resultado = $eliminar->execute();

            $this -> cierreBd();

            if (!empty($resultado)) {
                return ['eliminar' => TRUE, 'registroEliminado' => array($cociId[0])];
            } else {
                return ['eliminar' => FALSE, 'registroEliminado' => array($cociId[0])];
            }

        }
        public function habilitar($cociId = array()) {


            try {

            $cambiarValorTotal = 1;

            if (isset($cociId[0])) {

                $actualizar = "update cocina set cociEstado = ? where cociId = ?;";
                $actualizacion = $this-> conexion -> prepare($actualizar);
                $actualizacion = $actualizacion -> execute(array($cambiarValorTotal, $cociId[0]));
                return['actualizacion' => $actualizacion, 'mensaje' => "Registro activado"];
                }

            }catch (PDOException $pdoExc) {
                return['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
            }
        }

        public function eliminadorLogico($cociId = array()) {

            try {

            $cambiarEstado = 0;
            if (isset($cociId[0])) {
                $actualizar = "update cocina set cociEstado = ? where cociId = ?;";
                $actualizacion = $this->conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($cambiarEstado, $cociId[0]));
                return ['actualizacion' => $actualizacion, 'mensaje' => "Registro Desactivado."];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }

    }
    }
     
?>