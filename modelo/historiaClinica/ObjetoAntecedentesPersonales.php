<?php
/**
 * 
 */

class ObjetoAntecedentesPersonales
{

    private $id;
    private $numeroHistoria;
    private $identificacionPaciente;
    private $alcoholHT;
    private $tabacoHT;
    private $drogasHT;
    private $infucionesHT;
    private $alimentacionHF;
    private $diuresisHF;
    private $catarsisHF;
    private $sueñoHF;
    private $sexualidadHF;
    private $otrosHF;
    private $enfermedadesInfancia;
    private $fk_IdHistoriaClinica;
    private $antecedentesHeredados;
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


    public function getalcoholHT(){
        return $this->alcoholHT;
    }
    public function setalcoholHT($alcoholHT){
        $this->alcoholHT = $alcoholHT;
    }

    
    public function gettabacoHT(){
        return $this->tabacoHT;
    }
    public function settabacoHT($tabacoHT){
        $this->tabacoHT = $tabacoHT;
    }


    public function getdrogasHT(){
        return $this->drogasHT;
    }
    public function setdrogasHT($drogasHT){
        $this->drogasHT = $drogasHT;
    }


    public function getinfucionesHT(){
        return $this->infucionesHT;
    }
    public function setinfucionesHT($infucionesHT){
        $this->infucionesHT = $infucionesHT;
    }


    public function getalimentacionHF(){
        return $this->alimentacionHF;
    }
    public function setalimentacionHF($alimentacionHF){
        $this->alimentacionHF = $alimentacionHF;
    }



    public function getdiuresisHF(){
        return $this->diuresisHF;
    }
    public function setdiuresisHF($diuresisHF){
        $this->diuresisHF = $diuresisHF;
    }


    public function getcatarsisHF(){
        return $this->catarsisHF;
    }
    public function setcatarsisHF($catarsisHF){
        $this->catarsisHF = $catarsisHF;
    }



    public function getsueñoHF(){
        return $this->sueñoHF;
    }
    public function setsueñoHF($sueñoHF){
        $this->sueñoHF = $sueñoHF;
    }


    public function getsexualidadHF(){
        return $this->sexualidadHF;
    }
    public function setsexualidadHF($sexualidadHF){
        $this->sexualidadHF = $sexualidadHF;
    }



    public function getotrosHF(){
        return $this->otrosHF;
    }
    public function setotrosHF($otrosHF){
        $this->otrosHF = $otrosHF;
    }


    public function getenfermedadesInfancia(){
        return $this->enfermedadesInfancia;
    }
    public function setenfermedadesInfancia($enfermedadesInfancia){
        $this->enfermedadesInfancia = $enfermedadesInfancia;
    }



    public function getfk_IdHistoriaClinica(){
        return $this->fk_IdHistoriaClinica;
    }
    public function setfk_IdHistoriaClinica($fk_IdHistoriaClinica){
        $this->fk_IdHistoriaClinica = $fk_IdHistoriaClinica;
    }


    public function getantecedentesHeredados(){
        return $this->antecedentesHeredados;
    }
    public function setantecedentesHeredados($antecedentesHeredados){
        $this->antecedentesHeredados = $antecedentesHeredados;
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