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
        class RolDAO extends ConBdMySql {
            public function __construct ($servidor, $base, $loginBD, $passwordBD) {
                parent::__construct($servidor, $base, $loginBD, $passwordBD);
            }
            public function seleccionarTodos(){
               $planConsulta = "select rolId, rolNombre, rolDescripcion, rol_created_at
               from rol;";
               $registrosOrden = $this -> conexion -> prepare ($planConsulta);
               $registrosOrden -> execute();//ejecucion de la consulta
               $listadoRegistroOrden = array();
               while($registro=$registrosOrden -> fetch(PDO::FETCH_OBJ)){
                   $listadoRegistroOrden[] = $registro;
               }
                   $this->cierreBd();
                   return $listadoRegistroOrden;
           }public function seleccionarId($rolId) {
                $consultar = "select rolId, rolNombre, rolDescripcion, rol_created_at
                from rol where rolId = ?;";
                $listar = $this -> conexion -> prepare($consultar);
                $listar -> execute(array($rolId[0]));
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
                    $consultar = "insert into rol values (:rolId, :rolNombre, :rolDescripcion, :rolEstado, :rolUsuSesion, :rol_created_at, :rol_updated_at);";
                    $insertar = $this -> conexion -> prepare($consultar);
                    $insertar -> bindParam("rolId", $registro['rolId']);
                    $insertar -> bindParam("rolNombre", $registro['rolNombre']);
                    $insertar -> bindParam("rolDescripcion", $registro['rolDescripcion']);
                    $insertar -> bindParam("rolEstado", $registro['rolEstado']);
                    $insertar -> bindParam("rolUsuSesion", $registro['rolUsuSesion']);
                    $insertar -> bindParam("rol_created_at", $registro['rol_created_at']);
                    $insertar -> bindParam("rol_updated_at", $registro['rol_updated_at']);
                    $insercion = $insertar ->execute();
                    $clavePrimaria = $this -> conexion -> lastInsertId();
                    return ['inserto' => $insercion, 'resultado' => $clavePrimaria];
                    $this -> cierreBd();
                } catch (PDOException $pdoExc) {
                    return['inserto' => $insercion, $pdoExc -> errorInfo[2]];
                }
           }
           public function eliminar($rolId = array()) {
            $planConsulta = "delete from rol where rolId = :rolId;";
            $eliminar = $this -> conexion -> prepare($planConsulta);
            $eliminar -> bindParam(':rolId', $rolId[0], PDO:: PARAM_INT);    
            $resultado = $eliminar->execute();
            $this -> cierreBd();
            if (!empty($resultado)) {
                return ['eliminar' => TRUE, 'registroEliminado' => array($rolId[0])];
            } else {
                return ['eliminar' => FALSE, 'registroEliminado' => array($rolId[0])];
            }
           }
            public function actualizar($registro) {
                try {
                $nombre = $registro[0]['rolNombre']; 
                $descripcion = $registro[0]['rolDescripcion'];
                $cambiarEstado = $registro[0]['rolEstado'];
                $usuSesion = $registro[0]['rolUsuSesion'];
                $created = $registro[0]['rol_created_at'];
                $updated = $registro[0]['rol_updated_at'];
                $Id = $registro[0]['rolId'];
                if (isset($Id)) {
                    $actualizar = "UPDATE rol SET rolNombre=? ,";
                    $actualizar.= "rolDescripcion=? ,";
                    $actualizar.= "rolEstado=? ,";
                    $actualizar.= "rolUsuSesion=? ,";
                    $actualizar.= "rol_created_at=? ,";
                    $actualizar.= "rol_updated_at=? ";
                    $actualizar.= "where rolId=?;";
                    $actualizacion = $this->conexion->prepare($actualizar);
                    $resultadoAct=$actualizacion->execute(array($nombre,$descripcion,$cambiarEstado,$usuSesion,$created,$updated, $Id));
                    $this->cierreBd();
                                
                    //MEJORAR LA SALIDA DE LOS DATOS DE ACTUALIZACIÓN EXITOSA
                    return ['actualizacion' => $resultadoAct, 'mensaje' => "Actualización realizada."];	
                }
                    } catch (PDOException $pdoExc) {
                        $this->cierreBd();
                        return ['actualizacion' => $resultadoAct, 'mensaje' => $pdoExc];
                    }
            }
            public function habilitar($rolId = array()) {
                try {
                $cambiarValorTotal = 1;
                if (isset($rolId[0])) {
                    $actualizar = "update rol set rolEstado = ? where rolId = ?;";
                    $actualizacion = $this-> conexion -> prepare($actualizar);
                    $actualizacion = $actualizacion -> execute(array($cambiarValorTotal, $rolId[0]));
                    return['actualizacion' => $actualizacion, 'mensaje' => "Registro activado"];
                    }
                }catch (PDOException $pdoExc) {
                    return['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
                }
            }
            public function eliminadorLogico($rolId = array()) {
                try {
                $cambiarEstado = 0;
                if (isset($rolId[0])) {
                    $actualizar = "update rol set rolEstado = ? where rolId = ?;";
                    $actualizacion = $this->conexion->prepare($actualizar);
                    $actualizacion = $actualizacion->execute(array($cambiarEstado, $rolId[0]));
                    return ['actualizacion' => $actualizacion, 'mensaje' => "Registro Desactivado."];
                }
            } catch (PDOException $pdoExc) {
                return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
            }
        
        }

    }
    use PHPUnit\Framework\TestCase;
    final class RolDAOTest extends TestCase{
        private $rol;
        public function setUp(): void {
            $this -> rol = new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
        }
        public function testSeleccionarTodos() {
            $this ->assertEmpty(!$this -> rol -> seleccionarTodos());
        }
        public function testsSeleccionarID($dato = array(1)) {
            $realizado = $this -> rol -> seleccionarId($dato);
            $this->assertTrue(($realizado['exitoSeleccionId']));
        }
        /* public function testInsertar($dato = array('rolId' => 10, 'rolNombre' => 'Proveedor', 'rolDescripcion'   => 'suministra los protuctos para el restaurante', 'rolEstado' => 1, 'rolUsuSesion'  => null,     'rol_created_at' => '2021-08-12 02:22:00', 'rol_updated_at' =>'2021-08-11 02:22:00')) {
            $realizado =  $this -> rol -> insertar($dato);
            $this->assertTrue(($realizado["inserto"])); 
        } */
        public function testsActualizar($dato =array(array('rolId' => 9, 'rolNombre' => 'Proveedor', 'rolDescripcion'   => 'suministra los protuctos para el restaurante', 'rolEstado' => 1, 'rolUsuSesion'  => null,     'rol_created_at' =>'2021-09-12 03:22:00', 'rol_updated_at' =>'2021-09-10 04:25:00'))) {
        $realizado = $this->rol->actualizar($dato);
        $this->assertTrue(($realizado['actualizacion']));
        }
        public function testEliminar($dato = array(1)) {
            $realizado = $this->rol->eliminar($dato);
            $this->assertTrue(($realizado['eliminar']));
        }


    }


?> 

     
    


