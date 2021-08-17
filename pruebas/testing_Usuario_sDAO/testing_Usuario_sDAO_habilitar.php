<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH.'modelos/ConBdMysql.php';
     include_once PATH.'modelos/modeloUsuario_s/Usuario_sDAO.php';   

     $habilitar = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

     $usuId = array(1);

     $habilitartipoDePlato = $habilitar -> habilitar($usuId);
    
     echo "<pre>";
     print_r ($habilitartipoDePlato);
     echo "</pre>";

?>