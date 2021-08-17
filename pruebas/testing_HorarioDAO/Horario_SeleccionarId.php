<?php
     
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";
     include_once PATH. "modelos/modeloHorario/HorarioDAO.php";

     $horId = array(1);
     $Horario = new HorarioDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
     $listado=$Horario->seleccionarId($horId);

     echo "<pre>";
     print_r($listado);
     echo "</pre>";

?>