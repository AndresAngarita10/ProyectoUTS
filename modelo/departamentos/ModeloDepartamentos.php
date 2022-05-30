<?php 

    include_once("ObjetoDepartamentos.php");
    include_once 'ObjetoDepartamentos.php';
    include_once '../../modelo/Conexion.php';


    class ModeloDepartamentos extends Conexion 
    {
   
        public function mostrardepartamentos(){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM departamentos ");
            $resultado->execute();
            while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                $departamentos = new ObjetoDepartamentos();

                $departamentos->setId_departamento($registro["id_departamento"]);
                $departamentos->setDepartamento($registro["departamento"]);
                $matriz[$contador] = $departamentos;
                $contador++;
            }
            return $matriz;
        }
    }