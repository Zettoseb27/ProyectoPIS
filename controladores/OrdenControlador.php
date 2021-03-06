<?php
     include_once PATH. 'modelos/modeloOrden/OrdenDAO.php';
     //include_once PATH. 'modelos/modeloMenu/MenuDAO.php'; 
     include_once PATH. 'modelos/modeloMesa/MesaDAO.php'; 
     //include_once PATH. 'modelos/modeloPlato/PlatoDAO.php'; 
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
               case 'eliminarOrden':
                    $this->eliminarOrden();
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
               case "mostrarInsertarOrden": //provisionalmente para trabajar con datatables
                  $this->mostrarInsertarOrden();
                  break;
               case "insertarOrden": //provisionalmente para trabajar con datatables
                  $this->insertarOrden();
                  break;
               case 'insertarOrden':  
                    $this->insertarOrden();
                    break;
               case "cancelarInsertarOrden":
                $this->cancelarInsertarOrden(); 
                    break;
            }
         }
         public function listarOrden() {
            $gestarOrden = new OrdenDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASE??A_BD);
            $registroOrden = $gestarOrden -> seleccionarTodos();
            session_start();
            //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS INPRINA O UTILICE //
            $_SESSION['listaDeOrden'] = $registroOrden;
            header("location:principal.php?contenido=vistas/vistasOrden/listarDTRegistroOrden.php");
         }
         public function eliminarOrden() {
            $EliminarRol = new OrdenDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASE??A_BD);
            $EliminarDeRol = $EliminarRol -> Eliminar(array($this->datos['idAct'])); // Se consulta el libro para modificar los datos
            $actualizarDatosRol = $EliminarDeRol['registroEncontrado'][0];
            session_start();
            $_SESSION['mensaje'] = "Eliminaci??n realizada."; 
            header("location:Controlador.php?ruta=listarOrden");
         }
         public function actualizarOrden() {
            $gestarOrden = new OrdenDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASE??A_BD);
            $consultaDeOrden = $gestarOrden->seleccionarId(array($this->datos['idAct']));
            $actualizarDatosOrden = $consultaDeOrden['registroEncontrado'][0]; 
            $gestarMesa = new MesaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASE??A_BD); 
            $registroMesa = $gestarMesa->seleccionarTodos(); 
            /*$gestarMesa = new PlatoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASE??A_BD); 
            $registroPlato = $gestarMesa->seleccionarTodos();
            $gestarTipoDePlato = new tipoDePlatoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASE??A_BD); 
            $registroTipoDePlato = $gestarTipoDePlato->seleccionarTodos();*/
            session_start();
            $_SESSION['actualizarDatosOrden'] = $actualizarDatosOrden;
            $_SESSION['registroMesa'] = $registroMesa;
            //$_SESSION['actualizarDatosPlato'] = $registroPlato;
            //$_SESSION['actualizarDatosTipoDePlato'] = $registroTipoDePlato;

            header("location:principal.php?contenido=vistas/vistasOrden/vistaActualizarOrden.php");
         }
         public function confirmaActualizarOrden() { 
            //echo line;
            $gestarOrden = new OrdenDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASE??A_BD);
            $actualizarOrden = $gestarOrden->actualizar(array($this->datos)); //Se env??a datos del libro para actualizar. 				
    
            session_start();
            $_SESSION['mensaje'] = "Actualizaci??n realizada.";
            header("location:Controlador.php?ruta=listarOrden");
        } 
        public function cancelarActualizarOrden() {
         session_start();
         $_SESSION['mensaje'] = "Desisti?? de la actualizaci??n";
         header("location:Controlador.php?ruta=listarOrden");
      }
      public function mostrarInsertarOrden() {
         /*         * ****PRIMERA TABLA DE RELACI??N UNO A MUCHOS CON LIBROS******************** */
         $gestaroRDEN = new MenuDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASE??A_BD);
         $registroOrden = $gestaroRDEN->seleccionarTodos();
         /*         * ************************************************************************* */

         /*         * ****PRIMERA TABLA DE RELACI??N UNO A MUCHOS CON LIBROS******************** */
         $gestaroRDEN = new MesaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASE??A_BD);
         $registroMesa = $gestaroRDEN->seleccionarTodos();
         /*         * ************************************************************************* */

         /*         * ****PRIMERA TABLA DE RELACI??N UNO A MUCHOS CON LIBROS******************** */
         $gestaroRDEN = new tipoDePlatoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASE??A_BD);
         $registroTipoDePlato = $gestaroRDEN->seleccionarTodos();
         /*         * ************************************************************************* */
 
         session_start();
         $_SESSION['registroOrden'] = $registroOrden;
         $_SESSION['registroMesa'] = $registroMesa;
         $_SESSION['registroTipoDePlato'] = $registroTipoDePlato;
         $registroOrden = null;
         $registroMesa = null;
         $registroTipoDePlato = null;
         header("Location: principal.php?contenido=vistas/vistasOrden/vistaInsertarOrden.php");
     }
     public function insertarOrden() {

      //Se instancia OrdenDAO para insertar
      $buscarCodigoMesero = new OrdenDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASE??A_BD);
      //Se consulta si existe ya el registro
      $PlatoHallado = $buscarCodigoMesero->seleccionarId(array($this->datos['ordId']));
      //Si no existe el libro en la base se procede a insertar ****  		
      if (!$PlatoHallado['exitoSeleccionId']) {
          $insertarPlato = new OrdenDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASE??A_BD);
          $insertoPlato = $insertarPlato->insertar($this->datos);  //inserci??n de los campos en la tabla libros 

          $resultadoInsercionCodigoMesero = $insertoPlato['resultado'];  //Traer el id con que qued?? el libro de lo contrario la excepci??n o fallo  

          session_start();
          $_SESSION['mensaje'] = "Registrado " . $this->datos['ordId'] . " con ??xito.";

          header("location:Controlador.php?ruta=listarOrden");
      } else {// Si existe se retornan los datos y se env??a el mensaje correspondiente ****
          session_start();
          $_SESSION['ordId'] = $this->datos['ordId'];
          $_SESSION['ordvalorTotal'] = $this->datos['ordvalorTotal'];
          $_SESSION['ordIdMenu'] = $this->datos['ordIdMenu']; 
          $_SESSION['ordIdMesa'] = $this->datos['ordIdMesa'];   

          $_SESSION['mensaje'] = "   El c??digo " . $this->datos['ordId'] . " ya existe en el sistema.";

          header("location:Controlador.php?ruta=mostrarInsertarOrden");
          }
      }
   }
?>