<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH.'modelos/ConBdMysql.php';  
     include_once PATH.'modelos/modelotipoDePlato/tipoDePlatoDAO.php'; 

    

     $registro["tipPlaId"] = 8;
     $registro["tipPlaPlato"] = "Pescado frito";
     $registro["tipPlaAdicional"] = "Papa frita";
     $registro["tipPlaBebida"] = "Manzana";
     $registro["tipPlaPostre"] = "Fresas con Crema";


     $tipoPlato = new tipoDePlatoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

     $insertar = $tipoPlato -> insertar($registro);
     
        echo "<pre>";
        print_r($insertar);
        echo "</pre>";


?>