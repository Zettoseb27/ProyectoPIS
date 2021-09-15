<?php
     include_once PATH.'modelos/modeloMesa/MesaDAO.php'; 
     class MesaControlador{
         private $datos;
         public function __construct($datos) {
            $this->datos = $datos;
            $this->MesaControlador();
         }
         public function MesaControlador() {
            switch ($this->datos['ruta']) {
                case 'listarMesa':
                    $this->listarMesa();
                    break;
                case 'eliminarMesa':
                    $this->eliminarMesa();
                    break;
                case 'actualizarMesa': 
                    $this->actualizarMesa();
                    break;
                case 'confirmaActualizarMesa':  
                    $this->confirmaActualizarMesa();
                    break;
                case 'cancelarActualizarMesa':  
                    $this->cancelarActualizarMesa();
                    break;
                case 'mostrarInsertarMesa':  
                    $this->mostrarInsertarMesa(); 
                    break;
                case 'insertarMesa':  
                    $this->insertarMesa();
                    break;
                case 'cancelarInsertarMesa':  
                    $this->cancelarInsertarMesa();
                    break;
            }
         }
         public function listarMesa() {
            $gestarMesa = new MesaDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $registroMesa = $gestarMesa -> seleccionarTodos();
            session_start();
            //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS INPRINA O UTILICE //
            $_SESSION['listarDeMesa'] = $registroMesa;
            header("location:principal.php?contenido=vistas/vistasMesa/listarDTRegistroMesa.php");
         }
         public function eliminarMesa() {
            $EliminarRol = new MesaDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $EliminarDeRol = $EliminarRol -> Eliminar(array($this->datos['idAct'])); // Se consulta el libro para modificar los datos
            $actualizarDatosRol = $EliminarDeRol['registroEncontrado'][0];
            session_start();
            $_SESSION['mensaje'] = "Eliminación realizada."; 
            header("location:Controlador.php?ruta=listarMesa");
         }
         public function actualizarMesa() {
            $gestarMesa = new MesaDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $consultarDeMesa = $gestarMesa -> seleccionarId(array($this->datos['idAct']));
            $actualizarDatosMesa = $consultarDeMesa['registroEncontrado'][0];
            session_start();
            $_SESSION['actualizarDatosMesa'] = $actualizarDatosMesa;
            header("location:principal.php?contenido=vistas/vistasMesa/vistaActualizarMesa.php");
         }
         public function confirmaActualizarMesa() {
            $gestarPlato = new MesaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
            $actualizarMesa = $gestarPlato->actualizar(array($this->datos)); //Se envía datos del libro para actualizar. 				
    
            session_start();
            $_SESSION['mensaje'] = "Actualización realizada.";
            header("location:Controlador.php?ruta=listarMesa");
        }
        public function cancelarActualizarMesa() {
            session_start();
            $_SESSION['mensaje'] = "Desistió de la actualización";
            header("location:Controlador.php?ruta=listarMesa");
        }
        public function mostrarInsertarMesa() {
            /*         * ****PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON LIBROS******************** */
            $gestarCategoriaLibros = new MesaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
            $registroTipoPlato = $gestarCategoriaLibros->seleccionarTodos();
            /*         * ************************************************************************* */
    
            session_start();
            $_SESSION['registroTipoPlato'] = $registroTipoPlato;
            $registroTipoPlato = null;
    
            header("Location: principal.php?contenido=vistas/vistasMesa/vistaInsertarMesa.php");
        }
        public function insertarMesa() {

            //Se instancia MesaDAO para insertar
            $buscarMesa = new MesaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
            //Se consulta si existe ya el registro
            $MesaHallado = $buscarMesa->seleccionarId(array($this->datos['mesId']));
            //Si no existe el libro en la base se procede a insertar ****  		
            if (!$MesaHallado['exitoSeleccionId']) {
                $insertarMesa = new MesaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
                $insertoMesa = $insertarMesa->insertar($this->datos);  //inserción de los campos en la tabla libros 
    
                $resultadoInsercionMesa = $insertoMesa['resultado'];  //Traer el id con que quedó el libro de lo contrario la excepción o fallo  
    
                session_start();
                $_SESSION['mensaje'] = "Registrado " . $this->datos['mesId'] . " con éxito.";
    
                header("location:Controlador.php?ruta=listarMesa");
            } else {// Si existe se retornan los datos y se envía el mensaje correspondiente ****
                session_start();
                $_SESSION['mesId'] = $this->datos['mesId'];
                $_SESSION['mesNumeroMesa'] = $this->datos['mesNumeroMesa'];
                $_SESSION['mesCantidadComensales'] = $this->datos['mesCantidadComensales'];
                $_SESSION['mensaje'] = "   El código " . $this->datos['mesId'] . " ya existe en el sistema.";
    
                header("location:Controlador.php?ruta=mostrarInsertarMesa");
            }
        }
        public function cancelarInsertarMesa() {
            session_start();
            $_SESSION['mensaje'] = "Desistió de la insercion";
            header("location:Controlador.php?ruta=listarMesa");
        }
    

    }
?>