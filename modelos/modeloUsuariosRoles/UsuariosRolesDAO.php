<?php
     
    include_once "../../modelos/ConstantesConexion.php";
    include_once PATH."modelos/ConBdMysql.php";

    class UsuariosRolesDAO extends ConBdMysql {

        public function __construct($servidor, $base, $loginBD, $passwordBD) {
            parent:: __construct($servidor, $base, $loginBD, $passwordBD);
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

        public function insertar($registro){

            try {
                $consulta = "insert into usuario_s_roles values (:id_usuario_s, :id_rol, :fechaUserRol, :estado, :usuRolUsuSesion, :created_at, :update_at);";

                $insertar = $this -> conexion -> prepare($consulta);

                $insertar -> bindParam("id_usuario_s" ,$registro['id_usuario_s']);
                $insertar -> bindParam("id_rol" ,$registro['id_rol']);
                $insertar -> bindParam("fechaUserRol" ,$registro['fechaUserRol']);
                $insertar -> bindParam("estado" ,$registro['estado']);
                $insertar -> bindParam("usuRolUsuSesion" ,$registro['usuRolUsuSesion']);
                $insertar -> bindParam("created_at" ,$registro['created_at']);
                $insertar -> bindParam("update_at" ,$registro['update_at']);

                $insercion = $insertar -> execute();
                $clavePrimaria = $this-> conexion -> lastInsertId();

                return ['inserto' => 1, 'resultado' => $clavePrimaria];
                $this -> cierreBd();

            } catch (PDOThrowable $pdoExc) {
                return['inserto' > 0, $pdoExc -> errorInfo[2]];
            } 
        } 
        
        public function eliminar($id_usuario_s = array()) {
            $planConsulta = "delete from usuario_s_roles  where id_usuario_s = :id_usuario_s;";

            $eliminar = $this->conexion -> prepare($planConsulta);
            $eliminar -> bindParam(':id_usuario_s', $id_usuario_s[0], PDO:: PARAM_INT);
            $resultado = $eliminar -> execute();

            $this->cierreBd();

            if (!empty($resultado)) {
                return ['eliminar' => TRUE, 'registroEliminado' => array($id_usuario_s[0])];
            } else {
                return ['eliminar' => FALSE, 'registroEliminado' => array($id_usuario_s[0])];
            }
        }    

        public function habilitar($id_usuario_s = array()) {
            
            try {
                $cambiarValorRolSesion = 1;

                if (isset($id_usuario_s[0])) {

                    $actualizar = "update usuario_s_roles set usuRolUsuSesion = ? where id_usuario_s = ?;";
                    $actualizacion = $this-> conexion -> prepare($actualizar);
                    $actualizacion = $actualizacion -> execute(array($cambiarValorRolSesion, $id_usuario_s[0]));
                    return ['actualizacion' => $actualizacion, 'mensaje' => "Registro activado"];
                    }

            } catch (PDOException $pdoExc) {
                return['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
            }
        }
        public function eliminadorLogico($usuario_s = array()) {
            try {
                $cambiarEstado = 0;
                if (isset($usuario_s[0])) {
                    $actualizar = "update usuario_s_roles set usuRolUsuSesion = ? where id_usuario_s = ?;";
                    $actualizacion = $this-> conexion -> prepare($actualizar);
                    $actualizacion = $actualizacion-> execute(array($cambiarEstado, $usuario_s[0]));
                    return ['actualizacion' => $actualizacion, 'mensaje' => "Registro Desactivado."];
                }
            } catch (PDOExeption $pdoExc) {
                return['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
            }
        }
    }
?>