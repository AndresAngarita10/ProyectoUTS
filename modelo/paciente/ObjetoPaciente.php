<?php
/**
 * 
 */

class ObjetoPaciente
{	
    private $id;
    private $TipoDocumento;
    private $NumeroDocumento;
    private $PrimerNombre;
    private $SegundoNombre;
    private $PrimerApellido;
    private $SegundoApellido;
    private $Pais;
    private $Departamento;
    private $Ciudad;
    private $FechaNacimiento;
    private $Correo;
    private $Direccion;
    private $Telefono;
    private $Eps;
    private $TipoContribuyente;
    private $FechaAgregado;
    private $Acompañante;
    private $Habilitado;

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


    public function getPais(){
        return $this->Pais;
    }
    public function setPais($Pais){
        $this->Pais = $Pais;
    }


    public function getDepartamento(){
        return $this->Departamento;
    }
    public function setDepartamento($Departamento){
        $this->Departamento = $Departamento;
    }


    public function getCiudad(){
        return $this->Ciudad;
    }
    public function setCiudad($Ciudad){
        $this->Ciudad = $Ciudad;
    }


    public function getFechaNacimiento(){
        return $this->FechaNacimiento;
    }
    public function setFechaNacimiento($FechaNacimiento){
        $this->FechaNacimiento = $FechaNacimiento;
    }


    public function getCorreo(){
        return $this->Correo;
    }
    public function setCorreo($Correo){
        $this->Correo = $Correo;
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


    public function getEps(){
        return $this->Eps;
    }
    public function setEps($Eps){
        $this->Eps = $Eps;
    }


    public function getTipoContribuyente(){
        return $this->TipoContribuyente;
    }
    public function setTipoContribuyente($TipoContribuyente){
        $this->TipoContribuyente = $TipoContribuyente;
    }


    public function getFechaAgregado(){
        return $this->FechaAgregado;
    }
    public function setFechaAgregado($FechaAgregado){
        $this->FechaAgregado = $FechaAgregado;
    }
    

    public function getAcompañante(){
        return $this->Acompañante;
    }
    public function setAcompañante($Acompañante){
        $this->Acompañante = $Acompañante;
    }

    public function getHabilitado(){
        return $this->Habilitado;
    }
    public function setHabilitado($Habilitado){
        $this->Habilitado = $Habilitado;
    }





}
