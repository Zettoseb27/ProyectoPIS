<?php
     include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";
     include_once PATH."modelos/modelotipoDePlato/tipoDePlatoDAO.php"; 
     
     $tipoPlato = new tipoDePlatoDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASEÑA_BD);

     $constultarTodo = $tipoPlato -> seleccionarTodos();

     echo "<pre>";
     print_r($constultarTodo);
     echo "</pre>";

?>