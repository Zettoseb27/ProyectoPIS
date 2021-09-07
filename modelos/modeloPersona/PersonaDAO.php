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

        $planConsulta = "SELECT * FROM persona  WHERE perId = ?; ";
        $listar = $this->conexion->prepare($planConsulta);
        $listar->execute(array($sId[0]));

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

    public function actualizar($registro) {
        try {
            $Documento = $registro[0]['perDocumento'];
            $Nombre = $registro[0]['perNombre'];
            $Apellido = $registro[0]['perApellido'];
            $Creacion = $registro[0]['per_created_at'];
            $Id = $registro[0]['perId'];
            if (isset($Id)) {
                $actualizar = "UPDATE persona SET perDocumento = ? , perNombre = ?, perApellido = ?, per_created_at = ? WHERE perId = ?";
                $actualizacion = $this->conexion->prepare($actualizar);
                $resultadoAct=$actualizacion->execute(array($Documento,$Nombre,$Apellido,$Creacion,$Id));
                $this->cierreBd();
            }
        } catch (PDOException $pdoExc) {
                $this->cierreBd();
                return ['actualizacion' => $resultadoAct, 'mensaje' => $pdoExc];
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




