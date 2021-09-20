<?php
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";
     include_once PATH. "modelos/modeloPersona/PersonaDAO.php";

     $perId = array(9);

     $persona = new PersonaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

     $personaEliminadoFisico = $persona -> eliminar($perId);

    echo "<pre>";
    print_r($personaEliminadoFisico);
    echo "</pre>";
?>