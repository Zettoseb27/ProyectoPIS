<?php
     include_once PATH.'controladores/RolControlador.php'; 
     class ControladorPrincipal{
        private $datos = array();
        public function __construct() {
            if (!empty($_POST) && isset($_POST["ruta"])) {
               $this -> datos = $_POST;
            }
            if (!empty($_GET) && isset($_GET["ruta"])) {
                $this -> datos = $_GET;
            }
            $this->control();
        }
        public function control() {
            switch ($this->datos['ruta']) {
                case 'listarRol':
                     $this->listarRol();
                    break;
                case 'actualizarRol':
                    $this->actualizarRol();
                    break;
                case 'confirmaActualizacionRol':
                    $this->confirmaActualizacionRol();
                    break;
            }
        }
        public function listarRol() {
            $RolControlador = new RolControlador ($this->datos);
        }
        public function actualizarRol() {
            $RolControlador = new RolControlador ($this->datos);
        }
        public function confirmaActualizacionRol() {
            $RolControlador = new RolControlador ($this->datos);
        }
     }
?>