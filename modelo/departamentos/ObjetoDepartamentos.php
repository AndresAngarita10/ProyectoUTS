<?php
/**
 * 
 */

class ObjetoDepartamentos
{

    private $id_departamento;
    private $departamento;


    public function getId_departamento(){
        return $this->id_departamento;
    }
    public function setId_departamento($id_departamento){
        $this->id_departamento = $id_departamento;
    }


    public function getDepartamento(){
        return $this->departamento;
    }
    public function setDepartamento($departamento){
        $this->departamento = $departamento;
    }


   
}