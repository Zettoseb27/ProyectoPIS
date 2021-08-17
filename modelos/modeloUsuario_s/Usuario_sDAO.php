<?php

    include_once "../../modelos/ConstantesConexion.php";
    include_once PATH."modelos/ConBdMysql.php";

     class Usuario_sDAO extends ConBdMySql {

        public function __construct ($servidor, $base, $loginBD, $passwordBD) {
            parent::__construct($servidor, $base, $loginBD, $passwordBD);
        }

       public function seleccionarTodos (){
           $planConsulta = "select usuId, usuLogin, usu_created_at
           from usuario_s;";



           $registroUsuario_s = $this -> conexion -> prepare ($planConsulta);
           $registroUsuario_s -> execute();

           $listadoRegistroUsuario_s = array();

           while($registro=$registroUsuario_s -> fetch(PDO::FETCH_OBJ)){
               $listadoRegistroUsuario_s[] = $registro;

           }

               $this->cierreBd();

               return $listadoRegistroUsuario_s;
       }
    }
    