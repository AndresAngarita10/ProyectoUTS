<?php
/**
 * 
 */

class ObjetoCitas
{	
    private $id;
    private $NumeroDocumento;
    private $NombrePaciente;
    private $Telefono;
    private $NumeroHistoria;
    private $Ciudad;
    private $Oficina;
    private $FechaCita;
    private $HoraCita;
    private $CCMedico;
    private $Fk_IdPaciente;
    private $Fk_IdMedico;
    private $Fk_IdAuxAdmin;
    private $Fk_IdRemision;
    private $FechaAgregado;
    private $AsistioPaciente;
    private $Confirmada;
    private $NoAsistio;
    private $TomoMedico;
    private $Cancelada;
    private $MotivoCancelacion;
    private $CedulaMedicoFinal;
    


    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }


    public function getNumeroDocumento(){
        return $this->NumeroDocumento;
    }
    public function setNumeroDocumento($NumeroDocumento){
        $this->NumeroDocumento = $NumeroDocumento;
    }

    
    public function getNombrePaciente(){
        return $this->NombrePaciente;
    }
    public function setnombrePaciente($NombrePaciente){
        $this->NombrePaciente = $NombrePaciente;
    }


    public function getTelefono(){
        return $this->Telefono;
    }
    public function setTelefono($Telefono){
        $this->Telefono = $Telefono;
    }


    
    public function getNumeroHistoria(){
        return $this->NumeroHistoria;
    }
    public function setNumeroHistoria($NumeroHistoria){
        $this->NumeroHistoria = $NumeroHistoria;
    }


    public function getCiudad(){
        return $this->Ciudad;
    }
    public function setciudad($Ciudad){
        $this->Ciudad = $Ciudad;
    }


    public function getOficina(){
        return $this->Oficina;
    }
    public function setOficina($Oficina){
        $this->Oficina = $Oficina;
    }


    public function getFechaCita(){
        return $this->FechaCita;
    }
    public function setFechaCita($FechaCita){
        $this->FechaCita = $FechaCita;
    }

    public function getHoraCita(){
        return $this->HoraCita;
    }
    public function setHoraCita($HoraCita){
        $this->HoraCita = $HoraCita;
    }

    public function getCCMedico(){
        return $this->CCMedico;
    }
    public function setCCMedico($CCMedico){
        $this->CCMedico = $CCMedico;
    }


    public function getFk_IdPaciente(){
        return $this->Fk_IdPaciente;
    }
    public function setFk_IdPaciente($Fk_IdPaciente){
        $this->Fk_IdPaciente = $Fk_IdPaciente;
    }

    public function getFk_IdMedico(){
        return $this->Fk_IdMedico;
    }
    public function setFk_IdMedico($Fk_IdMedico){
        $this->Fk_IdMedico = $Fk_IdMedico;
    }

    
    public function getFk_IdAuxAdmin(){
        return $this->Fk_IdAuxAdmin;
    }
    public function setFk_IdAuxAdmin($Fk_IdAuxAdmin){
        $this->Fk_IdAuxAdmin = $Fk_IdAuxAdmin;
    }


    public function getFk_IdRemision(){
        return $this->Fk_IdRemision;
    }
    public function setFk_IdRemision($Fk_IdRemision){
        $this->Fk_IdRemision = $Fk_IdRemision;
    }


    public function getFechaAgregado(){
        return $this->FechaAgregado;
    }
    public function setFechaAgregado($FechaAgregado){
        $this->FechaAgregado = $FechaAgregado;
    }


    public function getAsistioPaciente(){
        return $this->AsistioPaciente;
    }
    public function setAsistioPaciente($AsistioPaciente){
        $this->AsistioPaciente = $AsistioPaciente;
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


    
    public function getConfirmada(){
        return $this->Confirmada;
    }
    public function setConfirmada($Confirmada){
        $this->Confirmada = $Confirmada;
    }


    public function getNoAsistio(){
        return $this->NoAsistio;
    }
    public function setNoAsistio($NoAsistio){
        $this->NoAsistio = $NoAsistio;
    }


    
    public function getTomoMedico(){
        return $this->TomoMedico;
    }
    public function setTomoMedico($TomoMedico){
        $this->TomoMedico = $TomoMedico;
    }

    
    public function getCancelada(){
        return $this->Cancelada;
    }
    public function setCancelada($Cancelada){
        $this->Cancelada = $Cancelada;
    }

    
    public function getMotivoCancelacion(){
        return $this->MotivoCancelacion;
    }
    public function setMotivoCancelacion($MotivoCancelacion){
        $this->MotivoCancelacion = $MotivoCancelacion;
    }


    public function getCedulaMedicoFinal(){
        return $this->CedulaMedicoFinal;
    }
    public function setCedulaMedicoFinal($CedulaMedicoFinal){
        $this->CedulaMedicoFinal = $CedulaMedicoFinal;
    }


}
?>