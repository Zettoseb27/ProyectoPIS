<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloHorario/HorarioDAO.php';

$registro['horId'] = 4;
$registro['horIdCodigoMesero'] = 8;
$registro['horHoraInicio'] = "8:00:00";
$registro['horHoraFin'] = "2:00:00";
$registro['horFecha'] = "2021-08-17";
$registro['horObservacion'] = "Se le descontara de las vacaciones";
$registro['horEstado'] = 1;
$registro['horSesion'] = null;
$registro['horcreated_at'] = "2019-11-19 18:38:40";
$registro['horupdated_at'] = "2019-11-19 18:38:40";

$horario = new HorarioDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
$insertar = $horario -> insertar($registro);

echo "<pre>";
print_r($insertar);
echo "</pre>";