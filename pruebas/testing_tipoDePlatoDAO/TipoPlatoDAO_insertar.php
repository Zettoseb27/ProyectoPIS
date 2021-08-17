<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH.'modelos/ConBdMysql.php';  
     include_once PATH.'modelos/modelotipoDePlato/tipoDePlatoDAO.php'; 

    

     $registro["tipPlaId"] = 5;
     $registro["tipPlaPlato"] = "Pescado frito";
     $registro["tipPlaAdicional"] = "Papa frita";
     $registro["tipPlaBebida"] = "Manzana";
     $registro["tipPlaPostre"] = "Fresas con Crema";
     $registro["tipPlaEstado"] = 1;
     $registro["tipPlaSesion"] = null;
     $registro["tipPlacreated_at"] = "2021-03-02 13:02:32";
     $registro["tipPlaupdated_at"] = "2021-03-05 13:10:32";

     $tipoPlato = new tipoDePlatoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

     $insertar = $tipoPlato -> insertar($registro);
     
        echo "<pre>";
        print_r($insertar);
        echo "</pre>";


?>