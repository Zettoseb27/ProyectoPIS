<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH.'modelos/ConBdMysql.php';
     include_once PATH.'modelos/modeloHorario/HorarioDAO.php';

     $horId = array(4);

     $Horario = new HorarioDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

     $horarioEliminadoFisico=$Horario->eliminar($horId);

    echo "<pre>";
    print_r($horarioEliminadoFisico);
    echo "</pre>";
?>