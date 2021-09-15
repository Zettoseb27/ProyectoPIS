<?php
     include_once PATH.'modelos/modelotipoDePlato/tipoDePlatoDAO.php'; 
     class tipoPlatoControlador{
         private $datos;
         public function __construct($datos) {
             $this->datos = $datos;
             $this->TipoPlatoControlador();
         }
         public function TipoPlatoControlador() {
            switch ($this->datos['ruta']) {
                case 'listarTipoPlato':
                    $this->listarTipoPlato();
                    break;
                case 'eliminarTipoPlato':
                   $this->eliminarTipoPlato();
                   break;
                case 'ActualizarTipoPlato':  
                    $this->ActualizarTipoPlato(); 
                    break;
                case 'confirmaActualizarTipoPlato':  
                    $this->confirmaActualizarTipoPlato();
                    break;
                case "cancelarActualizarTipoPlato":  
                $this->cancelarActualizarTipoPlato(); 
                break;	
                case 'mostrarInsertarTipoPlato':  
                    $this->mostrarInsertarTipoPlato();
                    break;
                case 'insertarTipoPlato':  
                    $this->insertarTipoPlato();
                    break;
                case "cancelarInsertarTipoPlato":
                $this->cancelarInsertarTipoPlato(); 
                    break;
            }
         }
         public function listarTipoPlato() {
            $gestarTipoPlato = new tipoDePlatoDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $registroTipoPlato = $gestarTipoPlato -> seleccionarTodos();
            session_start();
            $_SESSION['listaTipoPlato'] = $registroTipoPlato;
            header("location:principal.php?contenido=vistas/vistasTipoPlato/listarDTRegistroTipoPlato.php");
         }
         public function eliminarTipoPlato() {
            $EliminarRol = new tipoDePlatoDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $EliminarDeRol = $EliminarRol -> Eliminar(array($this->datos['idAct'])); // Se consulta el libro para modificar los datos
            $actualizarDatosRol = $EliminarDeRol['registroEncontrado'][0];
            session_start();
            $_SESSION['mensaje'] = "Eliminación realizada."; 
            header("location:Controlador.php?ruta=listarTipoPlato");
         }
         public function ActualizarTipoPlato() {
            $gestarTipoPlato = new tipoDePlatoDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $consultaDeTipoPlato = $gestarTipoPlato -> seleccionarId(array($this->datos['idAct'])); // Se consulta el libro para modificar los datos
            $actualizarDatosTipoPlato = $consultaDeTipoPlato['registroEncontrado'][0]; 
            session_start();
            $_SESSION['actualizarDatosTipoPlato'] = $actualizarDatosTipoPlato;
            header("location:principal.php?contenido=vistas/vistasTipoPlato/vistaActualizarTipoPlato.php");
         }
         public function confirmaActualizarTipoPlato() {
            $gestarTipoPlato = new tipoDePlatoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
            $ActualizarTipoPlato = $gestarTipoPlato->actualizar(array($this->datos));
            session_start();
            $_SESSION['mensaje'] = "Actualización realizada."; 
            header("location:Controlador.php?ruta=listarTipoPlato");
         }
         public function cancelarActualizarTipoPlato() {
            session_start();
            $_SESSION['mensaje'] = "Desistió de la actualización";
            header("location:Controlador.php?ruta=listarTipoPlato");
        }
        public function mostrarInsertarTipoPlato() {
            $gestarTipoPlato = new tipoDePlatoDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $registroTipoPlato = $gestarTipoPlato -> seleccionarTodos();
            session_start();
            $_SESSION['registroTipoPlato'] = $registroTipoPlato;
           // $registroTipoPlato = null;
            header("Location: principal.php?contenido=vistas/vistasTipoPlato/vistaInsertarTipoPlato.php");
        }
        public function insertarTipoPlato() {
            //Se instancia tipoDePlatoDAO para insertar
            $buscarTipoPlato = new tipoDePlatoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
            //Se consulta si existe ya el registro
            $TipoPlatoHallado = $buscarTipoPlato->seleccionarId(array($this->datos['tipPlaId']));
            //Si no existe el libro en la base se procede a insertar ****  		
            if (!$TipoPlatoHallado['exitoSeleccionId']) {
            $insertarTipoPlato = new tipoDePlatoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
            $insertoTipoPlato = $insertarTipoPlato->insertar($this->datos);  //inserción de los campos en la tabla libros 

            $resultadoInsercionTipoPlato = $insertoTipoPlato['resultado'];  //Traer el id con que quedó el libro de lo contrario la excepción o fallo  

            session_start();
            $_SESSION['mensaje'] = "Registrado " . $this->datos['tipPlaId'] . " con éxito.";

            header("location:Controlador.php?ruta=listarTipoPlato");
            } else {// Si existe se retornan los datos y se envía el mensaje correspondiente ****
            session_start();
            $_SESSION['tipPlaId'] = $this->datos['tipPlaId'];
            $_SESSION['tipPlaPlato'] = $this->datos['tipPlaPlato'];
            $_SESSION['tipPlaAdicional'] = $this->datos['tipPlaAdicional'];
            $_SESSION['tipPlaBebida'] = $this->datos['tipPlaBebida'];
            $_SESSION['tipPlaPostre'] = $this->datos['tipPlaPostre'];
            $_SESSION['mensaje'] = "   El código " . $this->datos['tipPlaId'] . " ya existe en el sistema.";

            header("location:Controlador.php?ruta=mostrarInsertarTipoPlato");
        }
        }
        public function cancelarInsertarTipoPlato() {
            session_start();
            $_SESSION['mensaje'] = "Desistió de la Insercion";
            header("location:Controlador.php?ruta=listarTipoPlato");
        }
     }
?>