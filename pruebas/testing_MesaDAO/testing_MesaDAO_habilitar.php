<?php
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";
     include_once PATH. "modelos/modeloMesa/MesaDAO.php";
     
     $mesId=array(2);
     
     $mesa = new MesaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

    $mesaHabilitar = $mesa -> habilitar($mesId);

    echo "<pre>";
    print_r($mesaHabilitar);
    echo "</pre>";

?>