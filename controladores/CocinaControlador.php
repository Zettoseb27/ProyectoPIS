<?php
    ob_start();
     include_once PATH. 'modelos/modeloCocina/CocinaDAO.php';
     include_once PATH. 'modelos/modeloMenu/MenuDAO.php'; 
     include_once PATH. 'modelos/modelotipoDePlato/tipoDePlatoDAO.php'; 
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
                case 'actualizarCocina':
                     $this->actualizarCocina();  
                     break;
                case 'confirmaActualizarCocina':
                     $this->confirmaActualizarCocina();
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
         public function actualizarCocina() {
            $gestarCocina = new CocinaDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $consultaDeCocina = $gestarCocina ->SeleccionarId(array($this->dato['idAct'])); 
            $actualizarDatosCocina = $consultaDeCocina['registroEncontrado'][0];
         /*                 * ****PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON LIBROS******************** */
            $gestarMenu = new MenuDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
            $registroMenu = $gestarMenu->seleccionarTodos();
         /*                 * ************************************************************************* */

         /*                 * ****PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON LIBROS******************** */
            $gestarTipoDePlato = new tipoDePlatoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
            $registroTipoDePlato = $gestarTipoDePlato->seleccionarTodos();
         /*                 * ************************************************************************* */



            session_start();
            $_SESSION['actualizarDatosCocina'] = $actualizarDatosCocina;
            $_SESSION['registroMenu'] = $registroMenu;
            $_SESSION['registroTipoDePlato'] = $registroTipoDePlato;
            header("location:principal.php?contenido=vistas/vistasCocina/vistaActualizaCocina.php");	
         }
     }
?>
