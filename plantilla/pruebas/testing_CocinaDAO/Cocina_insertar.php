<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloCocina/CocinaDAO.php';


$registro['cociId'] = 6;
$registro['cociIdCocinero'] = 6;
$registro['cociIdOrden'] = 5;
$registro['cociIdEstado'] = 1;
$registro['cociSesion'] = null;
$registro['cociCreated_at'] = "2019-06-07 10:19:16";
$registro['cociUpdated_at'] = "2019-06-07 10:19:16";


$Cocina = new CocinaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

$insertar = $Cocina -> insertar($registro);


echo "<pre>";
print_r($insertar);
echo "</pre>";