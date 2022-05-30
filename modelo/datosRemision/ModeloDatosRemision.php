<?php 

    include_once("ObjetoDatosAdministrativos.php");
    include_once '../../modelo/Conexion.php';


    class ModeloDatosRemision extends Conexion 
    {


        public function validarRemisionActiva($numeroHistoria){
                    $matriz = array(); 
                    $contador = 0;
                    $resultado = $this->connect()->prepare("SELECT * FROM datosremision  WHERE numeroHistoria = :numeroHistoria  ");
                    $resultado->execute(['numeroHistoria' => $numeroHistoria]);
                        $remitir = new ObjetoDatosAdministrativos();
                        while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){

                            $remitir->setId($registro["id"]);
                            $remitir->setTipoSolicitud($registro["tipoSolicitud"]);
                            $remitir->setnumeroHistoria($registro["numeroHistoria"]);
                            $remitir->setidentificacionPaciente($registro["identificacionPaciente"]);
                            $remitir->setMedicoSolicitante($registro["medicoSolicitante"]);
                            $remitir->setServicioRemite($registro["servicioRemite"]);
                            $remitir->setServicioRemitido($registro["servicioRemitido"]);
                            $remitir->setEntidadResponsablePago($registro["entidadResponsablePago"]);
                            $remitir->setTelefono($registro["telefono"]);
                            $remitir->setEspecialidadRemite($registro["especialidadRemite"]);
                            $remitir->setEspecialidadRemitido($registro["especialidadRemitido"]);
                            $remitir->setobservaciones($registro["observaciones"]);
                            $remitir->setFechaAgregado($registro["fechaAgregado"]);
                            $remitir->setfkIdMedico($registro["fkIdMedico"]);
                            $remitir->setfinalizado($registro["finalizado"]);
                            $matriz[$contador] = $remitir;
                            $contador++;
                        }
                        
                        return $matriz;
                    
                }

                public function getRemisionFase1(){
                    $matriz = array(); 
                    $contador = 0;
                    $resultado = $this->connect()->prepare("SELECT * FROM datosremision  ORDER BY fechaAgregado DESC ");
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
                
        // ORDER BY fechaAgregado DESC
        
        public function getAllRemisionFinalizado(){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM datosremision  WHERE finalizado = 1 ORDER BY fechaAgregado ASC ");
            $resultado->execute([]);
                while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $remitir = new ObjetoDatosAdministrativos();

                    $remitir->setId($registro["id"]);
                    $remitir->setTipoSolicitud($registro["tipoSolicitud"]);
                    $remitir->setnumeroHistoria($registro["numeroHistoria"]);
                    $remitir->setidentificacionPaciente($registro["identificacionPaciente"]);
                    $remitir->setMedicoSolicitante($registro["medicoSolicitante"]);
                    $remitir->setServicioRemite($registro["servicioRemite"]);
                    $remitir->setServicioRemitido($registro["servicioRemitido"]);
                    $remitir->setEntidadResponsablePago($registro["entidadResponsablePago"]);
                    $remitir->setTelefono($registro["telefono"]);
                    $remitir->setEspecialidadRemite($registro["especialidadRemite"]);
                    $remitir->setEspecialidadRemitido($registro["especialidadRemitido"]);
                    $remitir->setobservaciones($registro["observaciones"]);
                    $remitir->setFechaAgregado($registro["fechaAgregado"]);
                    $remitir->setfkIdMedico($registro["fkIdMedico"]);
                    $remitir->setfinalizado($registro["finalizado"]);
                    $remitir->setAuditado($registro["auditado"]);
                    $matriz[$contador] = $remitir;
                    $contador++;
                }
                
                return $matriz;
            
        }

        public function getAllRemisionSinFinalizar(){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM datosremision  WHERE finalizado != 1 ORDER BY fechaAgregado ASC ");
            $resultado->execute([]);
                while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $remitir = new ObjetoDatosAdministrativos();

                    $remitir->setId($registro["id"]);
                    $remitir->setTipoSolicitud($registro["tipoSolicitud"]);
                    $remitir->setnumeroHistoria($registro["numeroHistoria"]);
                    $remitir->setidentificacionPaciente($registro["identificacionPaciente"]);
                    $remitir->setMedicoSolicitante($registro["medicoSolicitante"]);
                    $remitir->setServicioRemite($registro["servicioRemite"]);
                    $remitir->setServicioRemitido($registro["servicioRemitido"]);
                    $remitir->setEntidadResponsablePago($registro["entidadResponsablePago"]);
                    $remitir->setTelefono($registro["telefono"]);
                    $remitir->setEspecialidadRemite($registro["especialidadRemite"]);
                    $remitir->setEspecialidadRemitido($registro["especialidadRemitido"]);
                    $remitir->setobservaciones($registro["observaciones"]);
                    $remitir->setFechaAgregado($registro["fechaAgregado"]);
                    $remitir->setfkIdMedico($registro["fkIdMedico"]);
                    $remitir->setfinalizado($registro["finalizado"]);
                    $remitir->setAuditado($registro["auditado"]);
                    $matriz[$contador] = $remitir;
                    $contador++;
                }
                
                return $matriz;
            
        }
        
        }

    