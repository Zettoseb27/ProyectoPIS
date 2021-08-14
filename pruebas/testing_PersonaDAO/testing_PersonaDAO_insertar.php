<?php


    include_once "../../modelos/ConstantesConexion.php";
    include_once PATH."modelos/ConBdMysql.php";
    include_once PATH. "modelos/modeloPersona/PersonaDAO.php";



    $registro['perId'] = 9;
    $registro['perDocumento'] = "1.023.961.818";
    $registro['perNombre'] = "Jhon Sebastian";
    $registro['perApellido'] = "Sanabria Mogollon";
    $registro['perEstado'] = 1;
    $registro['perUsuSesion'] = null;
    $registro['per_created_at'] = "2019-11-19 18:38:40";
    $registro['per_updated_at'] = "2019-11-19 18:38:40";
    $registro['usuario_s_usuId'] = 9;


    $orden=new PersonaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

    $insertar=$orden->insertar($registro);


    echo "<pre>";
    print_r($insertar);
    echo "</pre>";

?>