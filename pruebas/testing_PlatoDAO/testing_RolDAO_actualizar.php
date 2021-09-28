<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH . 'modelos/ConBdMysql.php';
     include_once PATH . 'modelos/modeloPlato/PlatoDAO.php';
     
     $registro[0]['plaDescripcion'] = "arroz rico";
     $registro[0]['plaPrecio'] = 12000;
     //$registro[0]['plaEstado'] = 1;
     $registro[0]['plaIdTipoPlato'] = 1;
     $registro[0]['plaId'] = 1;
     
     $rolActualizado = new PlatoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
     $resultadoActualizacion = $rolActualizado->actualizar($registro);
     
     echo "<pre>";
     print_r($resultadoActualizacion);
     echo "</pre>";
?>