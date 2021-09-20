<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH.'modelos/ConBdMysql.php';
     include_once PATH.'modelos/modeloHorario/HorarioDAO.php';
     
    $horId=array(4);
    $Horario=new HorarioDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);
    $horHabilitar = $Horario ->habilitar($horId);

    echo "<pre>";
    print_r($horHabilitar);
    echo "</pre>";

?>