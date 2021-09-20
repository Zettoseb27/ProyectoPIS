<?php
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";
     include_once PATH. "modelos/modeloPlato/PlatoDAO.php";
     
     $plaId=array(2);
     
     $plato = new PlatoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

    $plaHabilitar = $plato -> habilitar($plaId);

    echo "<pre>";
    print_r($plaHabilitar);
    echo "</pre>";

?>