<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH.'modelos/ConBdMysql.php';
     include_once PATH.'modelos/modeloUsuario_s/Usuario_sDAO.php';   

     $eliminadorLogico = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

     $usuId = array(1);

     $tipPlaEliminadorLogico = $eliminadorLogico -> eliminadorLogico($usuId);

     echo "<pre>";
     print_r ($tipPlaEliminadorLogico);
     echo "</pre>";
?>