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

    }
?>