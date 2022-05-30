<?php
/**
 * 
 */

class ObjetoCiudades
{

    private $id_municipio;
    private $municipio;
    private $estado;
    private $departamento_id;


    public function getid_municipio(){
        return $this->id_municipio;
    }
    public function setid_municipio($id_municipio){
        $this->id_municipio = $id_municipio;
    }


    public function getmunicipio(){
        return $this->municipio;
    }
    public function setmunicipio($municipio){
        $this->municipio = $municipio;
    }


    public function getestado(){
        return $this->estado;
    }
    public function setestado($estado){
        $this->estado = $estado;
    }


    public function getdepartamento_id(){
        return $this->departamento_id;
    }
    public function setdepartamento_id($departamento_id){
        $this->departamento_id = $departamento_id;
    }
}