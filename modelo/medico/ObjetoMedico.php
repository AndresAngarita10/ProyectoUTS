<?php
/**
 * 
 */

class ObjetoMedico
{	
    private $id;
    private $TipoDocumento;
    private $NumeroDocumento;
    private $PrimerNombre;
    private $SegundoNombre;
    private $PrimerApellido;
    private $SegundoApellido;
    private $Correo;
    private $CiudadTrabajo;
    private $Direccion;
    private $Telefono;
    private $Especialidad;
    private $Activo;
    private $FechaAgregado;

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }


    public function getTipoDocumento(){
        return $this->TipoDocumento;
    }
    public function setTipoDocumento($TipoDocumento){
        $this->TipoDocumento = $TipoDocumento;
    }


    public function getNumeroDocumento(){
        return $this->NumeroDocumento;
    }
    public function setNumeroDocumento($NumeroDocumento){
        $this->NumeroDocumento = $NumeroDocumento;
    }


    public function getPrimerNombre(){
        return $this->PrimerNombre;
    }
    public function setPrimerNombre($PrimerNombre){
        $this->PrimerNombre = $PrimerNombre;
    }


    public function getSegundoNombre(){
        return $this->SegundoNombre;
    }
    public function setSegundoNombre($SegundoNombre){
        $this->SegundoNombre = $SegundoNombre;
    }


    public function getPrimerApellido(){
        return $this->PrimerApellido;
    }
    public function setPrimerApellido($PrimerApellido){
        $this->PrimerApellido = $PrimerApellido;
    }



    public function getSegundoApellido(){
        return $this->SegundoApellido;
    }
    public function setSegundoApellido($SegundoApellido){
        $this->SegundoApellido = $SegundoApellido;
    }



    public function getCorreo(){
        return $this->Correo;
    }
    public function setCorreo($Correo){
        $this->Correo = $Correo;
    }


    
    public function getCiudadTrabajo(){
        return $this->CiudadTrabajo;
    }
    public function setCiudadTrabajo($CiudadTrabajo){
        $this->CiudadTrabajo = $CiudadTrabajo;
    }


    public function getDireccion(){
        return $this->Direccion;
    }
    public function setDireccion($Direccion){
        $this->Direccion = $Direccion;
    }


    public function getTelefono(){
        return $this->Telefono;
    }
    public function setTelefono($Telefono){
        $this->Telefono = $Telefono;
    }


    public function getEspecialidad(){
        return $this->Especialidad;
    }
    public function setEspecialidad($Especialidad){
        $this->Especialidad = $Especialidad;
    }


    public function getActivo(){
        return $this->Activo;
    }
    public function setActivo($Activo){
        $this->Activo = $Activo;
    }


    public function getFechaAgregado(){
        return $this->FechaAgregado;
    }
    public function setFechaAgregado($FechaAgregado){
        $this->FechaAgregado = $FechaAgregado;
    }




}
