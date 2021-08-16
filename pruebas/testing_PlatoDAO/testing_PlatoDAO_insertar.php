<?php
    include_once "../../modelos/ConstantesConexion.php";
    include_once PATH."modelos/ConBdMysql.php";
    include_once PATH. "modelos/modeloPlato/PlatoDAO.php";



    $registro['plaId'] = 6;
    $registro['plaIdTipoPlato'] = 9;
    $registro['plaDescripcion'] = "pescado frito con papas francesas y ensalada";
     $registro['plaPrecio'] = 12000;
    $registro['plaEstado'] = 1;
    $registro['plaSesion'] = null;
    $registro['placreated_at'] = "2021-10-09 15:10:14";
    $registro['plaupdate_at'] = "2021-10-09 15:10:14";


    $plato = new PlatoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

    $insertar = $plato -> insertar($registro);


    echo "<pre>";
    print_r($insertar);
    echo "</pre>";

?>