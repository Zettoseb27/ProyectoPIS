<?php
     
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";

     class OrdenDAO extends ConBdMySql {
        public function __construct ($servidor, $base, $loginBD, $passwordBD) {
            parent::__construct($servidor, $base, $loginBD, $passwordBD);
        }

        public function seleccionarTodos(){
            $planConsulta = "select  O.ordId,O.ordvalorTotal,Mn.menId,Mn.menObservacion,Ms.mesNumeroMesa,pl.plaDescripcion,
            Tp.tipPlaAdicional,Tp.tipPlaBebida,Tp.tipPlaPostre,Tp.tipPlaPlato from orden O
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
 /* ------------------------------------------------------------------------------------------------------------------- */
        public function seleccionarId($sId) {

            $planConsulta = " SELECT * FROM orden O ";
            $planConsulta .= " WHERE O.ordId =  ? ;";

            $listar = $this->conexion->prepare($planConsulta);

            $listar->execute(array($sId[0]));

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


        

         public function insertar($registro) {

            try {
                //code...
            } catch (PDOException $pdoExc) {
                return['inserto' > 0, $pdoExc -> errorInfo[2]];
            }

        }

          public function actualizar($ordDescripcion) {

        }
        public function eliminar($ordId = array()) {

        }
        public function habilitar($ordId = array()) {

        }
        public function eliminadorLogico($ordId = array()) {

        }  

     } 
     


?>