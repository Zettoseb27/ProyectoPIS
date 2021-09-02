<?php
     include_once PATH. 'modelos/modeloCocina/CocinaDAO.php';
     class CocinaControlador {
         private $datos;
         public function __construct($datos) {
            $this->datos = $datos;
            $this->CocinaControlador();
         }
         public function CocinaControlador() {
            switch ($this->datos['ruta']) {
                case 'listarCocina': // provisionalmente para trabajar con datatables
                    $this->listarCocina();
                    break;
            }
         }
         public function listarCocina() {
            $gestarCocina = new CocinaDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $registroCocina = $gestarCocina -> seleccionarTodos();
            session_start();
            //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS INPRINA O UTILICE //
            $_SESSION['listarDeCocina'] = $registroCocina;
            header("location:principal.php?contenido=vistas/vistasCocina/listarDTRegistroCocina.php");
         }
     }
?>