<?php
     include_once PATH."controladores/OrdenControlador.php";

     class ControladorPrincipal{
         private $datos = array();
         public function __construct() {
            if (!empty($_POST) && isset($_POST["ruta"])) {
                $this -> datos = $_POST;
            }
            if (!empty($_GET) && isset($_GET["ruta"])) {
                $this -> datos = $_GET;
            }
            $this -> control();
     }
     public function control() {
         switch ($this -> datos["ruta"]) {
             case 'listarOrden':
                 $this -> listarOrden();
                 break;
             case 'actualizarOrden':
                $this -> actualizarOrden();
                break;
             case 'confirmarActualizarOrden':
                $this -> confirmarActualizarOrden();
                break;
         }
     
     }
     public function listarOrden() {
        $OrdenControlador = new OrdenControlador($this->datos);
     }
     public function actualizarOrden() {
        $OrdenControlador = new OrdenControladro($this->datos);
     }
     public function confirmarActualizarOrden() {
        $OrdenControlador = new OrdenControlador($this->datos);
     }
}
?>