<?php
/**
 * 
 */

class ObjetoRoles
{	
    private $id;
    private $Nombre;
    private $Permisos;

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }


    public function getNombre(){
        return $this->Nombre;
    }
    public function setNombre($Nombre){
        $this->Nombre = $Nombre;
    }


    public function getPermisos(){
        return $this->Permisos;
    }
    public function setPermisos($Permisos){
        $this->Permisos = $Permisos;
    }


}
?>