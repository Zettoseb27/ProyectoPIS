<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH.'modelos/ConBdMysql.php';
     include_once PATH.'modelos/modeloMenu/MenuDAO.php';
     
     $menId=array(2);
     
     $menu=new MenuDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

    $menuHabilitar = $menu ->habilitar($menId);

    echo "<pre>";
    print_r($menuHabilitar);
    echo "</pre>";

?>