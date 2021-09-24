<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH . 'modelos/ConBdMysql.php';
     include_once PATH . 'modelos/modeloOrden/OrdenDAO.php';

     
     $registro[0]['ordId'] = 1;
     $registro[0]['ordIdMesa'] = 1;
     $registro[0]['ordValorTotal'] = 5000;
    
     
     $rolActualizado = new OrdenDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
     $resultadoActualizacion = $rolActualizado->actualizar($registro);
     
     echo "<pre>";
     print_r($resultadoActualizacion);
     echo "</pre>";
?>