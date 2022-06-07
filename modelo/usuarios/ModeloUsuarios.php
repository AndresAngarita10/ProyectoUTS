<?php 

    include_once("ObjetoUsuarios.php");
    include_once("ObjetoUsuarios.php");
    include_once '../../modelo/Conexion.php';


    class ModeloUsuarios extends Conexion 
    {

        public function getUsuariosXCedua($cedula){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM usuarios  WHERE cedula = :cedula ");
            $resultado->execute(['cedula' => $cedula]);
            if($resultado!=null){
                while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $usuarios = new ObjetoUsuarios();
    
                    $usuarios->setId($registro["id"]);
                    $usuarios->setNombre($registro["nombre"]);
                    $usuarios->setCedula($registro["cedula"]);
                    $usuarios->setClave($registro["clave"]);
                    $usuarios->setTipoUsuario($registro["tipoUsuario"]);
                    $usuarios->setfkIdRol($registro["fkIdRol"]);
                    $usuarios->setFechaAgregado($registro["fechaAgregado"]);
                    $usuarios->setRolesActivos($registro["rolesActivos"]);
                    $usuarios->setHabilitado($registro["habilitado"]);
                    return $usuarios;
                }
                
                return null;
            }else {
                return null;
                
            }
            
        }


        public function insertar(ObjetoUsuarios $usuarios){

			$sql = $this->connect()->prepare("INSERT INTO usuarios (
                                                 nombre, cedula, clave
                                                , tipoUsuario, fkIdRol , fechaAgregado
                                                , rolesActivos, habilitado) 
                                                values (
                                                 :nombre, :cedula, :clave
                                                , :tipoUsuario, :fkIdRol, :fechaAgregado
                                                , :rolesActivos, :habilitado)");

			$sql->execute(['nombre' => $usuarios->getNombre(), 'cedula' => $usuarios->getCedula()
            , 'clave' => $usuarios->getClave(), 'tipoUsuario' => $usuarios->getTipoUsuario()
            , 'fkIdRol' => $usuarios->getfkIdRol(), 'fechaAgregado' => $usuarios->getFechaAgregado()
            , 'rolesActivos' => $usuarios->getRolesActivos(), 'habilitado' => $usuarios->getHabilitado()]);
			//$this->acceso->exec($sql);
		}

        public function actualizarContraseña($usuarios){
			$sql = $this->connect()->prepare("UPDATE usuarios SET 
							clave = :clave
						WHERE cedula = :cedula");
			$sql->execute(['clave' => $usuarios->getClave(), 'cedula' => $usuarios->getCedula()]);
		}

    }
