<?php
     include_once PATH.'modelos/modeloHorarioCocinero/HorarioCocineroDAO.php';
     //include_once PATH.'modelos/modeloCocineroMesero/CodigoCocineroDAO.php'; 
     class HorarioCocineroControlador{
         private $datos;
         public function __construct($datos) {
            $this->datos = $datos;
            $this->HorarioCocineroControlador();
         }
         public function HorarioCocineroControlador() {
            switch ($this->datos['ruta']) {
                case 'listarHorarioCocinero':
                    $this->listarHorarioCocinero();
                    break;
                case 'eliminarHorarioCocinero':
                    $this->eliminarHorarioCocinero();
                    break;
                case 'actualizarHorarioCocinero':
                    $this->actualizarHorarioCocinero();
                    break;
                case 'confirmaActualizarHorarioCocinero':  
                    $this->confirmaActualizarHorarioCocinero(); 
                    break;
                case 'cancelarActualizarhorarioCocinero':  
                    $this->cancelarActualizarhorarioCocinero();
                    break;
                case 'mostrarInsertarHorarioCocinero':  
                    $this->mostrarInsertarHorarioCocinero(); 
                    break;
                case 'insertarHorarioCocinero': 
                    $this->insertarHorarioCocinero();
                    break;
                case 'cancelarInsertarHorarioCocinero': 
                    $this->cancelarInsertarHorarioCocinero();
                    break;
                    
            }
         }
         public function listarHorarioCocinero() {
            $gestarCocinero = new HorarioCocineroDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $registroCocinero = $gestarCocinero -> seleccionarTodos();
            session_start();
            //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS INPRINA O UTILICE //
            $_SESSION['listarDeHorarioCocinero'] = $registroCocinero;
            header("location:principal.php?contenido=vistas/vistasHorarioCocinero/listarDTRegistroHorarioCocinero.php");
         }
         public function eliminarHorarioCocinero() {
            $EliminarHorarioCocinero = new HorarioCocineroDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $EliminarDeHorarioCocinero = $EliminarHorarioCocinero -> Eliminar(array($this->datos['idAct'])); // Se consulta el libro para modificar los datos
            $actualizarDatosHorarioCocinero = $EliminarDeHorarioCocinero['registroEncontrado'][0];
            session_start();
            $_SESSION['mensaje'] = "Eliminación realizada."; 
            header("location:Controlador.php?ruta=listarHorarioCocinero");
         }
         public function actualizarHorarioCocinero() {
            //echo _line_." "._file_."<br/"; exit;
            $gestarHorarioCocinero = new HorarioCocineroDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD); 
            $consultaDeCodigoMesero = $gestarHorarioCocinero -> seleccionarId(array($this->datos['idAct']));
            $actualizarDatosHorarioCocinero = $consultaDeCodigoMesero['registroEncontrado'][0];
            /*         * ****PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON LIBROS******************** */
            $gestarCategoriaPersona = new CocineroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
            $registroCocinero = $gestarCategoriaPersona->seleccionarTodos();
            /*         * ************************************************************************* */
            session_start(); 
            $_SESSION['actualizarHorarioCocinero'] = $actualizarDatosHorarioCocinero; 
            $_SESSION['registroCocinero'] = $registroCocinero;
    
            header("location:principal.php?contenido=vistas/vistasHorarioCocinero/vistaActualizarHorarioCocinero.php");
         }
         public function confirmaActualizarHorarioCocinero() { 
            $gestarHorario = new HorarioCocineroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
            $actualizarHorario = $gestarHorario->actualizar(array($this->datos)); //Se envía datos del libro para actualizar. 				
    
            session_start();
            $_SESSION['mensaje'] = "Actualización realizada.";
            header("location:Controlador.php?ruta=listarHorario");
        }
         public function mostrarInsertarHorarioCocinero() {
            /*         * ****PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON LIBROS******************** */
            $gestarCodigoMesero = new CocineroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
            $registroHorarioCocinero = $gestarCodigoMesero->seleccionarTodos();
            /*         * ************************************************************************* */
    
            session_start();
            $_SESSION['registroHorarioCocinero'] = $registroHorarioCocinero;
            $registroHorarioCocinero = null;
    
            header("Location:principal.php?contenido=vistas/vistasHorarioCocinero/vistaInsertarHorarioCocinero.php");
        }
        public function insertarHorarioCocinero() {  

            //Se instancia HorarioCocineroDAO para insertar
            $buscarHorario = new HorarioCocineroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
            //Se consulta si existe ya el registro
            $HorarioHallado = $buscarHorario->seleccionarId(array($this->datos['horId']));
            //Si no existe el libro en la base se procede a insertar ****  		
            if (!$HorarioHallado['exitoSeleccionId']) {
                $insertarHorarioCocinero = new HorarioCocineroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
                $insertoHorario = $insertarHorarioCocinero->insertar($this->datos);  //inserción de los campos en la tabla libros 
    
                $resultadoInsercionHorario = $insertoHorario['resultado'];  //Traer el id con que quedó el libro de lo contrario la excepción o fallo  
    
                session_start();
                $_SESSION['mensaje'] = "Registrado " . $this->datos['horId'] . " con éxito.";
    
                header("location:Controlador.php?ruta=listarHorarioCocinero");
            } else {// Si existe se retornan los datos y se envía el mensaje correspondiente ****
                session_start();
                $_SESSION['horId'] = $this->datos['horId'];
                $_SESSION['horCocHoraInicio'] = $this->datos['horCocHoraInicio'];
                $_SESSION['horCocHoraFin'] = $this->datos['horCocHoraFin'];
                $_SESSION['horCocFecha'] = $this->datos['horCocFecha'];
                $_SESSION['horCocIdCocinero'] = $this->datos['horCocIdCocinero'];
                
    
                $_SESSION['mensaje'] = "   El código " . $this->datos['horId'] . " ya existe en el sistema.";
    
                header("location:Controlador.php?ruta=mostrarInsertarHorarioCocinero");
            }
        }
        public function cancelarInsertarHorarioCocinero() {  
            session_start();
            $_SESSION['mensaje'] = "Desistió de la insercion";
            header("location:Controlador.php?ruta=listarHorarioCocinero");
        }
    }
?>