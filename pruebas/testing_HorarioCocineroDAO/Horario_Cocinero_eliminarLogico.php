<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH. 'modelos/ConBdMysql.php';
     include_once PATH. 'modelos/modeloHorarioCocinero/HorarioCocineroDAO.php';

     $horCocId=array(2);

     $HorarioCocinero = new HorarioCocineroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

     $horarioCocineroEliminadorLogico = $HorarioCocinero -> eliminadorLogico($horCocId);

     echo "<pre>";
    print_r($horarioCocineroEliminadorLogico);
    echo "</pre>";
?>