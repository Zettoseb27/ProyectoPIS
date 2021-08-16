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
   }
?>