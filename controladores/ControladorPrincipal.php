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
                case 'confirmaActualizarRol':
                    $this->confirmaActualizarRol();
                    break;
                case 'cancelarActualizarRol':
                    $this->cancelarActualizarRol();  
                    break;
                case 'mostrarInsertarRol':
                    $this->mostrarInsertarRol();  
                    break;
            }
        }
        public function listarRol() {
            $RolControlador = new RolControlador ($this->datos);
        }
        public function actualizarRol() {
            $RolControlador = new RolControlador ($this->datos);
        }
        public function confirmaActualizarRol() {
            $RolControlador = new RolControlador ($this->datos);
        }
        public function cancelarActualizarRol() {
            $RolControlador = new RolControlador ($this->datos);
        }
        public function mostrarInsertarRol() {
            echo __LINE__." ".__CLASS__." ".__LINE__."<br/>"; exit();
            $RolControlador = new RolControlador ($this->datos);
        }
        
     }
?>