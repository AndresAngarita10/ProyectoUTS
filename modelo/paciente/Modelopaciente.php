<?php 

    include_once("ObjetoPaciente.php");
    include_once("ObjetoPaciente.php");
    include_once '../../modelo/Conexion.php';


    class ModeloPaciente extends Conexion 
    {
        public function insertar(ObjetoPaciente $Paciente){

			$sql = $this->connect()->prepare("INSERT INTO paciente (
                                                 tipoDocumento, numeroDocumento, primerNombre
                                                , segundoNombre, primerApellido, segundoApellido, pais, departamento
                                                , ciudad, fechaNacimiento, correo, direccion, telefono
                                                , eps, tipoContribuyente, fechaAgregado, acompanante, habilitado) 
                                                values (
                                                 :tipoDocumento, :numeroDocumento, :primerNombre
                                                , :segundoNombre, :primerApellido, :segundoApellido, :pais, :departamento
                                                , :ciudad, :fechaNacimiento, :correo, :direccion, :telefono
                                                , :eps, :tipoContribuyente, :fechaAgregado, :acompanante, :habilitado)");

			$sql->execute(['tipoDocumento' => $Paciente->getTipoDocumento(), 'numeroDocumento' => $Paciente->getNumeroDocumento()
            , 'primerNombre' => $Paciente->getPrimerNombre(), 'segundoNombre' => $Paciente->getSegundoNombre()
            , 'primerApellido' => $Paciente->getPrimerApellido(), 'segundoApellido' => $Paciente->getSegundoApellido()
            , 'pais' => $Paciente->getPais(), 'departamento' => $Paciente->getDepartamento()
            , 'ciudad' => $Paciente->getCiudad(), 'fechaNacimiento' => $Paciente->getFechaNacimiento()
            , 'correo' => $Paciente->getCorreo(), 'direccion' => $Paciente->getDireccion()
            , 'telefono' => $Paciente->getTelefono(), 'eps' => $Paciente->getEps()
            , 'tipoContribuyente' => $Paciente->getTipoContribuyente(), 'fechaAgregado' => $Paciente->getFechaAgregado()
            , 'acompanante'=> $Paciente->getAcompañante(), 'habilitado' => $Paciente->getHabilitado()]);
			//$this->acceso->exec($sql);
		}


        public function getPacientes(){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM paciente WHERE habilitado = 1 ORDER BY fechaAgregado DESC ");
            $resultado->execute([]);
            while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                $paciente = new ObjetoPaciente();

                $paciente->setId($registro["id"]);
                $paciente->setTipoDocumento($registro["tipoDocumento"]);
                $paciente->setNumeroDocumento($registro["numeroDocumento"]);
                $paciente->setPrimerNombre($registro["primerNombre"]);
                $paciente->setSegundoNombre($registro["segundoNombre"]);
                $paciente->setPrimerApellido($registro["primerApellido"]);
                $paciente->setSegundoApellido($registro["segundoApellido"]);
                $paciente->setPais($registro["pais"]);
                $paciente->setDepartamento($registro["departamento"]);
                $paciente->setCiudad($registro["ciudad"]);
                $paciente->setFechaNacimiento($registro["fechaNacimiento"]);
                $paciente->setCorreo($registro["correo"]);
                $paciente->setDireccion($registro["direccion"]);
                $paciente->setTelefono($registro["telefono"]);
                $paciente->setEps($registro["eps"]);
                $paciente->setTipoContribuyente($registro["tipoContribuyente"]);
                $paciente->setFechaAgregado($registro["fechaAgregado"]);
                $paciente->setAcompañante($registro["acompanante"]);
                $matriz[$contador] = $paciente;
                $contador++;
            }
            return $matriz;
        }


        public function getPacientesXCedua($cedula){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM paciente  WHERE numeroDocumento = :cedula ");
            $resultado->execute(['cedula' => $cedula]);
            if($resultado!=null){
                while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $paciente = new ObjetoPaciente();
    
                    $paciente->setId($registro["id"]);
                    $paciente->setTipoDocumento($registro["tipoDocumento"]);
                    $paciente->setNumeroDocumento($registro["numeroDocumento"]);
                    $paciente->setPrimerNombre($registro["primerNombre"]);
                    $paciente->setSegundoNombre($registro["segundoNombre"]);
                    $paciente->setPrimerApellido($registro["primerApellido"]);
                    $paciente->setSegundoApellido($registro["segundoApellido"]);
                    $paciente->setPais($registro["pais"]);
                    $paciente->setDepartamento($registro["departamento"]);
                    $paciente->setCiudad($registro["ciudad"]);
                    $paciente->setFechaNacimiento($registro["fechaNacimiento"]);
                    $paciente->setCorreo($registro["correo"]);
                    $paciente->setDireccion($registro["direccion"]);
                    $paciente->setTelefono($registro["telefono"]);
                    $paciente->setEps($registro["eps"]);
                    $paciente->setTipoContribuyente($registro["tipoContribuyente"]);
                    $paciente->setFechaAgregado($registro["fechaAgregado"]);
                    $paciente->setAcompañante($registro["acompanante"]);
                    $paciente->setHabilitado($registro["habilitado"]);
                }
                
                return $paciente;
            }else {
                return null;
                
            }
            
        }

        public function actualizaPaciente(ObjetoPaciente $e){
			$id = $e->getId();
			$sql = $this->connect()->prepare("UPDATE paciente SET 
							tipoDocumento = :tipoDocumento,
							numeroDocumento = :numeroDocumento,
							primerNombre = :primerNombre,
							segundoNombre = :segundoNombre,
							primerApellido = :primerApellido,
							segundoApellido = :segundoApellido,
							pais = :pais,
							departamento = :departamento,
							ciudad = :ciudad,
							fechaNacimiento = :fechaNacimiento,
							correo = :correo,
							direccion = :direccion,
							telefono = :telefono,
							eps = :eps,
							tipoContribuyente = :tipoContribuyente
						WHERE id = :id");
			$sql->execute(['tipoDocumento' => $e->getTipoDocumento()
                            , 'numeroDocumento' => $e->getNumeroDocumento(), 'primerNombre' => $e->getPrimerNombre()
                            , 'segundoNombre' => $e->getSegundoNombre()
							, 'primerApellido' => $e->getPrimerApellido(), 'segundoApellido' => $e->getSegundoApellido()
							, 'pais' => $e->getPais(), 'departamento' => $e->getDepartamento()
							, 'ciudad' => $e->getCiudad(), 'fechaNacimiento' => $e->getFechaNacimiento()
							, 'correo' => $e->getCorreo(), 'direccion' => $e->getDireccion()
							, 'telefono' => $e->getTelefono(), 'eps' => $e->getEps()
							, 'tipoContribuyente' => $e->getTipoContribuyente()
                            , 'id' => $id]);
		}

        public function actualizarEstadoAcompañante($e, $id){
			$sql = $this->connect()->prepare("UPDATE paciente SET 
							acompanante = :acompanante
						WHERE id = :id");
			$sql->execute(['acompanante' => $e, 'id' => $id]);
		}


        public function desabilitarPaciente($id){
			$sql = $this->connect()->prepare("UPDATE paciente SET 
							habilitado = :habilitado
						WHERE id = :id");
			$sql->execute(['habilitado' => 0, 'id' => $id]);
		}

        public function habilitarPaciente($id){
			$sql = $this->connect()->prepare("UPDATE paciente SET 
							habilitado = :habilitado
						WHERE id = :id");
			$sql->execute(['habilitado' => 1, 'id' => $id]);
		}


        public function getPacientesID($cedula){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM paciente  WHERE numeroDocumento = :cedula ");
            $resultado->execute(['cedula' => $cedula]);
            if($resultado!=null){
                while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $paciente = new ObjetoPaciente();
    
                    $paciente->setId($registro["id"]);
                }
                
                return $paciente;
            }else {
                return null;
                
            }
            
        }


    }


    

    ?>