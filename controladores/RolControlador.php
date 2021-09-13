<?php
     include_once PATH.'modelos/modeloRol/RolDAO.php'; 
     class RolControlador{
         private $datos;
         public function __construct($datos) {
            $this->datos = $datos;
            $this->RolControlador();
         }
         public function RolControlador() {
            switch ($this->datos['ruta']) {
                case 'listarRol':
                    $this->listarRol();
                    break;
                case 'actualizarRol':
                    $this->actualizarRol();
                    break;
                case 'confirmaActualizarRol':  
                    $this->confirmaActualizarRol();
                    break;
                case 'cancelarActualizarRol':  
                    $this->cancelarActualizarRol();
                    break;
                case 'mostrarInsertarRol':  
                    $this->mostrarInsertarRol();
                    break;
                case 'insertarRol':  
                    $this->insertarRol();
                    break;
               case "cancelarInsertarRol":
                $this->cancelarInsertarRol(); 
                    break;
            }
         }
         public function listarRol() {
            $gestarRol = new RolDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $registroRol = $gestarRol -> seleccionarTodos();
            session_start();
            $_SESSION['listaDeRol'] = $registroRol;
            header("location:principal.php?contenido=vistas/vistasRol/listarDTRegistroRol.php");
         }
         public function actualizarRol() {
            $gestarRol = new RolDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $consultaDeRol = $gestarRol -> seleccionarId(array($this->datos['idAct'])); // Se consulta el libro para modificar los datos
            $actualizarDatosRol = $consultaDeRol['registroEncontrado'][0];
            session_start();
            $_SESSION['actualizarDatosRol'] = $actualizarDatosRol;
            header("location:principal.php?contenido=vistas/vistasRol/vistaActualizarRol.php");
            
         }
         public function confirmaActualizarRol() {
            $gestarRol = new RolDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $actualizarRol = $gestarRol -> actualizar(array($this->datos)); 
            session_start();
            $_SESSION['mensaje'] = "Actualización realizada."; 
            header("location:Controlador.php?ruta=listarRol");
         }
         public function cancelarActualizarRol() {
            session_start();
            $_SESSION['mensaje'] = "Desistio de la actualizacion";
            header("location:Controlador.php?ruta=listarRol");
         }
         public function mostrarInsertarRol() {
            
            $gestarRol = new RolDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $registroRol = $gestarRol -> seleccionarTodos(); 
            session_start();
            $_SESSION['registroRol'] = $registroRol;
            $registroRol = null;
            header("location:principal.php?contenido=vistas/vistasRol/vistaInsertarRol.php");
         }
         public function insertarRol() {
            //Se instancia tipoDePlatoDAO para insertar
            $buscarRol = new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
            //Se consulta si existe ya el registro
            $RolHallado = $buscarRol->seleccionarId(array($this->datos['rolId']));
            //Si no existe el libro en la base se procede a insertar ****  		
            if (!$RolHallado['exitoSeleccionId']) {
            $insertarRol = new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
            $insertoRol = $insertarRol->insertar($this->datos);  //inserción de los campos en la tabla libros 

            $resultadoInsercionRol = $insertoRol['resultado'];  //Traer el id con que quedó el libro de lo contrario la excepción o fallo  

            session_start();
            $_SESSION['mensaje'] = "Registrado " . $this->datos['rolId'] . " con éxito." . $resultadoInsercionRol;

            header("location:Controlador.php?ruta=listarRol");
            } else {// Si existe se retornan los datos y se envía el mensaje correspondiente ****
            session_start();
            $_SESSION['rolId'] = $this->datos['rolId'];
            $_SESSION['rolNombre'] = $this->datos['rolNombre'];
            $_SESSION['rolDescripcion'] = $this->datos['rolDescripcion'];
            $_SESSION['mensaje'] = "   El código " . $this->datos['rolId'] . " ya existe en el sistema.";

            header("location:Controlador.php?ruta=mostrarInsertarRol");
        }
        }
        public function cancelarInsertarRol() {
         session_start();
         $_SESSION['mensaje'] = "Desistió de la insercion";
         header("location:Controlador.php?ruta=listarRol");
     }
 
   }

?>