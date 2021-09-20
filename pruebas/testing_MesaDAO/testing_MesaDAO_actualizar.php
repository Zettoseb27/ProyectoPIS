<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH . 'modelos/ConBdMysql.php';
     include_once PATH . 'modelos/modeloMesa/MesaDAO.php';
     
     $registro[0]['mesNumeroMesa'] = 5;
     $registro[0]['mesCantidadComensales'] =5;
     $registro[0]['mesId'] = 2;
     
     $rolActualizado = new MesaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
     $resultadoActualizacion = $rolActualizado->actualizar($registro);
     
     echo "<pre>";
     print_r($resultadoActualizacion);
     echo "</pre>";
?>