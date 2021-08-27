<?php
     include_once PATH.'modelos/modeloRol/RolDAO.php'; 
     class RolControlador{
         private $datos;
         public function __construct($datos) {
            $this->datos = $datos;
            $this->RolControlador();
         }
         public function RolControlador() {
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
            $gestarRol = new RolDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $registroRol = $gestarRol -> seleccionarTodos();
            session_start();
            $_SESSION['listaDeRol'] = $registroRol;
            header("location:principal.php?contenido=vistas/vistasRol/listarDTRegistroRol.php");
         }
         public function actualizarRol() {
            $gestarRol = new RolDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $consultaDeRol = $gestarRol -> seleccionarId(array($this->datos['idAct'])); // Se consulta el libro para modificar los datos
            $actualizarDatosRol = $consultaDeRol['registroEncontrado'][0];
            session_start();
            $_SESSION['actualizarDatosRol'] = $actualizarDatosRol;
            header("location:principal.php?contenido=vistas/vistasRol/vistaActualizarRol.php");
            
         }
         public function confirmaActualizarRol() {
            $gestarRol = new RolDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $actualizarRol = $gestarRol -> actualizar(array($this->datos));
            session_start();
            $_SESSION['mensaje'] = "Actualizacion realizada";
            header("location:Controlador.php?ruta=listarRol");
         }
         public function cancelarActualizarRol() {
            session_start();
            $_SESSION['mensaje'] = "Desistio de la actualizacion";
            header("location:Controlador.php?ruta=listarRol");
         }
         public function mostrarInsertarRol() {
            
            $gestarRol = new RolDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $registroRol = $gestarRol -> seleccionarId();
            session_start();
            $_SESSION['registroRol'] = $registroRol;
            $registroRol = null;
            header("location:principal.php?contenido=vistas/vistasRol/vistaInsertarRol.php");
         }
     }

?>