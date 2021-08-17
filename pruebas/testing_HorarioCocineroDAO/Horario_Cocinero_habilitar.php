<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH.'modelos/ConBdMysql.php';
     include_once PATH.'modelos/modeloHorarioCocinero/HorarioCocineroDAO.php';
     
     $horCocId=array(2);
     
     $HorarioCocinero=new HorarioCocineroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

    $horCocHabilitar = $HorarioCocinero ->habilitar($horCocId);

    echo "<pre>";
    print_r($horCocHabilitar);
    echo "</pre>";

?>