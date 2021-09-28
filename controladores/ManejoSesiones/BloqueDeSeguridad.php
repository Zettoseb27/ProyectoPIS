<?php
     class BloqueDeSeguridad{
         public function seguridad($ubicacion) {
                $estado_session = session_status();
                if ($estado_session == PHP_SESSION_DISABLED) {
                    session_start();
                }
                if ($_SESSION["autenticado"] != "1") {
                    //si no existe , va para la página de login o la que se determine  
                    header("Location: " . $ubicacion); 			
                    //salimos de este script  
                  exit(1);
                }
         }
     }
?>