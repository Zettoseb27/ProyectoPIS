<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH.'modelos/ConBdMysql.php';
     include_once PATH.'modelos/modeloHorarioCocinero/HorarioCocineroDAO.php';

     $horCocId = array(1);

     $HorarioCocinero = new HorarioCocineroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

     $horarioCocineroEliminadoFisico=$HorarioCocinero->eliminar($horCocId);

    echo "<pre>";
    print_r($horarioCocineroEliminadoFisico);
    echo "</pre>";
?>