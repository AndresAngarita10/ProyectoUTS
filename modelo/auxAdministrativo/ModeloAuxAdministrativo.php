<?php 

    include_once("ObjetoAuxAdministrativo.php");
    include_once("ObjetoAuxAdministrativo.php");
    include_once '../../modelo/Conexion.php';


    class ModeloAuxiliar extends Conexion 
    {
        public function insertar(ObjetoAuxAdministrativo $Aux){

			$sql = $this->connect()->prepare("INSERT INTO auxadministrativo (
                                                 tipoDocumento, numeroDocumento, primerNombre
                                                , segundoNombre, primerApellido, segundoApellido
                                                , correo, direccion, telefono
                                                , activo, fechaAgregado) 
                                                values (
                                                 :tipoDocumento, :numeroDocumento, :primerNombre
                                                , :segundoNombre, :primerApellido, :segundoApellido
                                                , :correo, :direccion, :telefono
                                                , :activo, :fechaAgregado)");

			$sql->execute(['tipoDocumento' => $Aux->getTipoDocumento(), 'numeroDocumento' => $Aux->getNumeroDocumento()
            , 'primerNombre' => $Aux->getPrimerNombre(), 'segundoNombre' => $Aux->getSegundoNombre()
            , 'primerApellido' => $Aux->getPrimerApellido(), 'segundoApellido' => $Aux->getSegundoApellido()
            , 'correo' => $Aux->getCorreo(), 'direccion' => $Aux->getDireccion()
            , 'telefono' => $Aux->getTelefono(), 'activo' => $Aux->getActivo()
            , 'fechaAgregado' => $Aux->getFechaAgregado()]);
			//$this->acceso->exec($sql);
		}

        public function getAuxXCedula($cedula){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM auxadministrativo  WHERE numeroDocumento = :cedula ");
            $resultado->execute(['cedula' => $cedula]);
            if($resultado!=null){
                while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $aux = new ObjetoAuxAdministrativo();
    
                    $aux->setId($registro["id"]);
                    $aux->setTipoDocumento($registro["tipoDocumento"]);
                    $aux->setNumeroDocumento($registro["numeroDocumento"]);
                    $aux->setPrimerNombre($registro["primerNombre"]);
                    $aux->setSegundoNombre($registro["segundoNombre"]);
                    $aux->setPrimerApellido($registro["primerApellido"]);
                    $aux->setSegundoApellido($registro["segundoApellido"]);
                    $aux->setCorreo($registro["correo"]);
                    $aux->setDireccion($registro["direccion"]);
                    $aux->setTelefono($registro["telefono"]);
                    $aux->setActivo($registro["activo"]);
                    $aux->setFechaAgregado($registro["fechaAgregado"]);
                }
                
                return $aux;
            }else {
                return null;
                
            }
            
        }


        public function getAux(){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM auxadministrativo /* WHERE activo = 1 */ ORDER BY fechaAgregado DESC ");
            $resultado->execute([]);
            while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                $aux = new ObjetoAuxAdministrativo();
    
                    $aux->setId($registro["id"]);
                    $aux->setTipoDocumento($registro["tipoDocumento"]);
                    $aux->setNumeroDocumento($registro["numeroDocumento"]);
                    $aux->setPrimerNombre($registro["primerNombre"]);
                    $aux->setSegundoNombre($registro["segundoNombre"]);
                    $aux->setPrimerApellido($registro["primerApellido"]);
                    $aux->setSegundoApellido($registro["segundoApellido"]);
                    $aux->setCorreo($registro["correo"]);
                    $aux->setDireccion($registro["direccion"]);
                    $aux->setTelefono($registro["telefono"]);
                    $aux->setActivo($registro["activo"]);
                    $aux->setFechaAgregado($registro["fechaAgregado"]);
                $matriz[$contador] = $aux;
                $contador++;
            }
            return $matriz;
        }


        
        public function actualizaAux(ObjetoAuxAdministrativo $e){
			$id = $e->getId();
            //echo $id;
			$sql = $this->connect()->prepare("UPDATE auxadministrativo SET 
							tipoDocumento = :tipoDocumento,
							numeroDocumento = :numeroDocumento,
							primerNombre = :primerNombre,
							segundoNombre = :segundoNombre,
							primerApellido = :primerApellido,
							segundoApellido = :segundoApellido,
							correo = :correo,
							direccion = :direccion,
							telefono = :telefono
						WHERE id = :id");
			$sql->execute(['tipoDocumento' => $e->getTipoDocumento()
                            , 'numeroDocumento' => $e->getNumeroDocumento(), 'primerNombre' => $e->getPrimerNombre()
                            , 'segundoNombre' => $e->getSegundoNombre()
							, 'primerApellido' => $e->getPrimerApellido(), 'segundoApellido' => $e->getSegundoApellido()
							, 'correo' => $e->getCorreo(), 'direccion' => $e->getDireccion()
							, 'telefono' => $e->getTelefono(), 'id' => $id]);
		}

        public function desabilitarAux($id){
			$sql = $this->connect()->prepare("UPDATE auxadministrativo SET 
							activo = :activo
						WHERE id = :id");
			$sql->execute(['activo' => 0, 'id' => $id]);
		}

        public function habilitarAux($id){
			$sql = $this->connect()->prepare("UPDATE auxadministrativo SET 
							activo = :activo
						WHERE id = :id");
			$sql->execute(['activo' => 1, 'id' => $id]);
		}


        public function getAuxID($cedula){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM auxadministrativo  WHERE numeroDocumento = :cedula ");
            $resultado->execute(['cedula' => $cedula]);
            if($resultado!=null){
                while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $aux = new ObjetoAuxAdministrativo();
    
                    $aux->setId($registro["id"]);
                }
                
                return $aux;
            }else {
                return null;
                
            }
            
        }


    }

    ?>