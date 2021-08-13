<?php

include_once "../../modelos/ConstantesConexion.php";
     include_once PATH."modelos/ConBdMysql.php";

     class OrdenDAO extends ConBdMySql {
        public function __construct ($servidor, $base, $loginBD, $passwordBD) {
            parent::__construct($servidor, $base, $loginBD, $passwordBD);
        }
       public function seleccionarTodos (){
           $planConsulta = ¨SELECT * FROM rol;¨;



           $registrosOrden = $this -> conexion -> prepare ($planConsulta);
           $registrosOrden -> execute();//ejecucion de la consulta

           $listadoRegistroOrden = array();

           while($registro=$registrosOrden -> fetch(PDO::FETCH_OBJ)){
               $listadoRegistroOrden[] = $registro;

           }

               $this->cierreBd();

               return $listadoRegistroOrden;
       }
    }
    


