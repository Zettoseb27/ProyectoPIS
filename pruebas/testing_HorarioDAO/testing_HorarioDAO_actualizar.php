<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH . 'modelos/ConBdMysql.php';
     include_once PATH . 'modelos/modeloHorario/HorarioDAO.php';

     //$registro[0]['horId'] = 1;

     $registro[0]['horHoraInicio'] = '07:15:10';
     $registro[0]['horHoraFin'] = '05:15:00';
     $registro[0]['horFecha'] = '2021-08-17';
     $registro[0]['horIdCodigoMesero'] = 2;
     $registro[0]['horId'] = 1;
     
     $rolActualizado = new HorarioDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
     $resultadoActualizacion = $rolActualizado->actualizar($registro);
     
     echo "<pre>";
     print_r($resultadoActualizacion);
     echo "</pre>";
?>