<?php 

    include_once("ObjetoEspecialidad.php");
    include_once 'ObjetoEspecialidad.php';
    include_once '../../modelo/Conexion.php';


    class ModeloEspecialidad extends Conexion 
    {
   
        public function mostrarEspecialidad(){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM especialidades ");
            $resultado->execute();
            while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                $especialidad = new ObjetoEspecialidad();

                $especialidad->setEspecialidad($registro["nombreEspecialidad"]);
                $matriz[$contador] = $especialidad;
                $contador++;
            }
            return $matriz;
        }
    }