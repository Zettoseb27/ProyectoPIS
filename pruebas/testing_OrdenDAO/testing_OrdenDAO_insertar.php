<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloOrden/OrdenDAO.php';


$registro['ordId'] = 1;
$registro['ordvalorTotal'] = 15000;
$registro['ordIdMenu'] = 1;
$registro['ordIdMesa'] = 1;



$orden=new OrdenDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

$insertar=$orden->insertar($registro);


echo "<pre>";
print_r($insertar);
echo "</pre>"; 