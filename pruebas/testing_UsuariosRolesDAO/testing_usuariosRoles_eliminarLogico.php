<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH. 'modelos/ConBdMysql.php';
     include_once PATH. 'modelos/modeloUsuariosRoles/UsuariosRolesDAO.php';

     $id_usuario_s=array(8);

     $id_usuario_s_roles = new UsuariosRolesDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

     $usuario_s_rolesEliminadorLogico = $id_usuario_s_roles -> eliminadorLogico($id_usuario_s);

     echo "<pre>";
    print_r($usuario_s_rolesEliminadorLogico);
    echo "</pre>";
?>