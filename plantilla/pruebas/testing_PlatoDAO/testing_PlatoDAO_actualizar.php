<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH . 'modelos/ConBdMysql.php';
     include_once PATH . 'modelos/modeloRol/RolDAO.php';
     
     $registro[0]['plaDescripcio'];
     $registro[0]['plaPrecio'];
     $registro[0]['plaEstado'];
     $registro[0]['plaIdTipoPlato'];
     $registro[0]['plaId'];
     
     $rolActualizado = new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
     $resultadoActualizacion = $rolActualizado->actualizar($registro);
     
     echo "<pre>";
     print_r($resultadoActualizacion);
     echo "</pre>";
?>