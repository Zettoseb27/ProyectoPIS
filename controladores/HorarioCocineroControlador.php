<?php
     include_once PATH.'modelos/modeloHorarioCocinero/HorarioCocineroDAO.php'; 
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
                case 'actualizarhorarioCocinero':
                    $this->actualizarhorarioCocinero();
                    break;
                case 'confirmaActualizarhorarioCocinero':  
                    $this->confirmaActualizarhorarioCocinero();
                    break;
                case 'cancelarActualizarhorarioCocinero':  
                    $this->cancelarActualizarhorarioCocinero();
                    break;
                case 'mostrarInsertarhorarioCocinero':  
                    $this->mostrarInsertarhorarioCocinero();
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

        }
?>