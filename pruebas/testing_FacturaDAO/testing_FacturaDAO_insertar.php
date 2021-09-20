<?php
    include_once "../../modelos/ConstantesConexion.php";
    include_once PATH."modelos/ConBdMysql.php";
    include_once PATH. "modelos/modeloFactura/FacturaDAO.php";


    $registro['facId'] = 5;
    $registro['facIdOrden'] = 5;
    $registro['facIdCodigoMesero'] = 4;
    $registro['facNombreCliente'] = "Felipe Casanova";
    $registro['facEstado'] = 1;
    $registro['facSesion'] = null;
    $registro['facCreated_at'] = "2021-08-13 4:38:05";
    $registro['facUpdated_at'] = "2021-08-13 4:38:05";


    $Factura = new FacturaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

    $insertar = $Factura -> insertar($registro);


    echo "<pre>";
    print_r($insertar);
    echo "</pre>";

?>