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
                case 'eliminarHorarioCocinero':
                    $this->eliminarHorarioCocinero();
                    break;
                case 'actualizarHorarioCocinero':
                    $this->actualizarHorarioCocinero();
                    break;
                case 'confirmaActualizarhorarioHorarioCocinero':  
                    $this->confirmaActualizarhorarioHorarioCocinero(); 
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

        }
?>