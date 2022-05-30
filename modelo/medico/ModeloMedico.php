<?php 

    include_once("ObjetoMedico.php");
    include_once("ObjetoMedico.php");
    include_once '../../modelo/Conexion.php';


    class ModeloMedico extends Conexion 
    {
        public function insertar(ObjetoMedico $Medico){

			$sql = $this->connect()->prepare("INSERT INTO medico (
                                                 tipoDocumento, numeroDocumento, primerNombre
                                                , segundoNombre, primerApellido, segundoApellido
                                                , correo, direccion, telefono
                                                , especialidad, activo, fechaAgregado) 
                                                values (
                                                 :tipoDocumento, :numeroDocumento, :primerNombre
                                                , :segundoNombre, :primerApellido, :segundoApellido
                                                , :correo, :direccion, :telefono
                                                , :especialidad, :activo, :fechaAgregado)");

			$sql->execute(['tipoDocumento' => $Medico->getTipoDocumento(), 'numeroDocumento' => $Medico->getNumeroDocumento()
            , 'primerNombre' => $Medico->getPrimerNombre(), 'segundoNombre' => $Medico->getSegundoNombre()
            , 'primerApellido' => $Medico->getPrimerApellido(), 'segundoApellido' => $Medico->getSegundoApellido()
            , 'correo' => $Medico->getCorreo(), 'direccion' => $Medico->getDireccion()
            , 'telefono' => $Medico->getTelefono(), 'especialidad' => $Medico->getEspecialidad()
            , 'activo' => $Medico->getActivo(), 'fechaAgregado' => $Medico->getFechaAgregado()]);
			//$this->acceso->exec($sql);
		}

        public function getMedicoXCedula($cedula){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM medico  WHERE numeroDocumento = :cedula ");
            $resultado->execute(['cedula' => $cedula]);
            if($resultado!=null){
                while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $medico = new ObjetoMedico();
    
                    $medico->setId($registro["id"]);
                    $medico->setTipoDocumento($registro["tipoDocumento"]);
                    $medico->setNumeroDocumento($registro["numeroDocumento"]);
                    $medico->setPrimerNombre($registro["primerNombre"]);
                    $medico->setSegundoNombre($registro["segundoNombre"]);
                    $medico->setPrimerApellido($registro["primerApellido"]);
                    $medico->setSegundoApellido($registro["segundoApellido"]);
                    $medico->setCorreo($registro["correo"]);
                    $medico->setCiudadTrabajo($registro["ciudadTrabajo"]);
                    $medico->setDireccion($registro["direccion"]);
                    $medico->setTelefono($registro["telefono"]);
                    $medico->setEspecialidad($registro["especialidad"]);
                    $medico->setActivo($registro["activo"]);
                    $medico->setFechaAgregado($registro["fechaAgregado"]);
                }
                
                return $medico;
            }else {
                return null;
                
            }
            
        }


        public function getMedicos(){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM medico /* WHERE activo = 1 */ ORDER BY fechaAgregado DESC ");
            $resultado->execute([]);
            while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                $medico = new ObjetoMedico();
    
                    $medico->setId($registro["id"]);
                    $medico->setTipoDocumento($registro["tipoDocumento"]);
                    $medico->setNumeroDocumento($registro["numeroDocumento"]);
                    $medico->setPrimerNombre($registro["primerNombre"]);
                    $medico->setSegundoNombre($registro["segundoNombre"]);
                    $medico->setPrimerApellido($registro["primerApellido"]);
                    $medico->setSegundoApellido($registro["segundoApellido"]);
                    $medico->setCorreo($registro["correo"]);
                    $medico->setCiudadTrabajo($registro["ciudadTrabajo"]);
                    $medico->setDireccion($registro["direccion"]);
                    $medico->setTelefono($registro["telefono"]);
                    $medico->setEspecialidad($registro["especialidad"]);
                    $medico->setActivo($registro["activo"]);
                    $medico->setFechaAgregado($registro["fechaAgregado"]);
                $matriz[$contador] = $medico;
                $contador++;
            }
            return $matriz;
        }

        public function getMedicosBucaramanga(){
            $matriz = array(); 
            $contador = 0;
            $bucaramanga = "bucaramanga";
            $resultado = $this->connect()->prepare("SELECT * FROM medico  WHERE activo = 1 AND ciudadTrabajo = :bucaramanga ORDER BY fechaAgregado DESC ");
            $resultado->execute(['bucaramanga' => $bucaramanga]);
            while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                $medico = new ObjetoMedico();
    
                    $medico->setId($registro["id"]);
                    $medico->setTipoDocumento($registro["tipoDocumento"]);
                    $medico->setNumeroDocumento($registro["numeroDocumento"]);
                    $medico->setPrimerNombre($registro["primerNombre"]);
                    $medico->setSegundoNombre($registro["segundoNombre"]);
                    $medico->setPrimerApellido($registro["primerApellido"]);
                    $medico->setSegundoApellido($registro["segundoApellido"]);
                    $medico->setCorreo($registro["correo"]);
                    $medico->setCiudadTrabajo($registro["ciudadTrabajo"]);
                    $medico->setDireccion($registro["direccion"]);
                    $medico->setTelefono($registro["telefono"]);
                    $medico->setEspecialidad($registro["especialidad"]);
                    $medico->setActivo($registro["activo"]);
                    $medico->setFechaAgregado($registro["fechaAgregado"]);
                $matriz[$contador] = $medico;
                $contador++;
            }
            return $matriz;
        }


        
        public function actualizaMedico(ObjetoMedico $e){
			$id = $e->getId();
			$sql = $this->connect()->prepare("UPDATE medico SET 
							tipoDocumento = :tipoDocumento,
							numeroDocumento = :numeroDocumento,
							primerNombre = :primerNombre,
							segundoNombre = :segundoNombre,
							primerApellido = :primerApellido,
							segundoApellido = :segundoApellido,
							correo = :correo,
							direccion = :direccion,
							telefono = :telefono,
							especialidad = :especialidad
						WHERE id = :id");
			$sql->execute(['tipoDocumento' => $e->getTipoDocumento()
                            , 'numeroDocumento' => $e->getNumeroDocumento(), 'primerNombre' => $e->getPrimerNombre()
                            , 'segundoNombre' => $e->getSegundoNombre()
							, 'primerApellido' => $e->getPrimerApellido(), 'segundoApellido' => $e->getSegundoApellido()
							, 'correo' => $e->getCorreo(), 'direccion' => $e->getDireccion()
							, 'telefono' => $e->getTelefono(), 'especialidad' => $e->getEspecialidad()
                            , 'id' => $id]);
		}

        public function desabilitarMedico($id){
			$sql = $this->connect()->prepare("UPDATE medico SET 
							activo = :activo
						WHERE id = :id");
			$sql->execute(['activo' => 0, 'id' => $id]);
		}

        public function habilitarMedico($id){
			$sql = $this->connect()->prepare("UPDATE medico SET 
							activo = :activo
						WHERE id = :id");
			$sql->execute(['activo' => 1, 'id' => $id]);
		}


        public function getMedicoID($cedula){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM medico  WHERE numeroDocumento = :cedula ");
            $resultado->execute(['cedula' => $cedula]);
            if($resultado!=null){
                while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $medico = new ObjetoMedico();
    
                    $medico->setId($registro["id"]);
                    $medico->setCiudadTrabajo($registro["ciudadTrabajo"]);
                }
                
                return $medico;
            }else {
                return null;
                
            }
            
        }

        public function getMedicoCodigo($codigo){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM medico  WHERE id = :codigo ");
            $resultado->execute(['codigo' => $codigo]);
            if($resultado!=null){
                while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $medico = new ObjetoMedico();
    
                    $medico->setId($registro["id"]);
                    $medico->setTipoDocumento($registro["tipoDocumento"]);
                    $medico->setNumeroDocumento($registro["numeroDocumento"]);
                    $medico->setPrimerNombre($registro["primerNombre"]);
                    $medico->setSegundoNombre($registro["segundoNombre"]);
                    $medico->setPrimerApellido($registro["primerApellido"]);
                    $medico->setSegundoApellido($registro["segundoApellido"]);
                    $medico->setCorreo($registro["correo"]);
                    $medico->setCiudadTrabajo($registro["ciudadTrabajo"]);
                    $medico->setDireccion($registro["direccion"]);
                    $medico->setTelefono($registro["telefono"]);
                    $medico->setEspecialidad($registro["especialidad"]);
                    $medico->setActivo($registro["activo"]);
                    $medico->setFechaAgregado($registro["fechaAgregado"]);
                }
                
                return $medico;
            }else {
                return null;
                
            }
            
        }


    }

    ?>