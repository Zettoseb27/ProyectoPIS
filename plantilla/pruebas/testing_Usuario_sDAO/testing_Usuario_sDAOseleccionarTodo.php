<?php
    
    include_once '../../modelos/ConstantesConexion.php';
    include_once PATH.'modelos/ConBdMysql.php';
    include_once PATH.'modelos/modeloUsuario_s/Usuario_sDAO.php';


    $usuario_s = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

    $listadoCompleto = $usuario_s -> seleccionarTodos(usuId,usuLogin,usuPassaword,usuUsuSesion,usuEstado,usuRemember_token,usu_created_at,usu_updated_at);

    echo "<pre>";
    print_r($listadoCompleto);
    echo "</pre>";
    

?>  
ss