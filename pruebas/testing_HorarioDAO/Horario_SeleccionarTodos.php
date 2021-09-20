<?php
     
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";
     include_once PATH. "modelos/modeloHorario/HorarioDAO.php";
     
    
     $Horario = new HorarioDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);
     $listadoCompleto = $Horario -> seleccionarTodos();

     echo "<pre>";
     print_r($listadoCompleto);
     echo "</pre>";

?>