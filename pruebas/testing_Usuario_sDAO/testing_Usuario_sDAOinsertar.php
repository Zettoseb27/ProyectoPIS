<?php
     include_once '../../modelos/ConstantesConexion.php';
     include_once PATH.'modelos/ConBdMysql.php';  
     include_once PATH.'modelos/modeloUsuario_s/Usuario_sDAO.php'; 

    
     $registro['usuId'] = 15;
     $registro['usuLogin'] = "zettoseb@hotmail";
     $registro['usuPassword'] = 123451367;
     $registro['usuUsuSesion'] = null;
     $registro['usuEstado'] = 1;
     $registro['usuRemember_token'] = " ";
     $registro['usu_created_at'] = "2018-05-29 11:48:38";
     $registro['usu_updated_at'] = "2018-05-29 11:48:38";

     $Usuario_s = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASEÑA_BD);

     $insertar = $Usuario_s -> insertar($registro);
     
        echo "<pre>";
        print_r($insertar);
        echo "</pre>";


?>