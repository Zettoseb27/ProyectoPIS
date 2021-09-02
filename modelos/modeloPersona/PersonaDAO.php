<?php

include_once PATH.'modelos/ConBdMysql.php';

class PersonaDAO extends ConBdMySql {

    private $cantidadTotalRegistros;

    function __construct($servidor, $base, $loginBD, $passwordBD) {
        parent::__construct($servidor, $base, $loginBD, $passwordBD);
    }

    public function seleccionarId($sId) {
//
//        $resultadoConsulta = FALSE;

        $planConsulta = "select * from persona p join usuario_s u on p.perId=u.usuId ";
        $planConsulta .= " where p.perDocumento= ? or u.usuLogin = ? ;";
        $listar = $this->conexion->prepare($planConsulta);
        $listar->execute(array($sId[0], $sId[1]));

        $registroEncontrado = array();
        while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
            $registroEncontrado[] = $registro;
        }

        if ($registro != FALSE) {
            return ['exitoSeleccionId' => TRUE, 'registroEncontrado' => $registroEncontrado];
        } else {
            return ['exitoSeleccionId' => FALSE, 'registroEncontrado' => $registroEncontrado];
        }
    }

    public function insertar($registro) {

        try {

            $insertar = $this->conexion->prepare('INSERT INTO persona (perId, perDocumento, perNombre, perApellido, usuario_s_usuId) VALUES ( :perId, :perDocumento, :perNombre, :perApellido, :usuario_s_usuId );');
            $insertar->bindParam(":perId", $registro['perId']);
            $insertar->bindParam(":perDocumento", $registro['documento']);
            $insertar->bindParam(":perNombre", $registro['nombre']);
            $insertar->bindParam(":perApellido", $registro['apellidos']);
            $insertar->bindParam(":perApellido", $registro['apellidos']);
            $insertar->bindParam(":usuario_s_usuId", $registro['perId']);
            $insercion = $insertar->execute();
            $clavePrimariaConQueInserto = $this->conexion->lastInsertId();

            return ['inserto' => 1, 'resultado' => $clavePrimariaConQueInserto];
        } /* catch (Exception $exc) {
          return ['inserto' => FALSE, 'resultado' => $exc->getTraceAsString()];
          } */ catch (PDOException $pdoExc) {
            return ['inserto' => 0, 'resultado' => $pdoExc];
        }
    }

    public function seleccionarTodos() {

        $Consulta = "select perId ,perDocumento, perNombre, perApellido, per_created_at
        from persona ;";
         $registroPersona = $this -> conexion -> prepare ($Consulta);
         $registroPersona -> execute();
         $listadoPersona = array();
         while ($registro = $registroPersona -> fetch(PDO::FETCH_OBJ)) {
            $listadoPersona[] = $registro;
        }

        $this->cierreBd();

        return $listadoPersona;
    }

}




