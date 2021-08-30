<?php
     include_once PATH. 'modelos/modeloPersona/PersonaDAO.php';
     class PersonaControlador {
         private $datos;
         public function __construct($datos) {
            $this->datos = $datos;
            $this->PersonaControlador();
         }
         public function PersonaControlador() {
            switch ($this->datos['ruta']) {
                case 'listarPersona': // provisionalmente para trabajar con datatables
                    $this->listarPersona();
                    break;
            }
         }
         public function listarPersona() {
            $gestarPersona = new PersonaDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $registroPersona = $gestarPersona -> seleccionarTodos();
            session_start();
            //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS INPRINA O UTILICE //
            $_SESSION['listarDePersona'] = $registroPersona;
            header("location:principal.php?contenido=vistas/vistasPersona/listarDTRegistroPersona.php");
         }
     }
?>