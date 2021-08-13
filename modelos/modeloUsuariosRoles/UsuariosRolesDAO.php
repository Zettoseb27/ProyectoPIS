<?php
     
    include_once "../../modelos/ConstantesConexion.php";
    include_once PATH."modelos/ConBdMysql.php";

    class UruariosRoles extends ConBdMysql {

        public function __construct($servidor, $base, $loginBD, $passwordBD) {
            parent::__construct($servidor, $base, $loginBD, $passwordBD);
        }

        public function seleccionarTodos(){
            $panConsulta = "select Ur.fechaUserRol,Rl.rolNombre,Rl.rolDescripcion,Us.usuLogin
            from usuario_s_roles Ur
            join usuario_s Us on Ur.id_usuario_s = usuId
            join rol Rl on Ur.id_rol= rolId;";

            $registroUsuariosRoles = $this-> conexion -> prepare ($panConsulta);
            $registroUsuariosRoles -> execute();

            $listadoRegistroUsuariosOrden = array();

            while ($registro=$registroUsuariosRoles -> fetch(PDO:: FETCH_OBJ)) {
                $listadoRegistroUsuariosOrden[] = $registro;
            }

            $this->cierreBd();

            return $listadoRegistroUsuariosOrden;

        }
    }

?>