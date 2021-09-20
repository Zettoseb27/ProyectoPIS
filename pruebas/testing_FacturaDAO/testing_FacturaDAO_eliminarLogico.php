<?php
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";
     include_once PATH. "modelos/modeloFactura/FacturaDAO.php";

     $facId=array(2);

     $Factura = new FacturaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

     $FacturaEliminadorLogico = $Factura -> eliminadorLogico($facId);

     echo "<pre>";
    print_r($FacturaEliminadorLogico);
    echo "</pre>";
?>