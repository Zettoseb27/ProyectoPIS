<?php

    include_once "../../modelos/ConstantesConexion.php";
    include_once PATH."modelos/ConBdMysql.php";

     class Usuario_sDAO extends ConBdMySql {

        public function __construct ($servidor, $base, $loginBD, $passwordBD) {
            parent::__construct($servidor, $base, $loginBD, $passwordBD);
        }

       public function seleccionarTodos (){
           $planConsulta = "select usuId, usuLogin, usu_created_at
           from usuario_s;";
           $registroUsuario_s = $this -> conexion -> prepare ($planConsulta);
           $registroUsuario_s -> execute();
           $listadoRegistroUsuario_s = array();
           while($registro=$registroUsuario_s -> fetch(PDO::FETCH_OBJ)){
               $listadoRegistroUsuario_s[] = $registro;
           }
               $this->cierreBd();
               return $listadoRegistroUsuario_s;
       }
       public function seleccionarId($usuId) {
            $consultar = "select usuId, usuLogin, usu_created_at
            from usuario_s
            where usuId = ?;";
            $listar = $this -> conexion -> prepare($consultar);
            $listar -> execute(array($usuId[0]));
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
                $consultar = "insert into usuario_s values (:usuId, :usuLogin, :usuPassword, :usuUsuSesion, :usuEstado, :usuRemember_token, :usu_created_at, :usu_updated_at);";
                $insertar = $this -> conexion -> prepare($consultar);
                $insertar -> bindParam("usuId", $registro['usuId']);
                $insertar -> bindParam("usuLogin", $registro['usuLogin']);
                $insertar -> bindParam("usuPassword", $registro['usuPassword']);
                $insertar -> bindParam("usuUsuSesion", $registro['usuUsuSesion']);
                $insertar -> bindParam("usuEstado", $registro['usuEstado']);
                $insertar -> bindParam("usuRemember_token", $registro['usuRemember_token']);
                $insertar -> bindParam("usu_created_at", $registro['usu_created_at']);
                $insertar -> bindParam("usu_updated_at", $registro['usu_updated_at']);
                $insercion = $insertar -> execute();
                $clavePrimaria = $this -> conexion -> lastInsertId();
                return ['inserto' => 1, 'resultado' => $clavePrimaria];
                $this -> cierreBd();
            } catch (PDOException $pdoExc) {
                return['inserto' > 0, $pdoExc -> errorInfo[2]];
            }
       }
       public function eliminar($usuId = array()) {

        $planConsulta = "delete from usuario_s where usuId = :usuId;";

        $eliminar = $this -> conexion -> prepare($planConsulta);
        $eliminar -> bindParam(':usuId', $usuId[0], PDO:: PARAM_INT);    
        $resultado = $eliminar->execute();

        $this -> cierreBd();

        if (!empty($resultado)) {
            return ['eliminar' => TRUE, 'registroEliminado' => array($usuId[0])];
        } else {
            return ['eliminar' => FALSE, 'registroEliminado' => array($usuId[0])];
        }

    }
    public function habilitar($usuId = array()) {


        try {

        $cambiarValorTotal = 1;

        if (isset($usuId[0])) {

            $actualizar = "update usuario_s set usuEstado = ? where usuId = ?;";
            $actualizacion = $this-> conexion -> prepare($actualizar);
            $actualizacion = $actualizacion -> execute(array($cambiarValorTotal, $usuId[0]));
            return['actualizacion' => $actualizacion, 'mensaje' => "Registro activado"];
            }

        }catch (PDOException $pdoExc) {
            return['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
    }

    public function eliminadorLogico($usuId = array()) {

        try {

        $cambiarEstado = 0;
        if (isset($usuId[0])) {
            $actualizar = "update usuario_s set usuEstado = ? where usuId = ?;";
            $actualizacion = $this->conexion->prepare($actualizar);
            $actualizacion = $actualizacion->execute(array($cambiarEstado, $usuId[0]));
            return ['actualizacion' => $actualizacion, 'mensaje' => "Registro Desactivado."];
        }
    } catch (PDOException $pdoExc) {
        return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
    }

}
    }
    