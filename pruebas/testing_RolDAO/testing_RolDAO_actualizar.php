<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH . 'modelos/ConBdMysql.php';
     include_once PATH . 'modelos/modeloRol/RolDAO.php';
     
     $registro[0]['rolId'] = 1;
     $registro[0]['rolNombre'] = "Cocinero";
     $registro[0]['rolDescripcion'] = "encargo de la preparacion de los platos";
     $registro[0]['rolEstado'] = 0;
     $registro[0]['rolUsuSesion'] = null;
     $registro[0]['rol_created_at'] = "2021-08-12 09:22:00";
     $registro[0]['rol_updated_at'] = "2021-08-12 09:22:00";
     
     $rolActualizado = new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
     $resultadoActualizacion = $rolActualizado->actualizar($registro);
     
     echo "<pre>";
     print_r($resultadoActualizacion);
     echo "</pre>";
?>