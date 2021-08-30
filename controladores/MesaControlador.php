<?php
     include_once PATH.'modelos/modeloMesa/MesaDAO.php'; 
     class MesaControlador{
         private $datos;
         public function __construct($datos) {
            $this->datos = $datos;
            $this->MesaControlador();
         }
         public function RolControlador() {
            switch ($this->datos['ruta']) {
                case 'listarMesa':
                    $this->listarMesa();
                    break;
                case 'actualizarMesa':
                    $this->actualizarMesa();
                    break;
                case 'confirmaActualizarMesa':  
                    $this->confirmaActualizarMesa();
                    break;
                case 'cancelarActualizarMesa':  
                    $this->cancelarActualizarMesa();
                    break;
                case 'mostrarInsertarMesa':  
                    $this->mostrarInsertarMesa();
                    break;
            }
         }
    

?>