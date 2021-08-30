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
         public function listarMesa() {
            $gestarMesa = new MesaDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $registroMesa = $gestarMesa -> seleccionarTodos();
            session_start();
            //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS INPRINA O UTILICE //
            $_SESSION['listarDeMesa'] = $registroMesa;
            header("location:principal.php?contenido=vistas/vistasMesa/listarDTRegistroMesa.php");
         }

        }
?>