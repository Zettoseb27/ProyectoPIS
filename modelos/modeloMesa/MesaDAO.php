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
            $registroEncontrado = $this -> conexion -> prepare($consultar);
            $registroEncontrado -> execute();
            $listadoRegistroMesa = array();
            while ($registro = $registroEncontrado -> fetch(PDO::FETCH_OBJ)) {
               $listadoRegistroMesa[] = $registro;
            }
            $this->cierreBd();
            return $listadoRegistroMesa;
         }

         public function seleccionarId($mesId) {
            $consultar = "SELECT * FROM mesa WHERE mesId = ?;";
            
            $listar = $this-> conexion -> prepare($consultar);
            $listar -> execute(array($mesId[0]));
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
     public function actualizar($registro) {
        try {
        $NumeroMesa = $registro[0]['mesNumeroMesa'];
        $Comensales = $registro[0]['mesCantidadComensales'];
        $Id = $registro[0]['mesId'];
        if (isset($Id)) {
            $actualizar = "UPDATE mesa SET mesNumeroMesa = ? ,";
            $actualizar.= "mesCantidadComensales = ? ";
            $actualizar.= "where mesId= ?;";
            $actualizacion = $this->conexion->prepare($actualizar);
            $resultadoAct=$actualizacion->execute(array($NumeroMesa,$Comensales,$Id));
            $this->cierreBd();
						
            //MEJORAR LA SALIDA DE LOS DATOS DE ACTUALIZACIÓN EXITOSA
            return ['actualizacion' => $resultadoAct, 'mensaje' => "Actualización realizada."];	
        }
            } catch (PDOException $pdoExc) {
                $this->cierreBd();
                return ['actualizacion' => $resultadoAct, 'mensaje' => $pdoExc];
            }
    }
     public function insertar($registro) {
     
      try {
         $consultar = "insert into mesa (mesId,mesNumeroMesa,mesCantidadComensales) values (:mesId, :mesNumeroMesa, :mesCantidadComensales);";

         $insertar = $this -> conexion -> prepare($consultar);

         $insertar -> bindParam("mesId", $registro["mesId"]);        
         $insertar -> bindParam("mesNumeroMesa", $registro["mesNumeroMesa"]);
         $insertar -> bindParam("mesCantidadComensales", $registro["mesCantidadComensales"]);
         $insercion = $insertar -> execute();
         $clavePrimaria = $this -> conexion -> lastInsertId();
         return ['inserto' => $insercion, 'resultado' => $clavePrimaria];
         $this -> cierreBd();
      } catch (PDOException $pdoExc) {
         return['inserto' => $insercion, $pdoExc -> errorInfo[2]];
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