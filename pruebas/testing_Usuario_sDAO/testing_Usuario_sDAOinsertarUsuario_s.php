<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modelo/RolDAO.php';



$registro['(1,'zettoseb27@gmail.com','123456','null',1,'','2018-05-29 11:48:38', '2018-06-08 15:18:53')'];
$registro['(2,'fren124@gmail.com','f123456','null',1,'','2018-05-29 11:48:38', '2018-06-08 15:18:53'),'];
$registro['(3,'cvenus66@gmail.com','c123456','null',1,'','2018-05-29 11:48:38', '2018-06-08 15:18:53'),'];
$registro['(4,'medejo@gmail.com','m123456','null',1,'','2018-05-29 11:48:38', '2018-06-08 15:18:53');'];


$Rol=new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$insertarRol=$Rol->insertar($Rol);


echo "<pre>";
print_r($Rol);
echo "</pre>";