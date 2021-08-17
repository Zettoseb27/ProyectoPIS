<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modelo/RolDAO.php';



$registro['(1,'cocinero','encargo de la preparacion de los platos',1,null,'21-08-12 9:21:00', '21-08-12 9:22:00'),'];
$registro['(2,'mesero','encargado de llevar los platos a la mesa',1,null,'21-08-12 9:25:00','21-08-12 9:26:00'),'];
$registro['(3,'lava platos','encargado del orden de la cocina',1,null,'21-08-12 9:29:00','21-08-12 9:29:00'),'];
$registro['(4,'provedor','suministra los protuctos para el restaurante',1,null,'21-08-12 9:32:00','21-08-12 9:33:00');'];


$Rol=new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$insertarRol=$Rol->insertar($Rol);


echo "<pre>";
print_r($insertarRol);
echo "</pre>";