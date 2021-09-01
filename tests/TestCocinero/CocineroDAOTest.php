<?php
      // ---------------------------- VARIABLE DE CONEXION  ----------------------------------
        
        define("BASE","proyecto");//se define una constante para la base, de ahora en adelante BASE
        //define("SERVIDOR", "127.0.0.1"); //se define una constante para el servidor, de ahora en adelante SERVIDOR
        define("SERVIDOR", "localhost");//se define una constante para el servidor, de ahora en adelante SERVIDOR
        define("USUARIO_BD", "root"); //se define una constante para el usuario de la base, de ahora en adelante USUARIO_BD
        define("CONTRASEÑA_BD", "123456"); //se define una constante para la contraseña,de ahora en adelante CONTRASENIA_BD
        define("PATH", $_SERVER['DOCUMENT_ROOT']."/"."ProyectoPIS"."/");
        abstract class ConBdMySql {
            private $servidor;
            private $base;
            protected $conexion;
            public function __construct($servidor, $base, $loginBD, $passwordBD) {
                $this->servidor = $servidor;
                $this->base = $base;
                try {
                    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\'');
                    $dsn = "mysql:dbname=" . $this->base . ";host=" . $this->servidor;
                    $this->conexion = new PDO($dsn, $loginBD, $passwordBD, $options);
                    echo "Conexión a base de datos ok";
                } catch (Exception $ex) {
                    echo "Error de Conexión" . $ex->getMessage();
                }
            }
                public function cierreBd() {
                    $this -> conexion= NULL;
                }
        }
        class CocineroDAO extends ConBdMySql {
            public function __construct ($servidor, $base, $loginBD, $passwordBD) {
                parent::__construct($servidor, $base, $loginBD, $passwordBD);
            }
            public function seleccionarTodos(){
               $planConsulta = "select cocId, cocIdCocinero, cocIdCodigoCocinero, cocCreated_at
               from cocinero;";
            
             
               }
                  
           }
           
           public function seleccionarId($cocId) {
                $consultar = "select cocId, cocIdCocinero, cocIdCodigoCocinero, cocCreated_at
                from cocinero where cocIdId = ?;";
                $listar = $this -> conexion -> prepare($consultar);
                $listar -> execute(array($cocId[0]));
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
                    $consultar = "insert into rol values (:cocId, :cocIdCocinero, :cocIdCodigoCocinero, :cocEstado, :cocSesion, :cocCreated_at, :cocUsdated_at);";
                    $insertar = $this -> conexion -> prepare($consultar);
                    $insertar -> bindParam("cocId", $registro['cocId']);
                    $insertar -> bindParam("cocIdCocinero", $registro['cocIdCocinero']);
                    $insertar -> bindParam("cocIdCodigoCocinero", $registro['cocIdCodigoCocinero']);
                    $insertar -> bindParam("cocEstado", $registro['cocEstado']);
                    $insertar -> bindParam("cocSesion", $registro['cocSesion']);
                    $insertar -> bindParam("cocCreated_at", $registro['cocCreated_at']);
                    $insertar -> bindParam("cocUsdated_at", $registro['cocUsdated_at']);
                    $insercion = $insertar ->execute();
                    $clavePrimaria = $this -> conexion -> lastInsertId();
                    return ['inserto' => $insercion, 'resultado' => $clavePrimaria];
                    $this -> cierreBd();
                } catch (PDOException $pdoExc) {
                    return['inserto' => $insercion, $pdoExc -> errorInfo[2]];
                }
           }
           public function eliminar($cocId = array()) {
            $planConsulta = "delete from cocinero where cocId = :cocId;";
            $eliminar = $this -> conexion -> prepare($planConsulta);
            $eliminar -> bindParam(':cocId', $cocId[0], PDO:: PARAM_INT);    
            $resultado = $eliminar->execute();
            $this -> cierreBd();
            if (!empty($resultado)) {
                return ['eliminar' => TRUE, 'registroEliminado' => array($cocId[0])];
            } else {
                return ['eliminar' => FALSE, 'registroEliminado' => array($cocId[0])];
            }
           }
            public function actualizar($registro) {
                try {
                $Id = $registro[0]['cocId']; 
                $IdCocinero = $registro[0]['cocIdCocinero'];
                $CodigoCocinero = $registro[0]['cocIdCodigoCocinero'];
                $Estado = $registro[0]['cocEstado'];
                $Creacion = $registro[0]['cocCreated_at'];
                $Usdated = $registro[0]['cocUsdated_at'];
                $Id = $registro[0]['cocId'];
                if (isset($Id)) {
                    $actualizar = "UPDATE Cocinero SET cocId=? ,";
                    $actualizar.= "cocIdCocinero=? ,";
                    $actualizar.= "cocIdCodigoCocinero=? ,";
                    $actualizar.= "cocEstado=? ,";
                    $actualizar.= "cocUsdated_at=? ";
                    $actualizar.= "where cocId=?;";
                    $actualizacion = $this->conexion->prepare($actualizar);
                    $resultadoAct=$actualizacion->execute(array($Id,$IdCocinero,$CodigoCocinero,$Usdated,$Id));
                    $this->cierreBd();
                                
                    //MEJORAR LA SALIDA DE LOS DATOS DE ACTUALIZACIÓN EXITOSA
                    return ['actualizacion' => $resultadoAct, 'mensaje' => "Actualización realizada."];	
                }
                    } catch (PDOException $pdoExc) {
                        $this->cierreBd();
                        return ['actualizacion' => $resultadoAct, 'mensaje' => $pdoExc];
                    }
            }
            public function habilitar($cocId = array()) {
                try {
                $cambiarValorTotal = 1;
                if (isset($cocId[0])) {
                    $actualizar = "update Cocinero set cocEstado = ? where cocId = ?;";
                    $actualizacion = $this-> conexion -> prepare($actualizar);
                    $actualizacion = $actualizacion -> execute(array($cambiarValorTotal, $cocId[0]));
                    return['actualizacion' => $actualizacion, 'mensaje' => "Registro activado"];
                    }
                }catch (PDOException $pdoExc) {
                    return['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
                }
            }
            public function eliminadorLogico($cocId = array()) {
                try {
                $cambiarEstado = 0;
                if (isset($cocId[0])) {
                    $actualizar = "update Cocinero set cocEstado = ? where cocId = ?;";
                    $actualizacion = $this->conexion->prepare($actualizar);
                    $actualizacion = $actualizacion->execute(array($cambiarEstado, $cocId[0]));
                    return ['actualizacion' => $actualizacion, 'mensaje' => "Registro Desactivado."];
                }
            } catch (PDOException $pdoExc) {
                return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
            }
        
        }

    }
    use PHPUnit\Framework\TestCase;
    final class CocineroDAOTest extends TestCase{
        private $Cocinero;
        public function setUp(): void {
            $this -> Cocinero = new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
        }
        public function testSeleccionarTodos() {
            $this ->assertEmpty(!$this -> Cocinero -> seleccionarTodos());
        }
        public function testsSeleccionarID($dato = array(1)) {
            $realizado = $this -> Cocinero -> seleccionarId($dato);
            $this->assertTrue(($realizado['exitoSeleccionId']));
        }
         /*public function testInsertar($dato = array('cocId' => 10, 'cocId' => 'Id', 'cocIdCocinero'   => 'Generar un codigo al mesero', 'cocEstado' => 1, 'cocCodigoCocinero'  => 550393,     'cocCreated_at' => '2021-08-12 02:22:00', 'cocUpdated_at' =>'2021-08-11 02:22:00')) {
            $realizado =  $this -> Cocinero -> insertar($dato);
            $this->assertTrue(($realizado["inserto"])); 
        }*/
        public function testsActualizar($dato =array(array('cocId' => 2, 'cocIdCocinero' => 'Generar un codigo al mesero', 'cocEstado'  => '1', 'cocCodigoCocinero' => 550393, 'cocCreated_at'  => '2021-08-12 02:22:00',   'cocUpdated_at' =>'2021-08-11 02:22:00))) {
        $realizado = $this->Cocinero->actualizar($dato);
        $this->assertTrue(($realizado['actualizacion']));
        }
        public function testEliminar($dato = array(1)) {
            $realizado = $this->Cocinero->eliminar($dato);
            $this->assertTrue(($realizado['eliminar']));
        }


    }


?> 

     
    


