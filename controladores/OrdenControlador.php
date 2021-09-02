<?php
     include_once PATH. 'modelos/modeloOrden/OrdenDAO.php';
     include_once PATH. 'modelos/modeloMenu/MenuDAO.php'; 
     include_once PATH. 'modelos/modeloMesa/MesaDAO.php'; 
     include_once PATH. 'modelos/modeloPlato/PlatoDAO.php'; 
     include_once PATH. 'modelos/modelotipoDePlato/tipoDePlatoDAO.php'; 
     class OrdenControlador {
         private $datos;
         public function __construct($datos) {
            $this->datos = $datos;
            $this->OrdenControlador();
         }
         public function OrdenControlador() {
            switch ($this->datos['ruta']) {
                case 'listarOrden': // provisionalmente para trabajar con datatables
                    $this->listarOrden();
                     break;
               case "actualizarOrden": //provisionalmente para trabajar con datatables
                  $this->actualizarOrden();
                  break;
               case "confirmaActualizarOrden": //provisionalmente para trabajar con datatables
                  $this->confirmaActualizarOrden();
                  break;
               case "cancelarActualizarOrden": //provisionalmente para trabajar con datatables
                  $this->cancelarActualizarOrden();
                  break;
               case "mostrarInsertarLOrden": //provisionalmente para trabajar con datatables

                  $this->mostrarInsertarLOrden();
                  break;

               case "insertarLibro": //provisionalmente para trabajar con datatables

                  $this->insertarLibro();
                  break;
            }
         }
         public function listarOrden() {
            $gestarOrden = new OrdenDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $registroOrden = $gestarOrden -> seleccionarTodos();
            session_start();
            //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS INPRINA O UTILICE //
            $_SESSION['listaDeOrden'] = $registroOrden;
            header("location:principal.php?contenido=vistas/vistasOrden/listarDTRegistroOrden.php");
         }
         public function actualizarOrden() {
            $gestarOrden = new OrdenDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
            $consultaDeOrden = $gestarOrden->seleccionarId(array($this->datos['idAct']));
            $actualizarDatosOrden = $consultaDeOrden['registroEncontrado'][0]; 

            $gestarMenu = new MenuDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD); 
            $registroMenu = $gestarMenu->seleccionarTodos();

            $gestarMesa = new MesaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD); 
            $registroMesa = $gestarMesa->seleccionarTodos();

            $gestarPlato = new PlatoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD); 
            $registroPlato = $gestarPlato->seleccionarTodos();

            $gestarTipoDePlato = new tipoDePlatoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD); 
            $registroTipoDePlato = $gestarTipoDePlato->seleccionarTodos();

            session_start();
            $_SESSION['actualizarDatosOrden'] = $actualizarDatosOrden;
            $_SESSION['actualizarDatosMenu'] = $registroMenu;
            $_SESSION['actualizarDatosMesa'] = $registroMesa;
            $_SESSION['actualizarDatosPlato'] = $registroPlato;
            $_SESSION['actualizarDatosTipoDePlato'] = $registroTipoDePlato;

            header("location:principal.php?contenido=vistas/vistasOrden/vistaActualizaOrden.php");
         } 
     }
?>