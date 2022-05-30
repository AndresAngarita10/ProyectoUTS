<?php 

    include_once("ObjetoRegistroSolicitud.php");
    include_once("ObjetoRegistroSolicitud.php");
    include_once '../../modelo/Conexion.php';


    class ModeloRegistroSolicitud extends Conexion 
    {
        public function insertar(ObjetoRegistroSolicitud $Registro){

			$sql = $this->connect()->prepare("INSERT INTO registrosolicitud (
                                                 cedulaPaciente, nombrePaciente, idSolicitudRemision
                                                , medicoSolicitante, cedulaMedico, observacion, historiaClinica, cedAcompaniante
                                                , fkIdPaciente, fkIdDatosRemision, fechaAgregado, usuarioTerminoSolicitud
                                                , finalizado) 
                                                values (
                                                :cedulaPaciente, :nombrePaciente, :idSolicitudRemision
                                                , :medicoSolicitante, :cedulaMedico, :observacion, :historiaClinica, :cedAcompaniante
                                                , :fkIdPaciente, :fkIdDatosRemision, :fechaAgregado, :usuarioTerminoSolicitud
                                                , :finalizado)");

			$sql->execute(['cedulaPaciente' => $Registro->getCedulaPaciente(), 'nombrePaciente' => $Registro->getNombrePaciente()
            , 'idSolicitudRemision' => $Registro->getIdSolicitudRemision(), 'medicoSolicitante' => $Registro->getMedicoSolicitante()
            , 'cedulaMedico' => $Registro->getCedulaMedico(), 'observacion' => $Registro->getObservacion()
            , 'historiaClinica' => $Registro->getHistoriaClinica(), 'cedAcompaniante' => $Registro->getCedAcompañante()
            , 'fkIdPaciente' => $Registro->getfkIdPaciente(), 'fkIdDatosRemision' => $Registro->getfkIdDatosRemision()
            , 'fechaAgregado' => $Registro->getFechaAgregado(), 'usuarioTerminoSolicitud' => $Registro->getUsuarioTerminooSolicitud()
            , 'finalizado' => 0]);
			//$this->acceso->exec($sql);
		}


        public function getAllRegistros2($idSolicitud){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM registrosolicitud  WHERE idSolicitudRemision = :idSolicitud ");
            $resultado->execute(['idSolicitud' => $idSolicitud]);
                    $registro = new ObjetoRegistroSolicitud();
                    $registro->setId($registro["id"]);
                    $registro->setCedulaPaciente($registro["cedulaPaciente"]);
                    $registro->setNombrePaciente($registro["nombrePaciente"]);
                    $registro->setIdSolicitudRemision($registro["idSolicitudRemision"]);
                    $registro->setMedicoSolicitante($registro["medicoSolicitante"]);
                    $registro->setCedulaMedico($registro["cedulaMedico"]);
                    $registro->setObservacion($registro["observacion"]);
                    $registro->setHistoriaClinica($registro["historiaClinica"]);
                    $registro->setCedAcompañante($registro["cedAcompaniante"]);
                    $registro->setfkIdPaciente($registro["fkIdPaciente "]);
                    $registro->setfkIdDatosRemision($registro["fkIdDatosRemision "]);
                    $registro->setFechaAgregado($registro["fechaAgregado"]);
                    $registro->setUsuarioTerminooSolicitud($registro["usuarioTerminoSolicitud"]);
                    $registro->setFinalizado($registro["finalizado"]);
                    
                
                
                return $registro;
            
        }

        public function getAllRegistros($idSolicitudRemision){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM registrosolicitud  WHERE idSolicitudRemision = :idSolicitudRemision ");
            $resultado->execute(['idSolicitudRemision' => $idSolicitudRemision]);
                while($registro = $resultado->fetch()){
                    $datos = new ObjetoRegistroSolicitud();
                    $datos->setId($registro["id"]);
                    $datos->setCedulaPaciente($registro["cedulaPaciente"]);
                    $datos->setNombrePaciente($registro["nombrePaciente"]);
                    $datos->setIdSolicitudRemision($registro["idSolicitudRemision"]);
                    $datos->setMedicoSolicitante($registro["medicoSolicitante"]);
                    $datos->setCedulaMedico($registro["cedulaMedico"]);
                    $datos->setObservacion($registro["observacion"]);
                    $datos->setHistoriaClinica($registro["historiaClinica"]);
                    $datos->setCedAcompañante($registro["cedAcompaniante"]);
                    $datos->setfkIdPaciente($registro["fkIdPaciente"]);
                    $datos->setfkIdDatosRemision($registro["fkIdDatosRemision"]);
                    $datos->setFechaAgregado($registro["fechaAgregado"]);
                    $datos->setUsuarioTerminooSolicitud($registro["usuarioTerminoSolicitud"]);
                    $datos->setFinalizado($registro["finalizado"]);
                    
                }
                
                return $datos;
            
        }


    }

    

    ?>