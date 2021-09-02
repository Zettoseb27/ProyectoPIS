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
               case 'actualizarPersona':
                    $this->actualizarPersona();
                    break;
                case 'confirmaActualizarPersona':  
                    $this->confirmaActualizarPersona();
                    break;
                case 'cancelarActualizarPersona':  
                    $this->cancelarActualizarPersona();
                    break;
                case 'mostrarInsertarPersona':  
                    $this->mostrarInsertarPersona();
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
         public function actualizarPersona() {
            $gestarPersona = new PersonaDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $consultaDePersona = $gestarPersona -> seleccionarId(array($this->datos['idAct'])); // Se consulta el libro para modificar los datos
            $actualizarDatosPersona = $consultaDePersona['registroEncontrado'][0];
            session_start();
            $_SESSION['actualizarDatosPersona'] = $actualizarDatosPersona;
            header("location:principal.php?contenido=vistas/vistasPersona/vistaActualizarPersona.php");
         }
         public function confirmaActualizarPersona() {
            $gestarPersona = new PersonaDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
            $actualizarPersona = $gestarPersona -> actualizar(array($this->datos));
            session_start();
            $_SESSION['mensaje'] = "Actualizacion realizada";
            header("location:Controlador.php?ruta=listarPersona");
         }
   }
?>