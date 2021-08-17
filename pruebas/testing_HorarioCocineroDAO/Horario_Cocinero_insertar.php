<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloHorarioCocinero/HorarioCocineroDAO.php';


$registro['horCocId'] = 1;
$registro['horCocIdCocinero'] = 2;
$registro['horCocHoraInicio'] = "7:00:00";
$registro['horCocHoraFin'] = "2:00:00";
$registro['horCocFecha'] = "2021-08-16";
 $registro['horCocEstado'] = 1;
$registro['horCocSesion'] = null;
$registro['horCocCreated_at'] = "2019-11-19 18:38:40";
$registro['horCocUpdated_at'] = "2019-11-19 18:38:40";


$horarioCocinero = new HorarioCocineroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

$insertar = $horarioCocinero -> insertar($registro);


echo "<pre>";
print_r($insertar);
echo "</pre>";