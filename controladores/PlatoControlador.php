<?php
     include_once PATH.'modelos/modeloPlato/PlatoDAO.php'; 
     include_once PATH.'modelos/modelotipoDePlato/tipoDePlatoDAO.php'; 
     class PlatoControlador{
         private $datos;
         public function __construct($datos) {
            $this->datos=$datos;
            $this->PlatoControlador();
         }
         public function PlatoControlador() {
            switch ($this->datos['ruta']) {
                case 'listarPlato':
                    $this->listarPlato();
                    break;
                case 'actualizarPlato':
                    $this->actualizarPlato();
                    break;
                case 'confirmaActualizarPlato':  
                    $this->confirmaActualizarPlato();
                    break;
                case "cancelarActualizarPlato":
                $this->cancelarActualizarPlato();  
                    break;
                case "mostrarInsertarPlato":
                $this->mostrarInsertarPlato(); 
                    break;
                case "insertarPlato":
                $this->insertarPlato(); 
                    break;
                case "cancelarInsertarPlato":
                $this->cancelarInsertarPlato(); 
                    break;
            }
         }
         public function listarPlato() {
            $gestarPlato = new PlatoDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $registroPlato = $gestarPlato -> seleccionarTodos();
            session_start();
            $_SESSION['listaDePlato'] = $registroPlato;
            header("location:principal.php?contenido=vistas/vistasPlato/listarDTRegistroPlato.php");
         }
         public function actualizarPlato() {
            $gestarPlato = new PlatoDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $consultarDePlato = $gestarPlato -> seleccionarId(array($this->datos['idAct']));
            $actualizarDatosPlato = $consultarDePlato['registroEncontrado'][0];
            /* *****PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON LIBROS***************** */
            $gestarTipoPlato = new tipoDePlatoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
            $registroTipoPlato = $gestarTipoPlato->seleccionarTodos();
            /*     ************************************************************ */
            session_start();
            $_SESSION['actualizarDatosPlato'] = $actualizarDatosPlato;
            $_SESSION['registroTipoPlato'] = $registroTipoPlato;
            header("location:principal.php?contenido=vistas/vistasPlato/vistaActualizarPlato.php");
         }
         public function confirmaActualizarPlato() {
            $gestarPlato = new PlatoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
            $actualizarPlato = $gestarPlato->actualizar(array($this->datos)); //Se envía datos del libro para actualizar. 				
    
            session_start();
            $_SESSION['mensaje'] = "Actualización realizada.";
            header("location:Controlador.php?ruta=listarPlato");
        }
        public function cancelarActualizarPlato() {
            session_start();
            $_SESSION['mensaje'] = "Desistió de la actualización";
            header("location:Controlador.php?ruta=listarPlato");
        }
        public function mostrarInsertarPlato() {
            /*         * ****PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON LIBROS******************** */
            $gestarCategoriaLibros = new tipoDePlatoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
            $registroTipoPlato = $gestarCategoriaLibros->seleccionarTodos();
            /*         * ************************************************************************* */
    
            session_start();
            $_SESSION['registroTipoPlato'] = $registroTipoPlato;
            $registroTipoPlato = null;
    
            header("Location: principal.php?contenido=vistas/vistasPlato/vistaInsertarPlato.php");
        }
        public function insertarPlato() {

            //Se instancia PlatoDAO para insertar
            $buscarPlato = new PlatoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
            //Se consulta si existe ya el registro
            $PlatoHallado = $buscarPlato->seleccionarId(array($this->datos['plaId']));
            //Si no existe el libro en la base se procede a insertar ****  		
            if (!$PlatoHallado['exitoSeleccionId']) {
                $insertarPlato = new PlatoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
                $insertoPlato = $insertarPlato->insertar($this->datos);  //inserción de los campos en la tabla libros 
    
                $resultadoInsercionPlato = $insertoPlato['resultado'];  //Traer el id con que quedó el libro de lo contrario la excepción o fallo  
    
                session_start();
                $_SESSION['mensaje'] = "Registrado " . $this->datos['plaId'] . " con éxito.  Agregado Nuevo Libro con " . $resultadoInsercionPlato;
    
                header("location:Controlador.php?ruta=listarPlato");
            } else {// Si existe se retornan los datos y se envía el mensaje correspondiente ****
                session_start();
                $_SESSION['plaId'] = $this->datos['plaId'];
                $_SESSION['plaDescripcion'] = $this->datos['plaDescripcion'];
                $_SESSION['preciplaPrecio'] = $this->datos['preciplaPrecio'];
                $_SESSION['plaEstado'] = $this->datos['plaEstado'];
                $_SESSION['plaIdTipoPlato'] = $this->datos['plaIdTipoPlato'];
    
                $_SESSION['mensaje'] = "   El código " . $this->datos['plaId'] . " ya existe en el sistema.";
    
                header("location:Controlador.php?ruta=mostrarInsertarPlato");
            }
        }
    
    } 
?>