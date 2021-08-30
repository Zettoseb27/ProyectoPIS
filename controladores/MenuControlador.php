<?php
     include_once PATH. 'modelos/modeloMenu/MenuDAO.php';
     class MenuControlador {
         private $datos;
         public function __construct($datos) {
            $this->datos = $datos;
            $this->MenuControlador();
         }
         public function MenuControlador() {
            switch ($this->datos['ruta']) {
                case 'listarMenu': // provisionalmente para trabajar con datatables
                    $this->listarMenu();
                    break;
            }
         }
         public function listarMenu() {
            $gestarMenu = new MenuDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $registroMenu = $gestarMenu -> seleccionarTodos();
            session_start();
            //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS INPRINA O UTILICE //
            $_SESSION['listarDeMenu'] = $registroMenu;
            header("location:principal.php?contenido=vistas/vistasMenu/listarDTRegistroMenu.php");
         }
     }
?>