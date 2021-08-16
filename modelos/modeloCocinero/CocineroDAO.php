<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH.'modelos/ConBdMysql.php'; 
     class CocineroDAO extends ConBdMysql {
        public function __construct ($servidor, $base, $loginBD, $passwordBD) {
            parent::__construct($servidor, $base, $loginBD, $passwordBD);
        }
        public function seleccionarTodos() {
            $consulta = "select cocId, cocIdCodigoCocinero, cocCreated_at
            from cocinero ;";
            $registroCocinero = $this->conexion->prepare($consulta);
            $registroCocinero -> execute();
            $listadoRegistroCocinero =array();
            while ($registro = $registroCocinero->fetch(PDO::FETCH_OBJ)) {
                $listadoRegistroCocinero[] = $registro;
            }
            $this->cierreBd();
                return $listadoRegistroCocinero;
        
        }
        public function insertar($registro) {
            try {
                $consulta = "insert into cocinero values (:cocId, :cocIdCocinero, :cocCodigoCocinero, :cocEstado, :cocSesion, :cocCreated_at, :cocUpdated_at);";
                $insertar = $this -> conexion -> prepare($consulta);
                $insertar -> bindParam("cocId",$registro['cocId']);
                $insertar -> bindParam("cocIdCocinero",$registro['cocIdCocinero']);
                $insertar -> bindParam("cocCodigoCocinero",$registro['cocCodigoCocinero']);
                $insertar -> bindParam("cocEstado",$registro['cocEstado']);
                $insertar -> bindParam("cocSesion",$registro['cocSesion']);
                $insertar -> bindParam("cocCreated_at",$registro['cocCreated_at']);
                $insertar -> bindParam("cocUpdated_at",$registro['cocUpdated_at']);
                $insercion = $insertar -> execute();
                $clavePrimaria = $this->conexion ->lastInsertId();
                return['inserto' => 1, 'resultado' => $clavePrimaria];
                $this -> cierreBd();
            } catch (PDOException $pdoExc) {
                return['inserto' > 0, $pdoExc -> errorInfo[2]];
            }
        }
         
     }
     
?>