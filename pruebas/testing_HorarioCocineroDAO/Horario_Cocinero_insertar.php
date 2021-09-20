<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloHorarioCocinero/HorarioCocineroDAO.php';


$registro['horCocId'] = 1;
$registro['horCocHoraInicio'] = "7:00:00";
$registro['horCocHoraFin'] = "2:00:00";
$registro['horCocFecha'] = "2021-08-16";
$registro['horCocIdCocinero'] = 1;


$horarioCocinero = new HorarioCocineroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

$insertar = $horarioCocinero -> insertar($registro);


echo "<pre>";
print_r($insertar);
echo "</pre>";