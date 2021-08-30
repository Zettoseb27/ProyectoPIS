<?php
     include_once PATH.'modelos/modeloPlato/PlatoDAO.php'; 
     include_once PATH.'modelos/modelotipoDePlato/tipoDePlatoDAO.php'; 
     class PlatoControlador{
         private $datos;
         public function __construct($datos) {
            $this->datos=$datos;
            $this->PlatoControlador();
         }
         public function PlatoControlador() {
            switch ($this->datos['ruta']) {
                case 'listarPlato':
                    $this->listarPlato();
                    break;
                case 'actualizarPlato':
                    $this->actualizarPlato();
                    break;
                case 'confirmaActualizarPlato':  
                    $this->confirmaActualizarPlato();
                    break;
            }
         }
         public function listarPlato() {
            $gestarPlato = new PlatoDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $registroPlato = $gestarPlato -> seleccionarTodos();
            session_start();
            $_SESSION['listaDePlato'] = $registroPlato;
            header("location:principal.php?contenido=vistas/vistasPlato/listarDTRegistroPlato.php");
         }
         public function actualizarPlato() {
            $gestarPlato = new PlatoDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $consultarDePlato = $gestarPlato -> seleccionarId(array($this->datos['idAct']));
            $actualizarDatosPlato = $consultarDePlato['registroEncontrado'][0];
            /* *****PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON LIBROS***************** */
            $gestarTipoPlato = new tipoDePlatoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
            $registroTipoPlato = $gestarTipoPlato->seleccionarTodos();
            /*     ************************************************************ */
            session_start();
            $_SESSION['actualizarDatosPlato'] = $actualizarDatosPlato;
            $_SESSION['registroTipoPlato'] = $registroTipoPlato;
            header("location:principal.php?contenido=vistas/vistasPlato/vistaActualizarPlato.php");
         }
     }
?>