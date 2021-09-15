<?php
     include_once PATH. 'controladores/RolControlador.php';
     include_once PATH. 'controladores/OrdenControlador.php'; 
     include_once PATH. 'controladores/TipoPlatoControlador.php'; 
     include_once PATH. 'controladores/PlatoControlador.php'; 
     include_once PATH. 'controladores/MenuControlador.php'; 
     include_once PATH. 'controladores/PersonaControlador.php'; 
     include_once PATH. 'controladores/MesaControlador.php'; 
     include_once PATH. 'controladores/CocinaControlador.php'; 
     include_once PATH. 'controladores/FacturaControlador.php'; 
     include_once PATH. 'controladores/Usuario_sControlador.php'; 
     include_once PATH. 'controladores/CodigoMeseroControlador.php';
     include_once PATH. 'controladores/HorarioControlador.php'; 
     include_once PATH. 'controladores/CocineroControlador.php'; 
     include_once PATH. 'controladores/HorarioCocineroControlador.php'; 
     

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
                case 'eliminarRol':
                   $this->eliminarRol();
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
               case 'insertarRol':  
                    $this->insertarRol();
                    break;
               case "cancelarInsertarRol":
                $this->cancelarInsertarRol(); 
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
                /* ------------- CODIGO MESERO ------- */  
                case 'listarCodigoMesero':
                    $this->listarCodigoMesero();
                   break;
                case 'eliminarCodigoMesero':
                    $this->eliminarCodigoMesero();
                   break;
               case 'actualizarCodigoMesero':
                   $this->actualizarCodigoMesero();
                   break;
               case 'confirmaActualizarCodigoMesero':
                   $this->confirmaActualizarCodigoMesero();
                   break;
               case 'cancelarActualizarCodigoMesero':
                   $this->cancelarActualizarCodigoMesero();  
                   break;
               case 'mostrarInsertarCodigoMesero':
                   $this->mostrarInsertarCodigoMesero();  
                   break;
                /* ------------- HORARIO MESERO ------- */
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
                /* ------------- TIPO DE PLATO ------- */
                case 'listarTipoPlato':
                    $this->listarTipoPlato();
                    break;
                case 'eliminarTipoPlato':
                   $this->eliminarTipoPlato();
                   break;
                case 'ActualizarTipoPlato':
                    $this->ActualizarTipoPlato();   
                    break;
                case 'confirmaActualizarTipoPlato':
                    $this->confirmaActualizarTipoPlato();
                    break;
                case "cancelarActualizarTipoPlato":
                $this->cancelarActualizarTipoPlato();  
                    break;
                case "mostrarInsertarTipoPlato":
                $this->mostrarInsertarTipoPlato(); 
                    break;
                case "insertarTipoPlato":
                $this->insertarTipoPlato(); 
                    break;
                case "cancelarInsertarTipoPlato":
                $this->cancelarInsertarTipoPlato(); 
                    break;		
                /* ------------- PLATO ------- */ 
                case 'listarPlato':
                    $this->listarPlato();  
                    break;
                case 'eliminarPlato':
                    $this->eliminarPlato();
                    break;
                case 'actualizarPlato':
                    $this->actualizarPlato();
                    break;
                case 'confirmaActualizarPlato':
                    $this->confirmaActualizarPlato();
                    break;
                case "cancelarActualizarPlato":
                $this->cancelarActualizarPlato();  
                    break;
                case "mostrarInsertarPlato":
                $this->mostrarInsertarPlato(); 
                    break;
                case "insertarPlato":
                $this->insertarPlato(); 
                    break;
                case "cancelarInsertarPlato": 
                $this->cancelarInsertarPlato(); 
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
                case 'eliminarMesa':
                    $this->eliminarMesa();
                    break;
                case 'actualizarMesa':
                    $this->actualizarMesa();
                    break;
                case 'confirmaActualizarMesa': 
                    $this->confirmaActualizarMesa();  
                    break;
                case "cancelarActualizarMesa":
                $this->cancelarActualizarMesa();  
                    break;
                case "mostr arInsertarMesa":
                $this->mostrarInsertarMesa();  
                    break;
                case "insertarMesa":
                $this->insertarMesa();  
                    break;
                case 'cancelarInsertarMesa':  
                    $this->cancelarInsertarMesa();
                    break;
     
                /* ------------- ORDEN ------- */ 
                case 'listarOrden':
                    $this->listarOrden();
                    break;
                case 'eliminarOrden':
                    $this->eliminarOrden();
                    break;
                case 'actualizarOrden':
                    $this->actualizarOrden();
                    break;
                case 'confirmaActualizarOrden':
                    $this->confirmaActualizarOrden();
                    break;
                case "cancelarActualizarOrden":
                $this->cancelarActualizarOrden();  
                    break;
                /* ---------  FACTURA -------------- */
                case 'listarFactura':
                    $this->listarFactura();
                    break;
                case 'actualizarFactura':
                    $this->actualizarFactura();
                    break;
                case 'confirmaActualizarFactura':
                    $this->confirmaActualizarFactura();
                    break; 
                /* ---------  COCINERO -------------- */
                case 'listarCocinero':
                    $this->listarCocinero();
                    break;
                case 'actualizarCocinero':
                    $this->actualizarCocinero();
                    break;
                case 'confirmaActualizarCocinero':
                    $this->confirmaActualizarCocinero();
                    break;
                /* ---------  HORARIO COCINERO -------------- */
                case 'listarHorarioCocinero':
                    $this->listarHorarioCocinero();
                    break;
                case 'actualizarHorarioCocinero':
                    $this->actualizarHorarioCocinero();
                    break;
                case 'confirmaActualizarHorarioCocinero':
                    $this->confirmaActualizarHorarioCocinero();
                    break;
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
                /* ---------  ACCESO Y REGISTRO-------------- */
                case 'gestionDeRegistro':
                    $this->gestionDeRegistro();
                    break;
                case 'gestionDeAcceso':
                    $this->gestionDeAcceso();  
                    break;
            }
        }
         /* ------------------------- ROL ----------------------------- */
         public function listarRol() {
            $RolControlador = new RolControlador ($this->datos);
        }
        public function eliminarRol() {
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
        public function insertarRol() {
            $RolControlador = new RolControlador ($this->datos);
        }
        public function cancelarInsertarRol() {
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
        /* ------------------------- CODIGO MESERO  ----------------------------- */ 
         public function listarCodigoMesero() {
            $CodigoMeseroControlador = new CodigoMeseroControlador ($this->datos);
        }
        public function eliminarCodigoMesero() {
            $CodigoMeseroControlador = new CodigoMeseroControlador ($this->datos);
        }
        public function actualizarCodigoMesero() {
            $CodigoMeseroControlador = new CodigoMeseroControlador ($this->datos);
        }
        public function confirmaActualizarCodigoMesero() {
            $CodigoMeseroControlador = new CodigoMeseroControlador ($this->datos);
        }
        public function cancelarActualizarCodigoMesero() {
            $CodigoMeseroControlador = new CodigoMeseroControlador ($this->datos);
        }
        public function mostrarInsertarCodigoMesero() {
            $CodigoMeseroControlador = new CodigoMeseroControlador ($this->datos);
        }
        /* ------------------------- HORARIO  ----------------------------- */
         public function listarHorario() {
            $HorarioControlador = new HorarioControlador ($this->datos);
        }
        public function actualizarHorario() {
            $HorarioControlador = new HorarioControlador ($this->datos);
        }
        public function confirmaActualizarHorario() {
            $HorarioControlador = new HorarioControlador ($this->datos);
        }
        public function cancelarActualizarHorario() {
            $HorarioControlador = new HorarioControlador ($this->datos);
        }
        public function mostrarInsertarHorario() {
            $HorarioControlador = new HorarioControlador ($this->datos);
        }
         /* ------------------------- TIPO DE PLATO ----------------------------- */
        public function listarTipoPlato() {
            $TipoPlatoControlador = new TipoPlatoControlador($this->datos); 
        }
        public function eliminarTipoPlato() {
            $TipoPlatoControlador = new TipoPlatoControlador($this->datos); 
        }
        public function ActualizarTipoPlato() {
            $TipoPlatoControlador = new TipoPlatoControlador($this->datos); 
        }
        public function confirmaActualizarTipoPlato() {
            $TipoPlatoControlador = new TipoPlatoControlador($this->datos); 
        }
        public function cancelarActualizarTipoPlato() {  
            $TipoPlatoControlador = new TipoPlatoControlador($this->datos);  
        }
        public function mostrarInsertarTipoPlato() { 
            $TipoPlatoControlador = new TipoPlatoControlador($this->datos); 
        }
        public function insertarTipoPlato() {  
            $TipoPlatoControlador = new TipoPlatoControlador($this->datos); 
        }
        public function cancelarInsertarTipoPlato() {  
            $TipoPlatoControlador = new TipoPlatoControlador($this->datos); 
        }
         /* ------------------------- PLATO ----------------------------- */ 
        public function listarPlato() {
            $PlatoControlador = new PlatoControlador($this->datos); 
        }
        public function eliminarPlato() {
            $PlatoControlador = new PlatoControlador($this->datos); 
        }
        public function actualizarPlato() {
            $PlatoControlador = new PlatoControlador ($this->datos); 
        }
        public function confirmaActualizarPlato() {
            $PlatoControlador = new PlatoControlador ($this->datos);
        }
        public function cancelarActualizarPlato() {
            $PlatoControlador = new PlatoControlador ($this->datos);
        }
        public function mostrarInsertarPlato() { 
            $PlatoControlador = new PlatoControlador($this->datos); 
        }
        public function insertarPlato() {  
            $PlatoControlador = new PlatoControlador($this->datos); 
        }
        public function cancelarInsertarPlato() {  
            $PlatoControlador = new PlatoControlador($this->datos); 
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
        public function eliminarMesa() {
            $MesaControlador = new MesaControlador ($this->datos);
        }
        public function actualizarMesa() {
            $MesaControlador = new MesaControlador ($this->datos);
        }
        public function confirmaActualizarMesa() {
            $MesaControlador = new MesaControlador ($this->datos); 
        }
        public function cancelarActualizarMesa() {
            $MesaControlador = new MesaControlador ($this->datos); 
        }
        public function mostrarInsertarMesa() {  
            $MesaControlador = new MesaControlador ($this->datos);
        }
        public function insertarMesa() {
            $MesaControlador = new MesaControlador ($this->datos);
        }
        public function cancelarInsertarMesa() {
            $MesaControlador = new MesaControlador ($this->datos);
        }
         /* ------------------------- ORDEN ----------------------------- */ 
        public function listarOrden() {
            $OrdenControlador = new OrdenControlador ($this->datos);
        }
        public function eliminarOrden() {
            $OrdenControlador = new OrdenControlador ($this->datos);
        }
        public function actualizarOrden() {
            $OrdenControlador = new OrdenControlador ($this->datos);
        }
        public function confirmaActualizarOrden() {
            $OrdenControlador = new OrdenControlador ($this->datos);
        }
        public function cancelarActualizarOrden() {
            $OrdenControlador = new OrdenControlador ($this->datos); 
        }
        /* ------------------------- FACTURA ----------------------------- */
        public function listarFactura() {
            $FacturaControlador = new FacturaControlador($this->datos); 
        }
        public function actualizarFactura() {
            $FacturaControlador = new FacturaControlador ($this->datos);
        }
        public function confirmaActualizarFactura() {
            $FacturaControlador = new FacturaControlador ($this->datos);
        }
        /* ------------------------- HCOCINERO ----------------------------- */
        public function listarCocinero() {
            $CocineroControlador = new CocineroControlador($this->datos); 
        }
        public function actualizarCocinero() { 
            $CocineroControlador = new CocineroControlador ($this->datos);
        }
        public function confirmaActualizarCocinero() {
            $CocineroControlador = new CocineroControlador ($this->datos);
        } 
        /* ------------------------- HORARIO COCINERO ----------------------------- */
        public function listarHorarioCocinero() {
            $HorarioCocineroControlador = new HorarioCocineroControlador($this->datos); 
        }
        public function actualizarHorarioCocinero() { 
            $HorarioCocineroControlador = new HorarioCocineroControlador ($this->datos);
        }
        public function confirmaActualizarHorarioCocinero() {
            $HorarioCocineroControlador = new HorarioCocineroControlador ($this->datos);
        }   
        /* ------------------------- COCINA ----------------------------- */
        public function listarCocina() {
            $CocinaControlador = new CocinaControlador($this->datos); 
        }
        public function actualizarCocina() { 
            $CocinaControlador = new CocinaControlador ($this->datos);
        }
        public function confirmaActualizarCocina() {
            $CocinaControlador = new CocinaControlador ($this->datos);
        }
        /* ------------------------- ACCESO Y REGISTRO  ----------------------------- */
        public function gestionDeRegistro() {
            $usuario_sControlador = new Usuario_sControlador($this->datos); 
        }
        public function gestionDeAcceso() { 
            $usuario_sControlador = new Usuario_sControlador($this->datos);  
        }
     }
?>