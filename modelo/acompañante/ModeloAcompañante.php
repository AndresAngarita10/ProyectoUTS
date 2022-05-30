<?php 

    include_once("ObjetoAcompañante.php");
    include_once("ObjetoAcompañante.php");
    include_once '../../modelo/Conexion.php';


    class ModeloAcompañante extends Conexion 
    {

        public function insertar(ObjetoAcompañante $acompañante){

			$sql = $this->connect()->prepare("INSERT INTO acompañante (
                                                 tipoDocumento, numeroDocumento, primerNombre
                                                , segundoNombre, primerApellido, segundoApellido
                                                , correo, direccion, telefono, parentesco
                                                , fechaAgregado , fkPacienteId) 
                                                values (
                                                 :tipoDocumento, :numeroDocumento, :primerNombre
                                                , :segundoNombre, :primerApellido, :segundoApellido
                                                , :correo, :direccion, :telefono, :parentesco
                                                , :fechaAgregado, :fkPacienteId)");

			$sql->execute(['tipoDocumento' => $acompañante->getTipoDocumento(), 'numeroDocumento' => $acompañante->getNumeroDocumento()
            , 'primerNombre' => $acompañante->getPrimerNombre(), 'segundoNombre' => $acompañante->getSegundoNombre()
            , 'primerApellido' => $acompañante->getPrimerApellido(), 'segundoApellido' => $acompañante->getSegundoApellido()
            , 'correo' => $acompañante->getCorreo(), 'direccion' => $acompañante->getDireccion()
            , 'telefono' => $acompañante->getTelefono(), 'parentesco' => $acompañante->getParentesco()
            , 'fechaAgregado' => $acompañante->getFechaAgregado(), 'fkPacienteId' => $acompañante->getfkPacienteId()]);
			//$this->acceso->exec($sql);
		}


    }
    ?>