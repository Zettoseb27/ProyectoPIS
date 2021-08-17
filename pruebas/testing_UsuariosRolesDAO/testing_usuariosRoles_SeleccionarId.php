<?php
     
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";
     include_once PATH. "modelos/modeloUsuariosRoles/UsuariosRolesDAO.php";

     $id_usuario_s = array(4);

     $orden = new UsuariosRolesDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);

     $listado=$orden->seleccionarId($id_usuario_s);

     echo "<pre>";
     print_r($listado);
     echo "</pre>";

?>