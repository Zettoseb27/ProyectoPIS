<?php
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";
     include_once PATH. "modelos/modeloFactura/FacturaDAO.php";

     $facId = array(5);

     $Factura = new FacturaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

     $FacturaEliminadoFisico = $Factura -> eliminar($facId);

    echo "<pre>";
    print_r($FacturaEliminadoFisico);
    echo "</pre>";
?>