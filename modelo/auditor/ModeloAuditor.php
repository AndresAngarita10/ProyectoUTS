<?php 

    include_once("ObjetoAuditor.php");
    include_once("ObjetoAuditor.php");
    include_once '../../modelo/Conexion.php';


    class ModeloAuditor extends Conexion 
    {
        public function insertar(ObjetoAuditor $Aud){

			$sql = $this->connect()->prepare("INSERT INTO auditor (
                                                 tipoDocumento, numeroDocumento, primerNombre
                                                , segundoNombre, primerApellido, segundoApellido
                                                , correo, ciudad, direccion, telefono
                                                , habilitado, fechaAgregado) 
                                                values (
                                                 :tipoDocumento, :numeroDocumento, :primerNombre
                                                , :segundoNombre, :primerApellido, :segundoApellido
                                                , :correo, :ciudad, :direccion, :telefono
                                                , :habilitado, :fechaAgregado)");

			$sql->execute(['tipoDocumento' => $Aud->getTipoDocumento(), 'numeroDocumento' => $Aud->getNumeroDocumento()
            , 'primerNombre' => $Aud->getPrimerNombre(), 'segundoNombre' => $Aud->getSegundoNombre()
            , 'primerApellido' => $Aud->getPrimerApellido(), 'segundoApellido' => $Aud->getSegundoApellido()
            , 'correo' => $Aud->getCorreo(), 'ciudad' => $Aud->getCiudad(), 'direccion' => $Aud->getDireccion()
            , 'telefono' => $Aud->getTelefono(), 'habilitado' => $Aud->getHabilitado()
            , 'fechaAgregado' => $Aud->getFechaAgregado()]);
			//$this->acceso->exec($sql);
		}

        public function getAuditorXCedula($cedula){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM auditor  WHERE numeroDocumento = :cedula ");
            $resultado->execute(['cedula' => $cedula]);
            if($resultado!=null){
                while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $auditor = new ObjetoAuditor();
    
                    $auditor->setId($registro["id"]);
                    $auditor->setTipoDocumento($registro["tipoDocumento"]);
                    $auditor->setNumeroDocumento($registro["numeroDocumento"]);
                    $auditor->setPrimerNombre($registro["primerNombre"]);
                    $auditor->setSegundoNombre($registro["segundoNombre"]);
                    $auditor->setPrimerApellido($registro["primerApellido"]);
                    $auditor->setSegundoApellido($registro["segundoApellido"]);
                    $auditor->setCorreo($registro["correo"]);
                    $auditor->setciudad($registro["ciudad"]);
                    $auditor->setDireccion($registro["direccion"]);
                    $auditor->setTelefono($registro["telefono"]);
                    $auditor->setHabilitado($registro["habilitado"]);
                    $auditor->setFechaAgregado($registro["fechaAgregado"]);
                }
                
                return $auditor;
            }else {
                return null;
                
            }
            
        }

        public function actualizaAuditor(ObjetoAuditor $e){
			$id = $e->getId();
            //echo $id;
			$sql = $this->connect()->prepare("UPDATE auditor SET 
							tipoDocumento = :tipoDocumento,
							numeroDocumento = :numeroDocumento,
							primerNombre = :primerNombre,
							segundoNombre = :segundoNombre,
							primerApellido = :primerApellido,
							segundoApellido = :segundoApellido,
							correo = :correo,
							ciudad = :ciudad,
							direccion = :direccion,
							telefono = :telefono
						WHERE id = :id");
			$sql->execute(['tipoDocumento' => $e->getTipoDocumento()
                            , 'numeroDocumento' => $e->getNumeroDocumento(), 'primerNombre' => $e->getPrimerNombre()
                            , 'segundoNombre' => $e->getSegundoNombre()
							, 'primerApellido' => $e->getPrimerApellido(), 'segundoApellido' => $e->getSegundoApellido()
							, 'correo' => $e->getCorreo(), 'ciudad' => $e->getCiudad(), 'direccion' => $e->getDireccion()
							, 'telefono' => $e->getTelefono(), 'id' => $id]);
		}

    }

    ?>