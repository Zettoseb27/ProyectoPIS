<?php
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";
     include_once PATH. "modelos/modeloPersona/PersonaDAO.php";

     $perId=array(1);

     $persona = new PersonaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

     $personaEliminadorLogico = $persona -> eliminadorLogico($perId);

     echo "<pre>";
    print_r($personaEliminadorLogico);
    echo "</pre>";
?>