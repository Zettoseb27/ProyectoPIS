<?php
     include_once PATH.'modelos/modeloCocinero/CocineroDAO.php'; 
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
    
            header("location:principal.php?contenido=vistas/vistasCocinero/vistaActualizarCocinero.php");
         }

    }
?>