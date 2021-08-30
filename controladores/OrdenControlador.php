<?php
     include_once PATH. 'modelos/modeloOrden/OrdenDAO.php';
     class OrdenControlador {
         private $datos;
         public function __construct($datos) {
            $this->datos = $datos;
            $this->OrdenControlador();
         }
         public function OrdenControlador() {
            switch ($this->datos['ruta']) {
                case 'listarOrden': // provisionalmente para trabajar con datatables
                    $this->listarOrden();
                    break;
            }
         }
         public function listarOrden() {
            $gestarOrden = new OrdenDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $registroOrden = $gestarOrden -> seleccionarTodos();
            session_start();
            //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS INPRINA O UTILICE //
            $_SESSION['listaDeOrden'] = $registroOrden;
            header("location:principal.php?contenido=vistas/vistasOrden/listarDTRegistroOrden.php");
         }
     }
?>