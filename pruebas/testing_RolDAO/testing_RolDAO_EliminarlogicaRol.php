<?php

include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloLibros/LibroDAO.php';

$sId=array(258);

$ElimnarlogicaRol=new LibroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);


$ElimnarlogicaRol=$ElimnarlogicaRol->eliminarLogico($sId);

echo "<pre>";
print_r($ElimnarlogicaRol);
echo "</pre>";