<?php
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";
     include_once PATH. "modelos/modeloPersona/PersonaDAO.php";

     $ordId=array(2);

     $orden = new OrdenDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

     $ordenEliminadorLogico = $orden -> eliminadorLogico($ordId);

     echo "<pre>";
    print_r($ordenEliminadorLogico);
    echo "</pre>";
?>