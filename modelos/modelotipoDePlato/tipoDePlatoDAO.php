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
        public function insertar($plaDescripcion) {

        }
        public function actualizar($plaDescripcion) {

        }
        public function eliminar($plaId = array()) {

        }
        public function habilitar($plaId = array()) {

        }
        public function eliminadorLogico($plaId = array()) {

        } 
        
     }

?>