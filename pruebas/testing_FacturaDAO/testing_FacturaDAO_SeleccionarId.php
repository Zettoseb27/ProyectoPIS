<?php
     
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";
     include_once PATH. "modelos/modeloFactura/FacturaDAO.php";

     $facId = array(3);

     $Factura = new FacturaDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);

     $listado = $Factura -> seleccionarId($facId);

     echo "<pre>";
     print_r($listado);
     echo "</pre>";

?>