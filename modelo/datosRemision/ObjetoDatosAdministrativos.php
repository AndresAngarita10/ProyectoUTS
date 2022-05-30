<?php
/**
 * 
 */

class ObjetoDatosAdministrativos
{	
    private $id;
    private $TipoSolicitud;
    private $identificacionPaciente;
    private $numeroHistoria;
    private $MedicoSolicitante;
    private $ServicioRemite;
    private $ServicioRemitido;
    private $EntidadResponsablePago;
    private $Telefono;
    private $EspecialidadRemite;
    private $EspecialidadRemitido;
    private $observaciones;
    private $FechaAgregado;
    private $fkIdMedico;
    private $Tomada;
    private $Finalizado;
    private $Auditado;
    


    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }


    public function getTipoSolicitud(){
        return $this->TipoSolicitud;
    }
    public function setTipoSolicitud($TipoSolicitud){
        $this->TipoSolicitud = $TipoSolicitud;
    }

    
    public function getidentificacionPaciente(){
        return $this->identificacionPaciente;
    }
    public function setidentificacionPaciente($identificacionPaciente){
        $this->identificacionPaciente = $identificacionPaciente;
    }


    
    public function getnumeroHistoria(){
        return $this->numeroHistoria;
    }
    public function setnumeroHistoria($numeroHistoria){
        $this->numeroHistoria = $numeroHistoria;
    }


    public function getMedicoSolicitante(){
        return $this->MedicoSolicitante;
    }
    public function setMedicoSolicitante($MedicoSolicitante){
        $this->MedicoSolicitante = $MedicoSolicitante;
    }


    public function getServicioRemite(){
        return $this->ServicioRemite;
    }
    public function setServicioRemite($ServicioRemite){
        $this->ServicioRemite = $ServicioRemite;
    }


    public function getServicioRemitido(){
        return $this->ServicioRemitido;
    }
    public function setServicioRemitido($ServicioRemitido){
        $this->ServicioRemitido = $ServicioRemitido;
    }

    public function getEntidadResponsablePago(){
        return $this->EntidadResponsablePago;
    }
    public function setEntidadResponsablePago($EntidadResponsablePago){
        $this->EntidadResponsablePago = $EntidadResponsablePago;
    }

    public function getTelefono(){
        return $this->Telefono;
    }
    public function setTelefono($Telefono){
        $this->Telefono = $Telefono;
    }


    public function getEspecialidadRemite(){
        return $this->EspecialidadRemite;
    }
    public function setEspecialidadRemite($EspecialidadRemite){
        $this->EspecialidadRemite = $EspecialidadRemite;
    }

    public function getEspecialidadRemitido(){
        return $this->EspecialidadRemitido;
    }
    public function setEspecialidadRemitido($EspecialidadRemitido){
        $this->EspecialidadRemitido = $EspecialidadRemitido;
    }

    
    public function getobservaciones(){
        return $this->observaciones;
    }
    public function setobservaciones($observaciones){
        $this->observaciones = $observaciones;
    }

    public function getFechaAgregado(){
        return $this->FechaAgregado;
    }
    public function setFechaAgregado($FechaAgregado){
        $this->FechaAgregado = $FechaAgregado;
    }


    public function getfkIdMedico(){
        return $this->fkIdMedico;
    }
    public function setfkIdMedico($fkIdMedico){
        $this->fkIdMedico = $fkIdMedico;
    }

    
    public function getTomada(){
        return $this->Tomada;
    }
    public function setTomada($Tomada){
        $this->Tomada = $Tomada;
    }

    
    public function getFinalizado(){
        return $this->Finalizado;
    }
    public function setFinalizado($Finalizado){
        $this->Finalizado = $Finalizado;
    }

    
    public function getAuditado(){
        return $this->Auditado;
    }
    public function setAuditado($Auditado){
        $this->Auditado = $Auditado;
    }


}
?>