<?php
     include_once PATH.'modelos/modeloCodigoMesero/CodigoMeseroDAO.php'; 
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
        }
?>