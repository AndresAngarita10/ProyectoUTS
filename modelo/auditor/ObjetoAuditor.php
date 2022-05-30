<?php
/**
 * 
 */

class ObjetoAuditor
{	
    private $id;
    private $TipoDocumento;
    private $NumeroDocumento;
    private $PrimerNombre;
    private $SegundoNombre;
    private $PrimerApellido;
    private $SegundoApellido;
    private $Correo;
    private $Ciudad;
    private $Direccion;
    private $Telefono;
    private $Habilitado;
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

    public function getCiudad(){
        return $this->Ciudad;
    }
    public function setCiudad($Ciudad){
        $this->Ciudad = $Ciudad;
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



    public function getHabilitado(){
        return $this->Habilitado;
    }
    public function setHabilitado($Habilitado){
        $this->Habilitado = $Habilitado;
    }


    public function getFechaAgregado(){
        return $this->FechaAgregado;
    }
    public function setFechaAgregado($FechaAgregado){
        $this->FechaAgregado = $FechaAgregado;
    }




}
