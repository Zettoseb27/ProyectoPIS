<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloCocinero/CocineroDAO.php';


$registro['cocId'] = 2;
$registro['cocIdCocinero'] = 3;
$registro['cocIdCodigoCocinero'] = 102;



$cocinero = new CocineroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

$insertar = $cocinero -> insertar($registro);


echo "<pre>";
print_r($insertar);
echo "</pre>";