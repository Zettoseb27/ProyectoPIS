<?php
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";
     include_once PATH. "modelos/modeloMesa/MesaDAO.php";

     $mesId=array(1);

     $mesa = new MesaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

     $mesaEliminadorLogico = $mesa -> eliminadorLogico($mesId);

     echo "<pre>";
    print_r($mesaEliminadorLogico);
    echo "</pre>";
?>