<?php
     include_once PATH.'modelos/modelotipoDePlato/tipoDePlatoDAO.php'; 
     class TipoPlatoControlador{
         private $datos;
         public function __construct($datos) {
             $this->datos = $datos;
             $this->TipoPlatoControlador();
         }
         public function TipoPlatoControlador() {
            switch ($this->datos['ruta']) {
                case 'listarTipoPlato':
                    $this->listarTipoPlato();
                    break;
                case 'actualizarTipoPlato':
                    $this->actualizarTipoPlato();
                    break;
                case 'confirmaActualizarTipoPlato':  
                    $this->confirmaActualizarTipoPlato();
                    break;
            }
         }
         public function listarTipoPlato() {
            $gestarTipoPlato = new tipoDePlatoDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $registroTipoPlato = $gestarTipoPlato -> seleccionarTodos();
            session_start();
            $_SESSION['listarTipoPlato'] = $registroTipoPlato;
            header("location:principal.php?contenido=vistas/vistasTipoPlato/listarDTRegistroTipoPlato.php");
         }
         public function actualizarTipoPlato() {
            $gestarTipoPlato = new tipoDePlatoDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $consultaDeTipoPlato = $gestarTipoPlato -> seleccionarId(array($this->datos['idAct'])); // Se consulta el libro para modificar los datos
            $actualizarDatosTipoPlato = $consultaDeTipoPlato['registroEncontrado'][0];
            session_start();
            $_SESSION['actualizarDatosTipoPlato'] = $actualizarDatosTipoPlato;
            header("location:principal.php?contenido=vistas/vistasTipoPlato/vistaActualizarTipoPlato.php");
         }
     }
?>