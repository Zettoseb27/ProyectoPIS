<?php
    include_once "../../modelos/ConstantesConexion.php";
    include_once PATH."modelos/ConBdMysql.php";
    include_once PATH. "modelos/modeloMesa/MesaDAO.php";



    $registro['mesId'] = 6;        
    $registro['mesNumeroMesa'] = 8;
    $registro['mesCantidadComensales'] = 12;
    $registro['mesEstado'] = 1;
    $registro['mesSesion'] = "hola";
    $registro['mesCreated_at'] = "2021-08-11 22:01:00";
    $registro['mesUpdated_at'] = "2021-08-11 22:01:00";


    $mesa = new MesaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

    $insertar = $mesa -> insertar($registro);


    echo "<pre>";
    print_r($insertar);
    echo "</pre>";

?>