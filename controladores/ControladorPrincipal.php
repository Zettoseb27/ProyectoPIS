<?php
     include_once PATH.'controladores/RolControlador.php';
     include_once PATH.'controladores/OrdenControlador.php'; 
     include_once PATH.'controladores/TipoPlatoControlador.php'; 
     include_once PATH.'controladores/PlatoControlador.php'; 
     include_once PATH.'controladores/MenuControlador.php'; 
     include_once PATH.'controladores/PersonaControlador.php'; 
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
                /* ------------- TIPO DE PLATO ------- */
                case 'listarTipoPlato':
                    $this->listarTipoPlato();
                    break;
                case 'actualizarTipoPlato':
                    $this->actualizarTipoPlato();
                    break;
                case 'confirmaActualizarTipoPlato':
                    $this->confirmaActualizarTipoPlato();
                    break;
                /* ------------- PLATO ------- */
                case 'listarPlato':
                    $this->listarPlato();
                    break;
                case 'actualizarPlato':
                    $this->actualizarPlato();
                    break;
                case 'confirmaActualizarPlato':
                    $this->confirmaActualizarPlato();
                    break;
                /* ------------- MENU ------- */
                case 'listarMenu':
                    $this->listarMenu();
                    break;
                case 'actualizarMenu':
                    $this->actualizarMenu();
                    break;
                case 'confirmaActualizarMenu':
                    $this->confirmaActualizarMenu();
                    break;
                /* ------------- TIPO DE ORDEN ------- */
                case 'listarOrden':
                    $this->listarOrden();
                    break;
                /* ------------- ROL ------- */
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
         /* ------------------------- TIPO DE PLATO ----------------------------- */
        public function listarTipoPlato() {
            $TipoPlatoControlador = new TipoPlatoControlador($this->datos); 
        }
        public function actualizarTipoPlato() {
            $TipoPlatoControlador = new TipoPlatoControlador($this->datos); 
        }
        public function confirmaActualizarTipoPlato() {
            $TipoPlatoControlador = new TipoPlatoControlador($this->datos); 
        }
         /* ------------------------- PLATO ----------------------------- */
        public function listarPlato() {
            $PlatoControlador = new PlatoControlador($this->datos); 
        }
        public function actualizarPlato() {
            $PlatoControlador = new PlatoControlador ($this->datos);
        }
        public function confirmaActualizarPlato() {
            $PlatoControlador = new PlatoControlador ($this->datos);
        }
         /* ------------------------- MENU ----------------------------- */
        public function listarMenu() {
            $MenuControlador = new MenuControlador($this->datos); 
        }
        public function actualizarMenu() {
            $MenuControlador = new MenuControlador ($this->datos);
        }
        public function confirmaActualizarMenu() {
            $MenuControlador = new MenuControlador ($this->datos);
        }
         /* ------------------------- ORDEN ----------------------------- */
        public function listarOrden() {
            $OrdenControlador = new OrdenControlador ($this->datos);
        }
         /* ------------------------- ROL ----------------------------- */
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
            $RolControlador = new RolControlador ($this->datos);
        }
        
     }
?>