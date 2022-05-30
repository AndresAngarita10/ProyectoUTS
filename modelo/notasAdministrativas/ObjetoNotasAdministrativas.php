<?php
/**
 * 
 */

class ObjetoNotasAdministrativas
{	
    private $id;
    private $IdRegistroSolicitud;
    private $Nota;
    private $FechaAgregado;
    private $UsuarioAgrego;

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }


    public function getIdRegistroSolicitud(){
        return $this->IdRegistroSolicitud;
    }
    public function setIdRegistroSolicitud($IdRegistroSolicitud){
        $this->IdRegistroSolicitud = $IdRegistroSolicitud;
    }


    public function getNota(){
        return $this->Nota;
    }
    public function setNota($Nota){
        $this->Nota = $Nota;
    }


    public function getFechaAgregado(){
        return $this->FechaAgregado;
    }
    public function setFechaAgregado($FechaAgregado){
        $this->FechaAgregado = $FechaAgregado;
    }


    public function getUsuarioAgrego(){
        return $this->UsuarioAgrego;
    }
    public function setUsuarioAgrego($UsuarioAgrego){
        $this->UsuarioAgrego = $UsuarioAgrego;
    }

}
?>