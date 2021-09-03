<?php
     include_once PATH.'modelos/modeloHorario/HorarioDAO.php'; 
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

        }
?>