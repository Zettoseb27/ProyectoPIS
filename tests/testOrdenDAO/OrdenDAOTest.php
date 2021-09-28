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
        class OrdenDAO extends ConBdMySql {
            public function __construct ($servidor, $base, $loginBD, $passwordBD) {
                parent::__construct($servidor, $base, $loginBD, $passwordBD);
            }
    
            public function seleccionarTodos(){ // Método: seleccionarTodos(), 
                $planConsulta = "select  O.ordId,O.ordvalorTotal,Mn.menId,Mn.menObservacion,Ms.mesNumeroMesa,pl.plaDescripcion,
                Tp.tipPlaAdicional,Tp.tipPlaBebida,Tp.tipPlaPostre,Tp.tipPlaPlato from orden O
                join menu Mn on O.ordIdMenu= menId 
                join plato Pl on O.ordIdMenu=plaId
                join tipo_plato Tp on ordIdMenu=tipPlaId
                join mesa Ms on O.ordIdMesa=Ms.mesId;";
    
                $registrosOrden = $this -> conexion -> prepare ($planConsulta);
                $registrosOrden -> execute();//ejecucion de la consulta
    
                $listadoRegistroOrden = array();
    
                while($registro=$registrosOrden -> fetch(PDO::FETCH_OBJ)){
                    $listadoRegistroOrden[] = $registro;
    
                }
    
                    $this->cierreBd();
    
                    return $listadoRegistroOrden;
                
            }
    
            public function seleccionarId($ordId) { // Método: seleccionarId($ordId),  
    
                $planConsulta = " SELECT * FROM orden O ";
                $planConsulta .= " WHERE O.ordId =  ? ;";
    
                $listar = $this->conexion->prepare($planConsulta);
    
                $listar->execute(array($ordId[0]));
    
                $registroEncontrado = array();
    
                while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
    
                    $registroEncontrado[] = $registro;
                }
    
                $this->cierreBd();
    
                if (!empty($registroEncontrado)) {
                    return ['exitoSeleccionId' => true, 'registroEncontrado' => $registroEncontrado];
                } else {
                    return ['exitoSeleccionId' => false, 'registroEncontrado' => $registroEncontrado];
                }
            }
    
             public function insertar($registro) { // Método: insertar($registro), 
    
                try {
                    $consulta = "insert into orden values (:ordId, :ordIdMenu, :ordIdMesa, :ordvalorTotal, :ordEstado, :ordSesion, :ordCreated_at, :ordUpdate_at);";
    
                    $insertar = $this -> conexion -> prepare($consulta);
    
                    $insertar -> bindParam("ordId", $registro['ordId']);
                    $insertar -> bindParam("ordIdMenu", $registro['ordIdMenu']);
                    $insertar -> bindParam("ordIdMesa", $registro['ordIdMesa']);
                    $insertar -> bindParam("ordvalorTotal", $registro['ordvalorTotal']);
                    $insertar -> bindParam("ordEstado", $registro['ordEstado']);
                    $insertar -> bindParam("ordSesion", $registro['ordSesion']);
                    $insertar -> bindParam("ordCreated_at", $registro['ordCreated_at']);
                    $insertar -> bindParam("ordUpdate_at", $registro['ordUpdate_at']);
                    $insercion = $insertar -> execute();
                    $clavePrimaria = $this -> conexion -> lastInsertId();
                    return ['inserto' => $insercion, 'resultado' => $clavePrimaria];
                    $this -> cierreBd();
                } catch (PDOException $pdoExc) {
                    return['inserto' => $insercion, $pdoExc -> errorInfo[2]];
                }
            }
            public function eliminar($ordId = array()) {
                $planConsulta = "delete from orden where ordId = :ordId;";
                $eliminar = $this -> conexion -> prepare($planConsulta);
                $eliminar -> bindParam(':ordId', $ordId[0], PDO:: PARAM_INT);    
                $resultado = $eliminar->execute();
                $this -> cierreBd();
                if (!empty($resultado)) {
                    return ['eliminar' => TRUE, 'registroEliminado' => array($ordId[0])];
                } else {
                    return ['eliminar' => FALSE, 'registroEliminado' => array($ordId[0])];
                }
            }
            public function actualizar($registro) {
                try {
                    $menu = $registro[0]['ordIdMenu'];
                    $Mesa = $registro[0]['ordIdMesa'];
                    $ValorTotal = $registro[0]['ordValorTotal'];
                    $Estado = $registro[0]['ordEstado']; 
                    $Sesion = $registro[0]['ordSesion']; 
                    $Created = $registro[0]['ordCreated_at']; 
                    $Updated = $registro[0]['ordUpdated_at'];
                    $Id = $registro[0]['ordId'];
                    if (isset($Id)) {
                        $actualizar = "UPDATE orden SET ordIdMenu = ?, ordIdMesa =?, ordValorTotal=?,ordEstado=?,ordSesion=?,ordCreated_at=?,ordUpdated_at=? WHERE ordId=?;";
                        $actualizacion=$this->prepare($actualizar);
                        $resuladoAct=$actualizacion->execute(array($menu,$Mesa,$ValorTotal,$Estado,$Sesion,$Created,$Updated,$Id)); 
                        $this->cierreBd();
                        return ['actualizacion'=> $resuladoAct, 'mensaje' => "Actualizacion realizada."]; 
                    }
                        } catch (PDOException $pdoExc) {
                            $this->cierreBd();
                            return['actualizacion' => $resuladoAct, 'mensaje' => $pdoExc];
                        }
            }
            public function habilitar($ordId = array()) {
                try {
                $cambiarValorTotal = 1;
                if (isset($ordId[0])) {
    
                    $actualizar = "update orden set ordvalorTotal = ? where ordId = ?;";
                    $actualizacion = $this-> conexion -> prepare($actualizar);
                    $actualizacion = $actualizacion -> execute(array($cambiarValorTotal, $ordId[0]));
                    return['actualizacion' => $actualizacion, 'mensaje' => "Registro activado"];
                    }
    
                }catch (PDOException $pdoExc) {
                    return['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
                }
            }
    
            public function eliminadorLogico($ordId = array()) {
    
                try {
    
                $cambiarEstado = 0;
                if (isset($ordId[0])) {
                    $actualizar = "update orden set ordvalorTotal = ? where ordId = ?;";
                    $actualizacion = $this->conexion->prepare($actualizar);
                    $actualizacion = $actualizacion->execute(array($cambiarEstado, $ordId[0]));
                    return ['actualizacion' => $actualizacion, 'mensaje' => "Registro Desactivado."];
                }
            } catch (PDOException $pdoExc) {
                return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
            }
    
        }
    
    }
    use PHPUnit\Framework\TestCase;
    final class OrdenDAOTest extends TestCase{
        private $Ord;
        public function setUp(): void {
            $this -> Ord = new OrdenDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
        }
        public function testSeleccionarTodos() {
            $this ->assertEmpty(!$this -> Ord -> seleccionarTodos());
        }
        public function testsSeleccionarID($dato = array(1)) {
            $realizado = $this -> Ord -> seleccionarId($dato);
            $this->assertTrue(($realizado['exitoSeleccionId']));
        }
        public function testInsertar($dato = array('ordId' => 6, 'ordIdMenu' => 6, 'ordIdMesa'=> 5, 'ordValorTotal'=> 16000, 'ordEstado'=>1,'ordSesion'=> null, 'ordCreated_at' => '2021-08-12 02:22:00', 'ordUpdated_at' =>'2021-08-11 02:22:00')) {
            $realizado =  $this -> Ord -> insertar($dato);
            $this->assertTrue(($realizado["inserto"])); 
        } 
        /* public function testsActualizar($dato =array(array('ordId'=>2 ,'rolIdMenu'=>4,'ordIdMesa'=>5,'ordValorTotal'=>16000, 'ordEstado'=>1,'ordSesion'=>null,'ordCreated_at'=>'2021-09-12 03:22:00','ordUpdated_at'=>'2021-09-10 04:25:00'))) {
        $realizado = $this->Ord->actualizar($dato);
        $this->assertTrue(($realizado['actualizacion']));
        } 
        */
        public function testEliminar($dato = array(6)) {
            $realizado = $this->Ord->eliminar($dato);
            $this->assertTrue(($realizado['eliminar']));
        }
        public function testEliminarLogico($dato = array(3)) {
            $realizado = $this->Ord->eliminadorLogico($dato);
            $this->assertTrue(($realizado['actualizacion']));
        } 
        public function testHabilitar($dato = array(3)) {
            $realizado = $this->Ord->habilitar($dato);
            $this->assertTrue(($realizado['actualizacion']));
        } 
    }
?> 

     
    


