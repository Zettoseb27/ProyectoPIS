<?php

include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";

     class Usuario_sDAO extends ConBdMySql {
        public function __construct ($servidor, $base, $loginBD, $passwordBD) {
            parent::__construct($servidor, $base, $loginBD, $passwordBD);
        }
       public function seleccionarTodos (){
           $planConsulta = "select * from proyecto.usuario_s;";



           $listadoRegistroUsuario_s = $this -> conexion -> prepare ($planConsulta);
           $registrosOrden -> execute();//ejecucion de la consulta

           $listadoRegistroUsuario_s = array();

           while($registro=$registrosUsuario_s -> fetch(PDO::FETCH_OBJ)){
               $listadoRegistro[] = $registro;

           }

               $this->cierreBd();

               return $listadoRegistroUsuario_s;
       }
    }
    