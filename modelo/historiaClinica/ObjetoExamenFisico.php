<?php
/**
 * 
 */

class ObjetoExamenFisico
{

    private $id;
    private $numeroHistoria;
    private $identificacionPaciente;
    private $TA;
    private $FC;
    private $FR;
    private $temperatura;
    private $peso;
    private $altura;
    private $imc;
    private $impresionGeneral;
    private $constitucion;
    private $facies;
    private $actitud;
    private $decubito;
    private $marcha;
    private $aspecto;
    private $lesiones;
    private $fk_IdHistoriaClinica;
    private $frechaAgregado;
    private $fechaUltMod;
    private $SegundoExamen;


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


    public function getTA(){
        return $this->TA;
    }
    public function setTA($TA){
        $this->TA = $TA;
    }


    public function getFC(){
        return $this->FC;
    }
    public function setFC($FC){
        $this->FC = $FC;
    }


    public function getFR(){
        return $this->FR;
    }
    public function setFR($FR){
        $this->FR = $FR;
    }


    public function gettemperatura(){
        return $this->temperatura;
    }
    public function settemperatura($temperatura){
        $this->temperatura = $temperatura;
    }



    public function getpeso(){
        return $this->peso;
    }
    public function setpeso($peso){
        $this->peso = $peso;
    }


    public function getaltura(){
        return $this->altura;
    }
    public function setaltura($altura){
        $this->altura = $altura;
    }



    public function getimc(){
        return $this->imc;
    }
    public function setimc($imc){
        $this->imc = $imc;
    }


    public function getimpresionGeneral(){
        return $this->impresionGeneral;
    }
    public function setimpresionGeneral($impresionGeneral){
        $this->impresionGeneral = $impresionGeneral;
    }



    public function getconstitucion(){
        return $this->constitucion;
    }
    public function setconstitucion($constitucion){
        $this->constitucion = $constitucion;
    }


    public function getfacies(){
        return $this->facies;
    }
    public function setfacies($facies){
        $this->facies = $facies;
    }


    public function getactitud(){
        return $this->actitud;
    }
    public function setactitud($actitud){
        $this->actitud = $actitud;
    }


    
    public function getdecubito(){
        return $this->decubito;
    }
    public function setdecubito($decubito){
        $this->decubito = $decubito;
    }


    
    public function getmarcha(){
        return $this->marcha;
    }
    public function setmarcha($marcha){
        $this->marcha = $marcha;
    }


    
    public function getaspecto(){
        return $this->aspecto;
    }
    public function setaspecto($aspecto){
        $this->aspecto = $aspecto;
    }


    
    public function getlesiones(){
        return $this->lesiones;
    }
    public function setlesiones($lesiones){
        $this->lesiones = $lesiones;
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


    
    public function getSegundoExamen(){
        return $this->SegundoExamen;
    }
    public function setSegundoExamen($SegundoExamen){
        $this->SegundoExamen = $SegundoExamen;
    }


    
}