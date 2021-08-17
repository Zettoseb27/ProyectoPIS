<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH.'modelos/ConBdMysql.php';
     include_once PATH.'modelos/modelotipoDePlato/tipoDePlatoDAO.php';   

     $eliminadorLogico = new tipoDePlatoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

     $tipPlaId = array(1);

     $tipPlaEliminadorLogico = $eliminadorLogico -> eliminadorLogico($tipPlaId);

     echo "<pre>";
     print_r ($tipPlaEliminadorLogico);
     echo "</pre>";
?>