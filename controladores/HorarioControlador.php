<?php
     include_once PATH.'modelos/modeloHorario/HorarioDAO.php';
     include_once PATH.'modelos/modeloCodigoMesero/CodigoMeseroDAO.php';  
     class HorarioControlador{
         private $datos;
         public function __construct($datos) {
            $this->datos = $datos;
            $this->HorarioControlador();
         }
         public function HorarioControlador() {
            switch ($this->datos['ruta']) {
                case 'listarHorario':
                    $this->listarHorario();
                    break;
                case 'eliminarHorario':
                    $this->eliminarHorario();
                case 'actualizarHorario':
                    $this->actualizarHorario();
                    break;
                case 'confirmaActualizarHorario':  
                    $this->confirmaActualizarHorario();
                    break;
                case 'cancelarActualizarHorario':  
                    $this->cancelarActualizarHorario();
                    break;
                case 'mostrarInsertarHorario':  
                    $this->mostrarInsertarHorario();
                    break;
                case 'insertarHorario':  
                    $this->insertarHorario();
                    break;
               case "cancelarInsertarHorario":
                $this->cancelarInsertarHorario(); 
                    break;  
            }
         }
         public function listarHorario() {
            $gestarHorario = new HorarioDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $registroHorario = $gestarHorario -> seleccionarTodos();
            session_start();
            //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS INPRINA O UTILICE //
            $_SESSION['listarDeHorario'] = $registroHorario;
            header("location:principal.php?contenido=vistas/vistasHorario/listarDTRegistroHorario.php");
         }
         public function eliminarHorario() {
            $EliminarPlato = new HorarioDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $EliminarDeRol = $EliminarPlato -> eliminar(array($this->datos['idAct'])); // Se consulta el libro para modificar los datos
            $actualizarDatosRol = $EliminarDeRol['registroEncontrado'][0];
            session_start();
            $_SESSION['mensaje'] = "Eliminación realizada."; 
            header("location:Controlador.php?ruta=listarHorario");
         }
         public function actualizarHorario() {
            $gestarHorario = new HorarioDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $consultarHorario = $gestarHorario -> seleccionarId(array($this->datos['idAct']));
            $actualizarDatosHorario = $consultarHorario['registroEncontrado'][0];
            /*         * ****PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON LIBROS******************** */
            $gestarCodigoMesero = new CodigoMeseroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
            $registroCodigoMesero = $gestarCodigoMesero->seleccionarTodos();
            /*         * ************************************************************************* */

            session_start();
            $_SESSION['actualizarDatosHorario'] = $actualizarDatosHorario;
            $_SESSION['registroCodigoMesero'] = $registroCodigoMesero;
            header("location:principal.php?contenido=vistas/vistasHorario/vistaActualizarHorario.php");
         }
         public function confirmaActualizarHorario() { 
            $gestarHorario = new HorarioDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
            $actualizarHorario = $gestarHorario->actualizar(array($this->datos)); //Se envía datos del libro para actualizar. 				
    
            session_start();
            $_SESSION['mensaje'] = "Actualización realizada.";
            header("location:Controlador.php?ruta=listarHorario");
        }
        public function mostrarInsertarHorario() {
            /*         * ****PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON LIBROS******************** */
            $gestarCodigoMesero = new CodigoMeseroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
            $registroHorario = $gestarCodigoMesero->seleccionarTodos();
            /*         * ************************************************************************* */
    
            session_start();
            $_SESSION['registroHorario'] = $registroHorario;
            $registroHorario = null;
    
            header("Location:principal.php?contenido=vistas/vistasHorario/vistaInsertarHorario.php");
        }
        public function insertarHorario() { 

            //Se instancia HorarioDAO para insertar
            $buscarHorario = new HorarioDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
            //Se consulta si existe ya el registro
            $HorarioHallado = $buscarHorario->seleccionarId(array($this->datos['horId']));
            //Si no existe el libro en la base se procede a insertar ****  		
            if (!$HorarioHallado['exitoSeleccionId']) {
                $insertarHorario = new HorarioDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
                $insertoHorario = $insertarHorario->insertar($this->datos);  //inserción de los campos en la tabla libros 
    
                $resultadoInsercionHorario = $insertoHorario['resultado'];  //Traer el id con que quedó el libro de lo contrario la excepción o fallo  
    
                session_start();
                $_SESSION['mensaje'] = "Registrado " . $this->datos['horId'] . " con éxito.";
    
                header("location:Controlador.php?ruta=listarHorario");
            } else {// Si existe se retornan los datos y se envía el mensaje correspondiente ****
                session_start();
                $_SESSION['horId'] = $this->datos['horId'];
                $_SESSION['horHoraInicio'] = $this->datos['horHoraInicio'];
                $_SESSION['horHoraFin'] = $this->datos['horHoraFin'];
                $_SESSION['horFecha'] = $this->datos['horFecha'];
                $_SESSION['horObservacion'] = $this->datos['horObservacion'];
                $_SESSION['horIdCodigoMesero'] = $this->datos['horIdCodigoMesero'];
                
    
                $_SESSION['mensaje'] = "   El código " . $this->datos['horId'] . " ya existe en el sistema.";
    
                header("location:Controlador.php?ruta=mostrarInsertarHorario");
            }
        }
        public function cancelarInsertarHorario() {
            session_start();
            $_SESSION['mensaje'] = "Desistió de la insercion";
            header("location:Controlador.php?ruta=listarHorario");
        }

    }
?>