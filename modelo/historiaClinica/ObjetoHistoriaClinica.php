<?php
/**
 * 
 */

class ObjetoHistoriaClinica
{

    private $id;
    private $numeroHistoria;
    private $identificacionPaciente;
    private $identificacionMedico;
    private $motivoConsulta;
    private $enfermedadActual;
    private $antecedentesEnfActual;
    private $finalizado;
   
    private $fk_IdPaciente;
    private $frechaAgregado;
    private $fechaUltMod;


    public function getid(){
        return $this->id;
    }
    public function setid($id){
        $this->id = $id;
    }

    public function getnumeroHistoria(){
        return $this->numeroHistoria;
    }
    public function setnumeroHistoria($numeroHistoria){
        $this->numeroHistoria = $numeroHistoria;
    }


    public function getidentificacionPaciente(){
        return $this->identificacionPaciente;
    }
    public function setidentificacionPaciente($identificacionPaciente){
        $this->identificacionPaciente = $identificacionPaciente;
    }


    public function getidentificacionMedico(){
        return $this->identificacionMedico;
    }
    public function setidentificacionMedico($identificacionMedico){
        $this->identificacionMedico = $identificacionMedico;
    }


    public function getmotivoConsulta(){
        return $this->motivoConsulta;
    }
    public function setmotivoConsulta($motivoConsulta){
        $this->motivoConsulta = $motivoConsulta;
    }


    public function getenfermedadActual(){
        return $this->enfermedadActual;
    }
    public function setenfermedadActual($enfermedadActual){
        $this->enfermedadActual = $enfermedadActual;
    }


    public function getantecedentesEnfActual(){
        return $this->antecedentesEnfActual;
    }
    public function setantecedentesEnfActual($antecedentesEnfActual){
        $this->antecedentesEnfActual = $antecedentesEnfActual;
    }


    public function getfinalizado(){
        return $this->finalizado;
    }
    public function setfinalizado($finalizado){
        $this->finalizado = $finalizado;
    }

    

    public function getfk_IdPaciente(){
        return $this->fk_IdPaciente;
    }
    public function setfk_IdPaciente($fk_IdPaciente){
        $this->fk_IdPaciente = $fk_IdPaciente;
    }


    public function getfrechaAgregado(){
        return $this->frechaAgregado;
    }
    public function setfrechaAgregado($frechaAgregado){
        $this->frechaAgregado = $frechaAgregado;
    }



    public function getfechaUltMod(){
        return $this->fechaUltMod;
    }
    public function setfechaUltMod($fechaUltMod){
        $this->fechaUltMod = $fechaUltMod;
    }


    
}