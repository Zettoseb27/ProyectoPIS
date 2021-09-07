<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH . 'modelos/ConBdMysql.php';
     include_once PATH . 'modelos/modeloCodigoMesero/CodigoMeseroDAO.php';

     $registro[0]['codMesId'] = 1;
     $registro[0]['codMesIdMesero'] = 3;
     $registro[0]['codMesEstado'] = 1;
     $registro[0]['codMesCodigoMesero'] = 111233444;
     
    
 
     
     $rolActualizado = new CodigoMeseroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
     $resultadoActualizacion = $rolActualizado->actualizar($registro);
     
     echo "<pre>";
     print_r($resultadoActualizacion);
     echo "</pre>";
?>