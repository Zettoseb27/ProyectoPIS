<?php
     include_once PATH.'modelos/modeloFactura/FacturaDAO.php'; 
     class FacturaControlador{
        private $datos;
        public function __construct($datos) {
           $this->datos = $datos;
           $this->FacturaControlador();
        }
        public function FacturaControlador() {
           switch ($this->datos['ruta']) {
               case 'listarFactura': // provisionalmente para trabajar con datatables
                   $this->listarFactura();
                   break;
           }
        }
        public function listarFactura() {
           $gestarFactura = new FacturaDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
           $registroFactura = $gestarFactura -> seleccionarTodos();
           session_start();
           //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS INPRINA O UTILICE //
           $_SESSION['listarDeFactura'] = $registroFactura;
           header("location:principal.php?contenido=vistas/vistasFactura/listarDTRegistroFactura.php");
        }
     }
?>