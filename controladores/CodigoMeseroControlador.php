<?php
     include_once PATH.'modelos/modeloCodigoMesero/CodigoMeseroDAO.php'; 
     include_once PATH.'modelos/modeloPersona/PersonaDAO.php'; 
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
                case 'actualizarCodigoMesero':
                    $this->actualizarCodigoMesero();
                    break;
                case 'confirmaActualizarCodigoMesero':  
                    $this->confirmaActualizarCodigoMesero();
                    break;
                case 'cancelarActualizarCodigoMesero':  
                    $this->cancelarActualizarCodigoMesero();
                    break;
                case 'mostrarInsertarCodigoMesero':  
                    $this->mostrarInsertarCodigoMesero();
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
         public function actualizarCodigoMesero() {
            // echo _line_." "._file_."<br/"; exit;
            $gestarCodigoMesero = new CodigoMeseroDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $consultaDeCodigoMesero = $gestarCodigoMesero -> seleccionarId(array($this->datos['idAct']));
            $actualizarDatosCodigoMesero = $consultaDeCodigoMesero['registroEncontrado'][0];
            /*         * ****PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON LIBROS******************** */
            $gestarCategoriaLibros = new PersonaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
            $registroPersona = $gestarCategoriaLibros->seleccionarTodos();
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
    }
?>