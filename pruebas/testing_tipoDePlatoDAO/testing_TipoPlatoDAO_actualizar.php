<?php 
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH. 'modelos/ConBdMysql.php';
     include_once PATH. 'modelos/modelotipoDePlato/tipoDePlatoDAO.php';

     $registro[0]['tipPlaId'] = 1;
     $registro[0]['tipPlaPlato'] = "Arroz con pollol";
     $registro[0]['tipPlaAdicional'] = "Papa Frita";
     $registro[0]['tipPlaBebida'] = "Gaseosa Manzana";
     $registro[0]['tipPlaPostre'] = "Fresas con crema";
     
     $tipoPlatoActualizado = new tipoDePlatoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
     $resultadoActualizacion = $tipoPlatoActualizado->actualizar($registro); 

     echo "<pre>";  
     print_r($resultadoActualizacion);
     echo "</pre>";
?>