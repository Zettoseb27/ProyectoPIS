<?php
     include_once PATH.'modelos/modeloCocinero/CocineroDAO.php';
     //include_once PATH.'modelos/modeloPersona/PersonaDAO.php';  
     class CocineroControlador{
         private $datos;
         public function __construct($datos) {
            $this->datos = $datos;
            $this->CocineroControlador();
         }
         public function CocineroControlador() {
            switch ($this->datos['ruta']) {
                case 'listarCocinero':
                    $this->listarCocinero();
                    break;
                case 'eliminarCocinero':
                    $this->eliminarCocinero();
                    break;
                case 'actualizarCocinero':
                    $this->actualizarCocinero();  
                    break;
                case 'confirmaActualizarCocinero':  
                    $this->confirmaActualizarCocinero();
                    break;
                case 'cancelarActualizarCocinero':   
                    $this->cancelarActualizarCocinero();
                    break;
                case 'mostrarInsertarCocinero':  
                    $this->mostrarInsertarCocinero();
                    break;
                case 'insertarCocinero': 
                    $this->insertarCocinero();
                    break;
                case 'cancelarInsertarCocinero':  
                    $this->cancelarInsertarCocinero();
                    break;
            }
         }
         public function listarCocinero() {
            $gestarCocinero = new CocineroDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $registroCocinero = $gestarCocinero -> seleccionarTodos();
            session_start();
            //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS INPRINA O UTILICE //
            $_SESSION['listarDeCocinero'] = $registroCocinero;
            header("location:principal.php?contenido=vistas/vistasCocinero/listarDTRegistroCocinero.php");
         }
         public function eliminarCocinero() {
            $EliminarRol = new CocineroDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $EliminarDeRol = $EliminarRol -> eliminar(array($this->datos['idAct'])); // Se consulta el libro para modificar los datos
            $actualizarDatosRol = $EliminarDeRol['registroEncontrado'][0];
            session_start();
            $_SESSION['mensaje'] = "Eliminación realizada."; 
            header("location:Controlador.php?ruta=listarCocinero");
         }
         public function actualizarCocinero() {
            //echo _line_." "._file_."<br/"; exit;
            $gestarCocinero = new CocineroDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $consultaDeCocinero = $gestarCocinero -> seleccionarId(array($this->datos['idAct']));
            $actualizarDatosCocinero = $consultaDeCocinero['registroEncontrado'][0]; 
            /*         * ****PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON LIBROS******************** */
            $gestarCategoriaPersona = new PersonaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
            $registroPersona = $gestarCategoriaPersona->seleccionarTodos();
            /*         * ************************************************************************* */
            session_start(); 
            $_SESSION['actualizarDatosCocinero'] = $actualizarDatosCocinero;  
            $_SESSION['registroPersona'] = $registroPersona;
    
            header("location:principal.php?contenido=vistas/vistasCocinero/vistaActualizarCocinero.php");
         }
         public function confirmaActualizarCocinero() {  
            //echo _line_." "._file_."<br/"; exit;
           $gestarCocinero = new CocineroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
           $actualizarCocinero = $gestarCocinero->actualizar(array($this->datos));
           session_start();
           $_SESSION['mensaje'] = "Actualización realizada."; 
           header("location:Controlador.php?ruta=listarCocinero");
        }
        public function cancelarActualizarCocinero() {
            session_start();
            $_SESSION['mensaje'] = "Desistio de la actualizacion";
            header("location:Controlador.php?ruta=listarCocinero");
         }
         public function mostrarInsertarCocinero() {
            /*         * ****PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON LIBROS******************** */
            $gestarCategoriaLibros = new PersonaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
            $registroCocinero = $gestarCategoriaLibros->seleccionarTodos();
            /*         * ************************************************************************* */
    
            session_start();
            $_SESSION['registroCocinero'] = $registroCocinero;
            $registroCocinero = null;
    
            header("Location: principal.php?contenido=vistas/vistasCocinero/vistaInsertarCocinero.php");
        }
        public function insertarCocinero() {

            //Se instancia CocineroDAO para insertar
            $buscarCodigoMesero = new CocineroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
            //Se consulta si existe ya el registro
            $PlatoHallado = $buscarCodigoMesero->seleccionarId(array($this->datos['cocId']));
            //Si no existe el libro en la base se procede a insertar ****  		
            if (!$PlatoHallado['exitoSeleccionId']) {
                $insertarPlato = new CocineroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
                $insertoPlato = $insertarPlato->insertar($this->datos);  //inserción de los campos en la tabla libros 
    
                $resultadoInsercionCodigoMesero = $insertoPlato['resultado'];  //Traer el id con que quedó el libro de lo contrario la excepción o fallo  
    
                session_start();
                $_SESSION['mensaje'] = "Registrado " . $this->datos['cocId'] . " con éxito.";
    
                header("location:Controlador.php?ruta=listarCocinero");
            } else {// Si existe se retornan los datos y se envía el mensaje correspondiente ****
                session_start();
                $_SESSION['cocId'] = $this->datos['cocId'];
                $_SESSION['cocIdCocinero'] = $this->datos['cocIdCocinero'];
                $_SESSION['cocCodigoCocinero'] = $this->datos['cocCodigoCocinero'];  
    
                $_SESSION['mensaje'] = "   El código " . $this->datos['cocId'] . " ya existe en el sistema.";
    
                header("location:Controlador.php?ruta=mostrarInsertarCocinero");
                }
            }
        public function cancelarInsertarCocinero() {
            session_start();
            $_SESSION['mensaje'] = "Desistió de la insercion";
            header("location:Controlador.php?ruta=listarRol");
        }
    }
?>