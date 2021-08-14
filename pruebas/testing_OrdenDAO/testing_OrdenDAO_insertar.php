<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloOrden/OrdenDAO.php';


$registro['ordId'] = 1;
$registro['ordIdMenu'] = 6;
$registro['ordIdMesa'] = 5;
$registro['ordvalorTotal'] = "15000";
$registro['ordEstado'] = 1;
$registro['ordSesion'] = null;
$registro['ordCreated_at'] = "2021-08-13 7:25:00";
$registro['ordUpdate_at'] = "2021-08-13 7:30:00";


$orden=new OrdenDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

$insertar=$orden->insertar($registro);


echo "<pre>";
print_r($insertar);
echo "</pre>";