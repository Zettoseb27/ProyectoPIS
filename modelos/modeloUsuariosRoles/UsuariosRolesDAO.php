<?php
     
    include_once "../../modelos/ConstantesConexion.php";
    include_once PATH."modelos/ConBdMysql.php";

    class UruariosRolesDAO extends ConBdMysql {

        public function __construct($servidor, $base, $loginBD, $passwordBD) {
            parent::__construct($servidor, $base, $loginBD, $passwordBD);
        }

        public function seleccionarTodos(){
            $planConsulta = "select Ur.fechaUserRol,Rl.rolNombre,Rl.rolDescripcion,Us.usuLogin
            from usuario_s_roles Ur
            join usuario_s Us on Ur.id_usuario_s = usuId
            join rol Rl on Ur.id_rol= rolId;";

            $registroUsuariosRoles = $this-> conexion -> prepare ($planConsulta);
            $registroUsuariosRoles -> execute();

            $listadoRegistroUsuariosOrden = array();

            while ($registro=$registroUsuariosRoles -> fetch(PDO:: FETCH_OBJ)) {
                $listadoRegistroUsuariosOrden[] = $registro;
            }

            $this->cierreBd();

            return $listadoRegistroUsuariosOrden;

        }

        public function seleccionarId($id_usuario_s) {

            $planConsulta = "select * from usuario_s_roles Ur
            where Ur.id_usuario_s = ?;";

            $listar = $this -> conexion -> prepare($planConsulta);
            $listar -> execute(array($id_usuario_s[0]));

            $registroEncontrado = array();

            while ($registro = $listar -> fetch(PDO:: FETCH_OBJ)) {
                $registroEncontrado[] = $registro;
            }
            $this -> cierreBd();

            if (!empty($registroEncontrado)) {
                return ['exitoSeleccionId' => true, 'registroEncontrado' => $registroEncontrado];
            } else {
                return ['exitoSeleccionId' => false, 'registroEncontrado' => $registroEncontrado];
            }
        }
    }

?>