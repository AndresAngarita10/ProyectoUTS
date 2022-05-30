<?php 

    include_once("ObjetoCiudades.php");
    include_once 'ObjetoCiudades.php';
    include_once '../../modelo/Conexion.php';


    class ModeloCiudades extends Conexion 
    {
   
        public function mostrarciudad(){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM municipios ");
            $resultado->execute();
            while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                $ciudades = new ObjetoCiudades();

                $ciudades->setid_municipio($registro["id_municipio"]);
                $ciudades->setmunicipio($registro["municipio"]);
                $ciudades->setestado($registro["estado"]);
                $ciudades->setdepartamento_id($registro["departamento_id"]);
                $matriz[$contador] = $ciudades;
                $contador++;
            }
            return $matriz;
        }
    }