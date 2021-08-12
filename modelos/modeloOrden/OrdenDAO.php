<?php
     
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";

     class OrdenDAO extends ConBdMySql {
        public function __construct ($servidor, $base, $loginBD, $passwordBD) {
            parent::__construct($servidor, $base, $loginBD, $passwordBD);
        }

        public function seleccionarTodos(){
            $planConsulta = "select  O.ordId,O.ordvalorTotal,Mn.menId,Mn.menObservacion,Ms.mesNumeroMesa,pl.plaDescripcion,
            Tp.tipPlaAdicional,Tp.tipPlaBebida,Tp.tipPlaPostre from orden O
            join menu Mn on O.ordIdMenu= menId 
            join plato Pl on O.ordIdMenu=plaId
            join tipo_plato Tp on ordIdMenu=tipPlaId
            join mesa Ms on O.ordIdMesa=Ms.mesId;";

            $registrosOrden = $this -> conexion -> prepare ($planConsulta);
            $registrosOrden -> execute();//ejecucion de la consulta

            $listadoRegistroOrden = array();

            while($registro=$registrosOrden -> fetch(PDO::FETCH_OBJ)){
                $listadoRegistroOrden[] = $registro;

            }

                $this->cierreBd();

                return $listadoRegistroOrden;
            
        }
        /* public function seleccionarId($ordId ) {

        }
        public function insertar($ordDescripcion) {

        }
        public function actualizar($ordDescripcion) {

        }
        public function eliminar($ordId = array()) {

        }
        public function habilitar($ordId = array()) {

        }
        public function eliminadorLogico($ordId = array()) {

        } */
     } 
     


?>