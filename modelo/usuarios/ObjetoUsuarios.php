<?php
/**
 * 
 */

class ObjetoUsuarios
{	
    private $id;
    private $Nombre;
    private $Cedula;
    private $Clave;
    private $TipoUsuario;
    private $fkIdRol;
    private $FechaAgregado;
    private $RolesActivos;
    private $Habilitado;

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }


    public function getCedula(){
        return $this->Cedula;
    }
    public function setCedula($Cedula){
        $this->Cedula = $Cedula;
    }


    public function getNombre(){
        return $this->Nombre;
    }
    public function setNombre($Nombre){
        $this->Nombre = $Nombre;
    }




    public function getClave(){
        return $this->Clave;
    }
    public function setClave($Clave){
        $this->Clave = $Clave;
    }

    public function getfkIdRol(){
        return $this->fkIdRol;
    }
    public function setfkIdRol($fkIdRol){
        $this->fkIdRol = $fkIdRol;
    }

    public function getFechaAgregado(){
        return $this->FechaAgregado;
    }
    public function setFechaAgregado($FechaAgregado){
        $this->FechaAgregado = $FechaAgregado;
    }


    public function getHabilitado(){
        return $this->Habilitado;
    }
    public function setHabilitado($Habilitado){
        $this->Habilitado = $Habilitado;
    }

    
    public function getTipoUsuario(){
        return $this->TipoUsuario;
    }
    public function setTipoUsuario($TipoUsuario){
        $this->TipoUsuario = $TipoUsuario;
    }

    
    public function getRolesActivos(){
        return $this->RolesActivos;
    }
    public function setRolesActivos($RolesActivos){
        $this->RolesActivos = $RolesActivos;
    }


}
?>