<?php 

    include_once("ObjetoEps.php");
    include_once 'ObjetoEps.php';
    include_once '../../modelo/Conexion.php';


    class ModeloEps extends Conexion 
    {
   
        public function mostrareps(){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM eps ");
            $resultado->execute();
            while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                $eps = new ObjetoEps();

                $eps->setId($registro["id"]);
                $eps->setNombre($registro["nombre"]);
                $matriz[$contador] = $eps;
                $contador++;
            }
            return $matriz;
        }
    }