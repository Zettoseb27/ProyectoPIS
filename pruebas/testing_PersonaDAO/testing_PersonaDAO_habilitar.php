<?php
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";
     include_once PATH. "modelos/modeloPersona/PersonaDAO.php";
     
     $perId=array(1);
     
     $persona=new PersonaDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

    $personaHabilitar = $persona ->habilitar($perId);

    echo "<pre>";
    print_r($personaHabilitar);
    echo "</pre>";

?>