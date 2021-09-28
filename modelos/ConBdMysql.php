<?php

/* abstract */

class ConBdMySql {

    private $servidor;
    private $base;
    protected $conexion;

    public function __construct($servidor, $base, $loginBD, $passwordBD) {

        $this->servidor = $servidor;
        $this->base = $base;

        try {
            $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\'');
            $dsn = "mysql:dbname=" . $this->base . ";host=" . $this->servidor;

            $this->conexion = new PDO($dsn, $loginBD, $passwordBD, $options);
			
			//echo "Conexión a base de datos ok";
			
        } catch (Exception $ex) {

            echo "Error de Conexión" . $ex->getMessage();
        }
    }

        public function cierreBd() {
            $this -> conexion= NULL;
        }

}
