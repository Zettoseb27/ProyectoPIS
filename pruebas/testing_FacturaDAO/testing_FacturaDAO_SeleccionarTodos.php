<?php
     
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";
     include_once PATH. "modelos/modeloFactura/FacturaDAO.php";
     
    
     $Factura = new FacturaDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
     $listadoCompleto = $Factura -> seleccionarTodos();

     echo "<pre>";
     print_r($listadoCompleto);
     echo "</pre>";

?>