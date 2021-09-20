<?php
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";
     include_once PATH. "modelos/modeloPlato/PlatoDAO.php";

     $plaId = array(1);

     $plato = new PlatoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

     $platoEliminadorLogico = $plato -> eliminadorLogico($plaId);

     echo "<pre>";
    print_r($platoEliminadorLogico);
    echo "</pre>";
?>