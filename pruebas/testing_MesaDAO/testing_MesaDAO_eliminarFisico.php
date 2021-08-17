<?php
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";
     include_once PATH. "modelos/modeloMesa/MesaDAO.php";

     $mesId = array(6);

     $Mesa = new MesaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

     $mesaEliminadoFisico = $Mesa -> eliminar($mesId);

    echo "<pre>";
    print_r($mesaEliminadoFisico);
    echo "</pre>";
?>