<?php
     include_once PATH.'modelos/modeloFactura/FacturaDAO.php'; 
     include_once PATH.'modelos/modeloCodigoMesero/CodigoMeseroDAO.php'; 
     class FacturaControlador{
        private $datos;
        public function __construct($datos) {
           $this->datos = $datos;
           $this->FacturaControlador();
        }
        public function FacturaControlador() {
           switch ($this->datos['ruta']) {
               case 'listarFactura': // provisionalmente para trabajar con datatables
                   $this->listarFactura();
                   break;
               case 'actualizarFactura':
                     $this->actualizarFactura();
                     break;
               case 'confirmaActualizarFactura':
                     $this->confirmaActualizarFactura();
                     break;
           }
        }
        public function listarFactura() {
           $gestarFactura = new FacturaDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
           $registroFactura = $gestarFactura -> seleccionarTodos();
           session_start();
           //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS INPRINA O UTILICE //
           $_SESSION['listarDeFactura'] = $registroFactura;
           header("location:principal.php?contenido=vistas/vistasFactura/listarDTRegistroFactura.php");
        }
        public function actualizarFactura (){
         $gestarFactura = new FacturaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
         $consultaDeFactura =$gestarFactura->seleccionarId(array($this->datos['idAct']));//Se consulta el libro para traer los datos.

         $actualizarDatosFactura = $consultaDeFactura['registroEncontrado'][0];

         /*                 * ****PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON LIBROS******************** */
         $gestarCodigoMesero = new CodigoMeseroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
         $registroCodigoMesero = $gestarCodigoMesero->seleccionarTodos();
         /*                 * ************************************************************************* */
         


         session_start();
         $_SESSION['actualizarDatosFactura'] = $actualizarDatosFactura;
         $_SESSION['registroCodigoMesero'] = $registroCodigoMesero;


         header("location:principal.php?contenido=vistas/vistasFactura/vistaActualizarFactura.php");	

}
     }
?>