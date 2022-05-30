<?php
/**
 * 
 */

class ObjetoRegistroSolicitud
{	
    private $id;
    private $CedulaPaciente;
    private $NombrePaciente;
    private $IdSolicitudRemision;
    private $MedicoSolicitante;
    private $CedulaMedico;
    private $Observacion;
    private $HistoriaClinica;
    private $CedAcompañante;
    private $fkIdPaciente;
    private $fkIdDatosRemision;
    private $FechaAgregado;
    private $UsuarioTerminooSolicitud;
    private $Finalizado;

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }


    public function getCedulaPaciente(){
        return $this->CedulaPaciente;
    }
    public function setCedulaPaciente($CedulaPaciente){
        $this->CedulaPaciente = $CedulaPaciente;
    }


    public function getNombrePaciente(){
        return $this->NombrePaciente;
    }
    public function setNombrePaciente($NombrePaciente){
        $this->NombrePaciente = $NombrePaciente;
    }


    public function getIdSolicitudRemision(){
        return $this->IdSolicitudRemision;
    }
    public function setIdSolicitudRemision($IdSolicitudRemision){
        $this->IdSolicitudRemision = $IdSolicitudRemision;
    }


    public function getMedicoSolicitante(){
        return $this->MedicoSolicitante;
    }
    public function setMedicoSolicitante($MedicoSolicitante){
        $this->MedicoSolicitante = $MedicoSolicitante;
    }

    
    public function getCedulaMedico(){
        return $this->CedulaMedico;
    }
    public function setCedulaMedico($CedulaMedico){
        $this->CedulaMedico = $CedulaMedico;
    }

    public function getObservacion(){
        return $this->Observacion;
    }
    public function setObservacion($Observacion){
        $this->Observacion = $Observacion;
    }

    public function getHistoriaClinica(){
        return $this->HistoriaClinica;
    }
    public function setHistoriaClinica($HistoriaClinica){
        $this->HistoriaClinica = $HistoriaClinica;
    }


    public function getCedAcompañante(){
        return $this->CedAcompañante;
    }
    public function setCedAcompañante($CedAcompañante){
        $this->CedAcompañante = $CedAcompañante;
    }

    public function getfkIdPaciente(){
        return $this->fkIdPaciente;
    }
    public function setfkIdPaciente($fkIdPaciente){
        $this->fkIdPaciente = $fkIdPaciente;
    }



    public function getfkIdDatosRemision(){
        return $this->fkIdDatosRemision;
    }
    public function setfkIdDatosRemision($fkIdDatosRemision){
        $this->fkIdDatosRemision = $fkIdDatosRemision;
    }



    public function getFechaAgregado(){
        return $this->FechaAgregado;
    }
    public function setFechaAgregado($FechaAgregado){
        $this->FechaAgregado = $FechaAgregado;
    }



    public function getUsuarioTerminooSolicitud(){
        return $this->UsuarioTerminooSolicitud;
    }
    public function setUsuarioTerminooSolicitud($UsuarioTerminooSolicitud){
        $this->UsuarioTerminooSolicitud = $UsuarioTerminooSolicitud;
    }



    public function getFinalizado(){
        return $this->Finalizado;
    }
    public function setFinalizado($Finalizado){
        $this->Finalizado = $Finalizado;
    }

}
?>