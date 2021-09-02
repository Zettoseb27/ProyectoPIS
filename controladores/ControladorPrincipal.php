<?php
     include_once PATH.'controladores/RolControlador.php';
     include_once PATH.'controladores/OrdenControlador.php'; 
     include_once PATH.'controladores/TipoPlatoControlador.php'; 
     include_once PATH.'controladores/PlatoControlador.php'; 
     include_once PATH.'controladores/MenuControlador.php'; 
     include_once PATH.'controladores/PersonaControlador.php'; 
     include_once PATH.'controladores/MesaControlador.php'; 
     include_once PATH.'controladores/CocinaControlador.php'; 
    // include_once PATH. 'controladores/FacturaControlador.php'; 

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
                /* ------------- PERSONA ------- */
                case 'listarPersona':
                    $this->listarPersona();
                   break;
               case 'actualizarPersona':
                   $this->actualizarPersona();
                   break;
               case 'confirmaActualizarPersona':
                   $this->confirmaActualizarPersona();
                   break;
               case 'cancelarActualizarPersona':
                   $this->cancelarActualizarPersona();  
                   break;
               case 'mostrarInsertarPersona':
                   $this->mostrarInsertarPersona();  
                   break;
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
                /* ---------  MESA -------------- */
                case 'listarMesa':
                    $this->listarMesa();
                    break;
                case 'actualizarMesa':
                    $this->actualizarMesa();
                    break;
                case 'confirmaActualizarMesa':
                    $this->confirmaActualizarMesa();
                    break;
                /* ------------- ORDEN ------- */
                case 'listarOrden':
                    $this->listarOrden();
                    break;
                /* ---------  FACTURA -------------- */
                /* case 'listarFactura':
                    $this->listarFactura();
                    break;
                case 'actualizarFactura':
                    $this->actualizarFactura();
                    break;
                case 'confirmaActualizarFactura':
                    $this->confirmaActualizarFactura();
                    break; */
                /* ---------  COCINA -------------- */
                case 'listarCocina':
                    $this->listarCocina();
                    break;
                case 'actualizarCocina':
                    $this->actualizarCocina();
                    break;
                case 'confirmaActualizarCocina':
                    $this->confirmaActualizarCocina();
                    break;
            }
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
         /* ------------------------- PERSONA  ----------------------------- */
         public function listarPersona() {
            $PersonaControlador = new PersonaControlador ($this->datos);
        }
        public function actualizarPersona() {
            $PersonaControlador = new PersonaControlador ($this->datos);
        }
        public function confirmaActualizarPersona() {
            $PersonaControlador = new PersonaControlador ($this->datos);
        }
        public function cancelarActualizarPersona() {
            $PersonaControlador = new PersonaControlador ($this->datos);
        }
        public function mostrarInsertarPersona() {
            $PersonaControlador = new PersonaControlador ($this->datos);
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
        /* ------------------------- MESA ----------------------------- */
        public function listarMesa() {
            $MesaControlador = new MesaControlador($this->datos); 
        }
        public function actualizarMesa() {
            $MesaControlador = new MesaControlador ($this->datos);
        }
        public function confirmaActualizarMesa() {
            $MesaControlador = new MesaControlador ($this->datos);
        }
         /* ------------------------- ORDEN ----------------------------- */
        public function listarOrden() {
            $OrdenControlador = new OrdenControlador ($this->datos);
        } 
        /* ------------------------- FACTURA ----------------------------- */
       /* public function listarFactura() {
            $FacturaControlador = new FacturaControlador($this->datos); 
        }
        public function actualizarFactura() {
            $FacturaControlador = new FacturaControlador ($this->datos);
        }
        public function confirmaActualizarFactura() {
            $FacturaControlador = new FacturaControlador ($this->datos);
        }    */
        /* ------------------------- MESA ----------------------------- */
        public function listarCocina() {
            $CocinaControlador = new CocinaControlador($this->datos); 
        }
        public function actualizarCocina() {
            $CocinaControlador = new CocinaControlador ($this->datos);
        }
        public function confirmaActualizarCocina() {
            $CocinaControlador = new CocinaControlador ($this->datos);
        }
     }
?>