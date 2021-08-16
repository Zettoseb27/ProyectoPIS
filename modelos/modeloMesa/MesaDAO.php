<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH.'modelos/ConBdMysql.php';  

     class MesaDAO extends ConBdMysql {
         public function __construct($servidor, $base, $loginBD, $passwordBD) {
            parent::__construct($servidor, $base, $loginBD, $passwordBD);
         }

         public function seleccionarTodos() {

            $consultar = "select mesId, mesNumeroMesa, mesCantidadComensales, mesCreated_at
            from mesa ;";

            $registroMesa = $this -> conexion -> prepare($consultar);
            $registroMesa -> execute();

            $listadoRegistroMesa = array();

            while ($registro = $registroMesa -> fetch(PDO::FETCH_OBJ)) {
               $listadoRegistroMesa[] = $registro;
            }
            $this->cierreBd();

            return $listadoRegistroMesa;
         }

         public function seleccionarId($mesId) {
            $consultar = "select mesId, mesNumeroMesa, mesCantidadComensales, mesCreated_at
            from mesa where mesId = ?;";
            
            $listar = $this-> conexion -> prepare($consultar);
            $listar -> execute(array($mesId[0]));
            $registroMesa = array();

            while ($registro = $listar -> fetch(PDO::FETCH_OBJ)) {
               $registroMesa[] = $registro;
            }
            $this->cierreBd();

            if (!empty($registroMesa)) {
               return ['exitoSeleccionId' => true, 'registroME$registroMesa' => $registroMesa];
           } else {
               return ['exitoSeleccionId' => false, 'registroME$registroMesa' => $registroMesa];
           }
     }
     public function insertar($registro) {
     
      try {
         $consultar = "insert into mesa values (:mesId, :mesNumeroMesa, :mesCantidadComensales, :mesEstado, :mesSesion, :mesCreated_at, :mesUpdated_at);";

         $insertar = $this -> conexion -> prepare($consultar);

         $insertar -> bindParam("mesId", $registro["mesId"]);        
         $insertar -> bindParam("mesNumeroMesa", $registro["mesNumeroMesa"]);
         $insertar -> bindParam("mesCantidadComensales", $registro["mesCantidadComensales"]);
         $insertar -> bindParam("mesEstado", $registro["mesEstado"]);
         $insertar -> bindParam("mesSesion", $registro["mesSesion"]);
         $insertar -> bindParam("mesCreated_at", $registro["mesCreated_at"]);
         $insertar -> bindParam("mesUpdated_at", $registro["mesUpdated_at"]);

         $insercion = $insertar -> execute();
         $clavePrimaria = $this -> conexion -> lastInsertId();

         return ['inserto' => 1, 'resultado' => $clavePrimaria];
         $this -> cierreBd();
      } catch (PDOException $pdoExc) {
         return['inserto' > 0, $pdoExc -> errorInfo[2]];
      }
     }
     public function eliminar($mesId = array()) {

      $consultar = "delete from mesa where mesId = :mesId;";

      $eliminar = $this -> conexion -> prepare($consultar);
      $eliminar -> bindParam(':mesId', $mesId[0], PDO:: PARAM_INT);
      $resultado = $eliminar -> execute();

      $this -> cierreBd();

      if (!empty($resultado)) {
          return ['eliminar' => TRUE, 'registroEliminado' => array($mesId[0])];
      } else {
          return ['eliminar' => FALSE, 'registroEliminado' => array($mesId[0])];
      }
   }
        public function habilitar($mesId = array()) {


            try {

            $cambiarValorTotal = 1;

            if (isset($mesId[0])) {

                $actualizar = "update mesa set mesEstado = ? where mesId = ?;";
                $actualizacion = $this-> conexion -> prepare($actualizar);
                $actualizacion = $actualizacion -> execute(array($cambiarValorTotal, $mesId[0]));
                return['actualizacion' => $actualizacion, 'mensaje' => "Registro activado"];
                }

            }catch (PDOException $pdoExc) {
                return['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
            }
     }
     public function eliminadorLogico($mesId = array()) {

      try {

      $cambiarEstado = 0;
      if (isset($mesId[0])) {
          $actualizar = "update mesa set mesNumeroMesa = ? where mesId = ?;";
          $actualizacion = $this->conexion->prepare($actualizar);
          $actualizacion = $actualizacion->execute(array($cambiarEstado, $mesId[0]));
          return ['actualizacion' => $actualizacion, 'mensaje' => "Registro Desactivado."];
      }
  } catch (PDOException $pdoExc) {
      return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
  }

}   
   }
?>