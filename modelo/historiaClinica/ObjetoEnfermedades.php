<?php
/**
 * 
 */

class ObjetoEnfermedades
{

    private $id;
    private $numeroHistoria;
    private $identificacionPaciente;
    private $CV;
    private $respiratorio;
    private $gastrointestinales;
    private $nefrourologicos;
    private $neurologicos;
    private $hematologicos;
    private $ginecologicos;
    private $infectologicos;
    private $endocrinologicos;
    private $quirurgicos;
    private $traumatologicos;
    private $alergicos;
    private $fk_IdHistoriaClinica;
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


    public function getCV(){
        return $this->CV;
    }
    public function setCV($CV){
        $this->CV = $CV;
    }


    public function getrespiratorio(){
        return $this->respiratorio;
    }
    public function setrespiratorio($respiratorio){
        $this->respiratorio = $respiratorio;
    }


    public function getgastrointestinales(){
        return $this->gastrointestinales;
    }
    public function setgastrointestinales($gastrointestinales){
        $this->gastrointestinales = $gastrointestinales;
    }


    public function getnefrourologicos(){
        return $this->nefrourologicos;
    }
    public function setnefrourologicos($nefrourologicos){
        $this->nefrourologicos = $nefrourologicos;
    }



    public function getneurologicos(){
        return $this->neurologicos;
    }
    public function setneurologicos($neurologicos){
        $this->neurologicos = $neurologicos;
    }


    public function gethematologicos(){
        return $this->hematologicos;
    }
    public function sethematologicos($hematologicos){
        $this->hematologicos = $hematologicos;
    }



    public function getginecologicos(){
        return $this->ginecologicos;
    }
    public function setginecologicos($ginecologicos){
        $this->ginecologicos = $ginecologicos;
    }


    public function getinfectologicos(){
        return $this->infectologicos;
    }
    public function setinfectologicos($infectologicos){
        $this->infectologicos = $infectologicos;
    }



    public function getendocrinologicos(){
        return $this->endocrinologicos;
    }
    public function setendocrinologicos($endocrinologicos){
        $this->endocrinologicos = $endocrinologicos;
    }


    public function getquirurgicos(){
        return $this->quirurgicos;
    }
    public function setquirurgicos($quirurgicos){
        $this->quirurgicos = $quirurgicos;
    }


    public function gettraumatologicos(){
        return $this->traumatologicos;
    }
    public function settraumatologicos($traumatologicos){
        $this->traumatologicos = $traumatologicos;
    }


    
    public function getalergicos(){
        return $this->alergicos;
    }
    public function setalergicos($alergicos){
        $this->alergicos = $alergicos;
    }





    public function getfk_IdHistoriaClinica(){
        return $this->fk_IdHistoriaClinica;
    }
    public function setfk_IdHistoriaClinica($fk_IdHistoriaClinica){
        $this->fk_IdHistoriaClinica = $fk_IdHistoriaClinica;
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