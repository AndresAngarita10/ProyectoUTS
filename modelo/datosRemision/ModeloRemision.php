<?php 

    include_once("ObjetoDatosAdministrativos.php");
    include_once '../../modelo/Conexion.php';


    class ModeloRemision extends Conexion 
    {

        public function getRemisionFase1RR(){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM datosremision WHERE tomada = 0  ORDER BY fechaAgregado ASC ");
            $resultado->execute([]);
            while($registro2 = $resultado->fetch(PDO::FETCH_ASSOC)){
                $r = new ObjetoDatosAdministrativos();
                    $r->setId($registro2["id"]);
                    $r->setTipoSolicitud($registro2["tipoSolicitud"]);
                    $r->setnumeroHistoria($registro2["numeroHistoria"]);
                    $r->setidentificacionPaciente($registro2["identificacionPaciente"]);
                    $r->setMedicoSolicitante($registro2["medicoSolicitante"]);
                    $r->setServicioRemite($registro2["servicioRemite"]);
                    $r->setServicioRemitido($registro2["servicioRemitido"]);
                    $r->setEntidadResponsablePago($registro2["entidadResponsablePago"]);
                    $r->setTelefono($registro2["telefono"]);
                    $r->setEspecialidadRemite($registro2["especialidadRemite"]);
                    $r->setEspecialidadRemitido($registro2["especialidadRemitido"]);
                    $r->setobservaciones($registro2["observaciones"]);
                    $r->setFechaAgregado($registro2["fechaAgregado"]);
                    $r->setfkIdMedico($registro2["fkIdMedico"]);
                    $r->setTomada($registro2["tomada"]);
                    $r->setfinalizado($registro2["finalizado"]);
                $matriz[$contador] = $r;
                $contador++;
            }
            return $matriz;
        }

        public function getRemisionFinalizada(){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM datosremision WHERE finalizado = 1  ORDER BY fechaAgregado DESC ");
            $resultado->execute([]);
            while($registro2 = $resultado->fetch(PDO::FETCH_ASSOC)){
                $r = new ObjetoDatosAdministrativos();
                    $r->setId($registro2["id"]);
                    $r->setTipoSolicitud($registro2["tipoSolicitud"]);
                    $r->setnumeroHistoria($registro2["numeroHistoria"]);
                    $r->setidentificacionPaciente($registro2["identificacionPaciente"]);
                    $r->setMedicoSolicitante($registro2["medicoSolicitante"]);
                    $r->setServicioRemite($registro2["servicioRemite"]);
                    $r->setServicioRemitido($registro2["servicioRemitido"]);
                    $r->setEntidadResponsablePago($registro2["entidadResponsablePago"]);
                    $r->setTelefono($registro2["telefono"]);
                    $r->setEspecialidadRemite($registro2["especialidadRemite"]);
                    $r->setEspecialidadRemitido($registro2["especialidadRemitido"]);
                    $r->setobservaciones($registro2["observaciones"]);
                    $r->setFechaAgregado($registro2["fechaAgregado"]);
                    $r->setfkIdMedico($registro2["fkIdMedico"]);
                    $r->setTomada($registro2["tomada"]);
                    $r->setfinalizado($registro2["finalizado"]);
                $matriz[$contador] = $r;
                $contador++;
            }
            return $matriz;
        }

        public function getAllRemisionCedula($cedula){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM datosremision WHERE finalizado = 1 AND identificacionPaciente = :cedula  ORDER BY fechaAgregado DESC ");
            $resultado->execute(['cedula' => $cedula]);
            while($registro2 = $resultado->fetch(PDO::FETCH_ASSOC)){
                $r = new ObjetoDatosAdministrativos();
                    $r->setId($registro2["id"]);
                    $r->setTipoSolicitud($registro2["tipoSolicitud"]);
                    $r->setnumeroHistoria($registro2["numeroHistoria"]);
                    $r->setidentificacionPaciente($registro2["identificacionPaciente"]);
                    $r->setMedicoSolicitante($registro2["medicoSolicitante"]);
                    $r->setServicioRemite($registro2["servicioRemite"]);
                    $r->setServicioRemitido($registro2["servicioRemitido"]);
                    $r->setEntidadResponsablePago($registro2["entidadResponsablePago"]);
                    $r->setTelefono($registro2["telefono"]);
                    $r->setEspecialidadRemite($registro2["especialidadRemite"]);
                    $r->setEspecialidadRemitido($registro2["especialidadRemitido"]);
                    $r->setobservaciones($registro2["observaciones"]);
                    $r->setFechaAgregado($registro2["fechaAgregado"]);
                    $r->setfkIdMedico($registro2["fkIdMedico"]);
                    $r->setTomada($registro2["tomada"]);
                    $r->setfinalizado($registro2["finalizado"]);
                $matriz[$contador] = $r;
                $contador++;
            }
            return $matriz;
        }



        public function getRemisionXID($id){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM datosremision WHERE id = :id  ");
            $resultado->execute(['id' => $id]);
            while($registro2 = $resultado->fetch(PDO::FETCH_ASSOC)){
                $r = new ObjetoDatosAdministrativos();
                    $r->setId($registro2["id"]);
                    $r->setTipoSolicitud($registro2["tipoSolicitud"]);
                    $r->setnumeroHistoria($registro2["numeroHistoria"]);
                    $r->setidentificacionPaciente($registro2["identificacionPaciente"]);
                    $r->setMedicoSolicitante($registro2["medicoSolicitante"]);
                    $r->setServicioRemite($registro2["servicioRemite"]);
                    $r->setServicioRemitido($registro2["servicioRemitido"]);
                    $r->setEntidadResponsablePago($registro2["entidadResponsablePago"]);
                    $r->setTelefono($registro2["telefono"]);
                    $r->setEspecialidadRemite($registro2["especialidadRemite"]);
                    $r->setEspecialidadRemitido($registro2["especialidadRemitido"]);
                    $r->setobservaciones($registro2["observaciones"]);
                    $r->setFechaAgregado($registro2["fechaAgregado"]);
                    $r->setfkIdMedico($registro2["fkIdMedico"]);
                    $r->setTomada($registro2["tomada"]);
                    $r->setfinalizado($registro2["finalizado"]);
                //$matriz[$contador] = $r;
                //$contador++;
            }
            return $r;
        }

        public function getRemisionXCedula($cedula){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM datosremision WHERE identificacionPaciente = :cedula  ");
            $resultado->execute(['cedula' => $cedula]);
            while($registro2 = $resultado->fetch(PDO::FETCH_ASSOC)){
                $r = new ObjetoDatosAdministrativos();
                    $r->setId($registro2["id"]);
                    $r->setTipoSolicitud($registro2["tipoSolicitud"]);
                    $r->setnumeroHistoria($registro2["numeroHistoria"]);
                    $r->setidentificacionPaciente($registro2["identificacionPaciente"]);
                    $r->setMedicoSolicitante($registro2["medicoSolicitante"]);
                    $r->setServicioRemite($registro2["servicioRemite"]);
                    $r->setServicioRemitido($registro2["servicioRemitido"]);
                    $r->setEntidadResponsablePago($registro2["entidadResponsablePago"]);
                    $r->setTelefono($registro2["telefono"]);
                    $r->setEspecialidadRemite($registro2["especialidadRemite"]);
                    $r->setEspecialidadRemitido($registro2["especialidadRemitido"]);
                    $r->setobservaciones($registro2["observaciones"]);
                    $r->setFechaAgregado($registro2["fechaAgregado"]);
                    $r->setfkIdMedico($registro2["fkIdMedico"]);
                    $r->setTomada($registro2["tomada"]);
                    $r->setfinalizado($registro2["finalizado"]);
                //$matriz[$contador] = $r;
                //$contador++;
            }
            return $r;
        }


        public function getRemisionXHistoria($Historia){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM datosremision WHERE numeroHistoria = :Historia  ");
            $resultado->execute(['Historia' => $Historia]);
            while($registro2 = $resultado->fetch(PDO::FETCH_ASSOC)){
                $r = new ObjetoDatosAdministrativos();
                    $r->setId($registro2["id"]);
                    $r->setTipoSolicitud($registro2["tipoSolicitud"]);
                    $r->setnumeroHistoria($registro2["numeroHistoria"]);
                    $r->setidentificacionPaciente($registro2["identificacionPaciente"]);
                    $r->setMedicoSolicitante($registro2["medicoSolicitante"]);
                    $r->setServicioRemite($registro2["servicioRemite"]);
                    $r->setServicioRemitido($registro2["servicioRemitido"]);
                    $r->setEntidadResponsablePago($registro2["entidadResponsablePago"]);
                    $r->setTelefono($registro2["telefono"]);
                    $r->setEspecialidadRemite($registro2["especialidadRemite"]);
                    $r->setEspecialidadRemitido($registro2["especialidadRemitido"]);
                    $r->setobservaciones($registro2["observaciones"]);
                    $r->setFechaAgregado($registro2["fechaAgregado"]);
                    $r->setfkIdMedico($registro2["fkIdMedico"]);
                    $r->setTomada($registro2["tomada"]);
                    $r->setfinalizado($registro2["finalizado"]);
                //$matriz[$contador] = $r;
                //$contador++;
            }
            return $r;
        }




        public function aplicarTomadaRemisionr( $e,$numeroHistoria){
			//$id = $e->getId();
			$sql = $this->connect()->prepare("UPDATE datosremision SET 
							tomada = :tomada
						WHERE numeroHistoria = :numeroHistoria");
			$sql->execute([ 'tomada' => $e
                            , 'numeroHistoria' => $numeroHistoria]);
		}

        public function aplicarTomadaRemision(ObjetoDatosAdministrativos $e,$numeroHistoria){
			//$id = $e->getId();
			$sql = $this->connect()->prepare("UPDATE datosremision SET 
							tomada = :tomada
						WHERE numeroHistoria = :numeroHistoria");
			$sql->execute([ 'tomada' => $e->getTomada()
                            , 'numeroHistoria' => $numeroHistoria]);
		}

        public function finalizarDatosRemision($id){
			$sql = $this->connect()->prepare("UPDATE datosremision SET 
							finalizado = :finalizado
						WHERE id = :id");
			$sql->execute(['finalizado' => 1, 'id' => $id]);
		}
        
// ORDER BY fechaAgregado DESC




    }