<?php
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";
     include_once PATH. "modelos/modeloPlato/PlatoDAO.php";

     $plaId = array(6);

     $plato = new PlatoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

     $platoEliminadoFisico = $plato -> eliminar($plaId);

    echo "<pre>";
    print_r($platoEliminadoFisico);
    echo "</pre>";
?>