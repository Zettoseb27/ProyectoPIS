<?php
     include_once PATH.'modelos/modeloCodigoMesero/CodigoMeseroDAO.php'; 
     //include_once PATH.'modelos/modeloPersona/PersonaDAO.php'; 
     class CodigoMeseroControlador{
         private $datos;
         public function __construct($datos) {
            $this->datos = $datos;
            $this->CodigoMeseroControlador();
         }
         public function CodigoMeseroControlador() {
            switch ($this->datos['ruta']) {
                case 'listarCodigoMesero':
                    $this->listarCodigoMesero();
                    break;
                case 'eliminarCodigoMesero':
                    $this->eliminarCodigoMesero();
                   break; 
                case 'actualizarCodigoMesero':
                    $this->actualizarCodigoMesero();
                    break;
                case 'confirmaActualizarCodigoMesero':  
                    $this->confirmaActualizarCodigoMesero(); 
                case 'cancelarActualizarCodigoMesero':  
                    $this->cancelarActualizarCodigoMesero();
                    break;
                case 'mostrarInsertarCodigoMesero':  
                    $this->mostrarInsertarCodigoMesero();
                    break;
                case 'insertarCodigoMesero':  
                    $this->insertarCodigoMesero();
                    break;
               case "cancelarInsertarCodigoMesero":
                $this->cancelarInsertarCodigoMesero(); 
                    break;
            }
         }
         public function listarCodigoMesero() {
            $gestarCodigoMesero = new CodigoMeseroDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $registroCodigoMesero = $gestarCodigoMesero -> seleccionarTodos();
            session_start();
            //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS INPRINA O UTILICE //
            $_SESSION['listarDeCodigoMesero'] = $registroCodigoMesero;
            header("location:principal.php?contenido=vistas/vistasCodigoMesero/listarDTRegistroCodigoMesero.php");
         }
         public function eliminarCodigoMesero() {
            $EliminarRol = new CodigoMeseroDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $EliminarDeRol = $EliminarRol -> Eliminar(array($this->datos['idAct'])); // Se consulta el libro para modificar los datos
            $actualizarDatosRol = $EliminarDeRol['registroEncontrado'][0];
            session_start();
            $_SESSION['mensaje'] = "Eliminación realizada."; 
            header("location:Controlador.php?ruta=listarCodigoMesero");
         }
         public function actualizarCodigoMesero() {
            //echo _line_." "._file_."<br/"; exit;
            $gestarCodigoMesero = new CodigoMeseroDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $consultaDeCodigoMesero = $gestarCodigoMesero -> seleccionarId(array($this->datos['idAct']));
            $actualizarDatosCodigoMesero = $consultaDeCodigoMesero['registroEncontrado'][0];
            /*         * ****PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON LIBROS******************** */
            $gestarCategoriaPersona = new PersonaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
            $registroPersona = $gestarCategoriaPersona->seleccionarTodos();
            /*         * ************************************************************************* */
            session_start(); 
            $_SESSION['actualizarDatosCodigoMesero'] = $actualizarDatosCodigoMesero;
            $_SESSION['registroPersona'] = $registroPersona;
    
            header("location:principal.php?contenido=vistas/vistasCodigoMesero/vistaActualizarCodigoMesero.php");
         }
         public function confirmaActualizarCodigoMesero() {  
             //echo _line_." "._file_."<br/"; exit;
            $gestarCodigoMesero = new CodigoMeseroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
            $ActualizarCodigoMesero = $gestarCodigoMesero->actualizar(array($this->datos));
            session_start();
            $_SESSION['mensaje'] = "Actualización realizada."; 
            header("location:Controlador.php?ruta=listarCodigoMesero");
         }
         public function cancelarActualizarCodigoMesero() {
            session_start();
            $_SESSION['mensaje'] = "Desistió de la actualización";
            header("location:Controlador.php?ruta=listarCodigoMesero");
            
        }
        public function mostrarInsertarCodigoMesero() {
            /*         * ****PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON LIBROS******************** */
            $gestarCategoriaLibros = new PersonaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
            $registroCodigoMesero = $gestarCategoriaLibros->seleccionarTodos();
            /*         * ************************************************************************* */
    
            session_start();
            $_SESSION['registroCodigoMesero'] = $registroCodigoMesero;
            $registroCodigoMesero = null;
    
            header("Location: principal.php?contenido=vistas/vistasCodigoMesero/vistaInsertarCodigoMesero.php");
        }
        public function insertarCodigoMesero() {

            //Se instancia CodigoMeseroDAO para insertar
            $buscarCodigoMesero = new CodigoMeseroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
            //Se consulta si existe ya el registro
            $PlatoHallado = $buscarCodigoMesero->seleccionarId(array($this->datos['codMesId']));
            //Si no existe el libro en la base se procede a insertar ****  		
            if (!$PlatoHallado['exitoSeleccionId']) {
                $insertarPlato = new CodigoMeseroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
                $insertoPlato = $insertarPlato->insertar($this->datos);  //inserción de los campos en la tabla libros 
    
                $resultadoInsercionCodigoMesero = $insertoPlato['resultado'];  //Traer el id con que quedó el libro de lo contrario la excepción o fallo  
    
                session_start();
                $_SESSION['mensaje'] = "Registrado " . $this->datos['codMesId'] . " con éxito.";
    
                header("location:Controlador.php?ruta=listarCodigoMesero");
            } else {// Si existe se retornan los datos y se envía el mensaje correspondiente ****
                session_start();
                $_SESSION['codMesId'] = $this->datos['codMesId'];
                $_SESSION['codMesIdMesero'] = $this->datos['codMesIdMesero'];
                $_SESSION['codMesCodigoMesero'] = $this->datos['codMesCodigoMesero'];
    
                $_SESSION['mensaje'] = "   El código " . $this->datos['codMesId'] . " ya existe en el sistema.";
    
                header("location:Controlador.php?ruta=mostrarInsertarCodigoMesero");
            }
        }
    }
?>