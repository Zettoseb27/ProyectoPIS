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

     }

?>