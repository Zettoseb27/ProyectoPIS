<?php
     
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";
     include_once PATH. "modelos/modeloHorarioCocinero/HorarioCocineroDAO.php";

     $horCocId = array(3);
     $HorarioCocinero = new HorarioCocineroDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
     $listado=$HorarioCocinero->seleccionarId($horCocId);

     echo "<pre>";
     print_r($listado);
     echo "</pre>";

?>