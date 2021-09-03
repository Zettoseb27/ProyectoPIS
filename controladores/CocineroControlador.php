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

        }
?>