<?php 

    include_once("ObjetoCitas.php");
    include_once '../../modelo/Conexion.php';


    class ModeloCitas extends Conexion 
    {

        public function getCitasXFecha($fechaCita){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM citas WHERE fechaCita = :fechaCita  ORDER BY fechaAgregado DESC ");
            $resultado->execute(['fechaCita' => $fechaCita]);
                while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $citas = new ObjetoCitas();
    
                    $citas->setId($registro["id"]);
                    $citas->setNumeroDocumento($registro["numeroDocumento"]);
                    $citas->setnumeroHistoria($registro["numeroHistoria"]);
                    $citas->setnombrePaciente($registro["nombrePaciente"]);
                    $citas->setciudad($registro["ciudad"]);
                    $citas->setOficina($registro["oficina"]);
                    $citas->setFechaCita($registro["fechaCita"]);
                    $citas->setHoraCita($registro["horaCita"]);
                    $citas->setCCMedico($registro["ccMedico"]);
                    $citas->setFk_IdPaciente($registro["fk_IdPaciente"]);
                    $citas->setFk_IdMedico($registro["fk_IdMedico"]);
                    $citas->setFk_IdAuxAdmin($registro["fk_IdAux"]);
                    $citas->setFechaAgregado($registro["fechaAgregado"]);
                    $citas->setAsistioPaciente($registro["asistioPaciente"]);
                    $citas->setNoAsistio($registro["noAsistio"]);
                    $citas->setTomoMedico($registro["tomoMedico"]);
                    $citas->setCedulaMedicoFinal($registro["cedulaMedicoFinal"]);
                    $matriz[$contador] = $citas;
                    $contador++;    
                }
                
                return $matriz;
        }

        public function getCitasXFechaSinTomar($fechaCita, $ccMedico){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM citas WHERE fechaCita = :fechaCita AND tomoMedico = 0 AND ccMedico = :ccMedico ORDER BY horaCita ASC ");
            $resultado->execute(['fechaCita' => $fechaCita,'ccMedico' => $ccMedico]);
                while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $citas = new ObjetoCitas();
    
                    $citas->setId($registro["id"]);
                    $citas->setNumeroDocumento($registro["numeroDocumento"]);
                    $citas->setnumeroHistoria($registro["numeroHistoria"]);
                    $citas->setnombrePaciente($registro["nombrePaciente"]);
                    $citas->setciudad($registro["ciudad"]);
                    $citas->setOficina($registro["oficina"]);
                    $citas->setFechaCita($registro["fechaCita"]);
                    $citas->setHoraCita($registro["horaCita"]);
                    $citas->setCCMedico($registro["ccMedico"]);
                    $citas->setFk_IdPaciente($registro["fk_IdPaciente"]);
                    $citas->setFk_IdMedico($registro["fk_IdMedico"]);
                    $citas->setFk_IdAuxAdmin($registro["fk_IdAux"]);
                    $citas->setFechaAgregado($registro["fechaAgregado"]);
                    $citas->setAsistioPaciente($registro["asistioPaciente"]);
                    $citas->setNoAsistio($registro["noAsistio"]);
                    $citas->setTomoMedico($registro["tomoMedico"]);
                    $citas->setCedulaMedicoFinal($registro["cedulaMedicoFinal"]);
                    $matriz[$contador] = $citas;
                    $contador++;    
                }
                
                return $matriz;
        }

        public function contadorCitasXFecha($fechaCita){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM citas WHERE fechaCita = :fechaCita  ORDER BY fechaAgregado DESC ");
            $resultado->execute(['fechaCita' => $fechaCita]);
                while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $citas = new ObjetoCitas();
    
                    $citas->setId($registro["id"]);
                    $citas->setNumeroDocumento($registro["numeroDocumento"]);
                    $citas->setnumeroHistoria($registro["numeroHistoria"]);
                    $citas->setnombrePaciente($registro["nombrePaciente"]);
                    $citas->setTelefono($registro["telefono"]);
                    $citas->setciudad($registro["ciudad"]);
                    $citas->setOficina($registro["oficina"]);
                    $citas->setFechaCita($registro["fechaCita"]);
                    $citas->setHoraCita($registro["horaCita"]);
                    $citas->setCCMedico($registro["ccMedico"]);
                    $citas->setFk_IdPaciente($registro["fk_IdPaciente"]);
                    $citas->setFk_IdMedico($registro["fk_IdMedico"]);
                    $citas->setFk_IdAuxAdmin($registro["fk_IdAux"]);
                    $citas->setFechaAgregado($registro["fechaAgregado"]);
                    $citas->setAsistioPaciente($registro["asistioPaciente"]);
                    $citas->setNoAsistio($registro["noAsistio"]);
                    $citas->setTomoMedico($registro["tomoMedico"]);
                    $citas->setCedulaMedicoFinal($registro["cedulaMedicoFinal"]);
                $matriz[$contador] = $citas;
                $contador++;
                    
                }
                
                return $contador;
        }

        public function GuardarCita(ObjetoCitas $citas){

			$sql = $this->connect()->prepare("INSERT INTO citas (
                                                 numeroDocumento, numeroHistoria, nombrePaciente, telefono
                                                , ciudad, oficina, fechaCita
                                                , horaCita, ccMedico, fk_IdPaciente
                                                , fk_IdMedico, fk_IdAux, fk_IdRemision, fechaAgregado
                                                , asistioPaciente, confirmada, noAsistio, tomoMedico, cedulaMedicoFinal) 
                                                values (
                                                :numeroDocumento, :numeroHistoria, :nombrePaciente, :telefono
                                                , :ciudad, :oficina, :fechaCita
                                                , :horaCita, :ccMedico, :fk_IdPaciente
                                                , :fk_IdMedico, :fk_IdAux, :fk_IdRemision, :fechaAgregado
                                                , :asistioPaciente, :confirmada, :noAsistio, :tomoMedico, :cedulaMedicoFinal)");

			$sql->execute(['numeroDocumento' => $citas->getNumeroDocumento(), 'numeroHistoria' => $citas->getNumeroHistoria()
            , 'telefono' => $citas->getTelefono()
            , 'nombrePaciente' => $citas->getNombrePaciente(), 'ciudad' => $citas->getCiudad()
            , 'oficina' => $citas->getOficina(), 'fechaCita' => $citas->getFechaCita()
            , 'horaCita' => $citas->getHoraCita(), 'ccMedico' => $citas->getCCMedico()
            , 'fk_IdPaciente' => $citas->getFk_IdPaciente(), 'fk_IdMedico' => $citas->getFk_IdMedico()
            , 'fk_IdAux' => $citas->getFk_IdAuxAdmin(), 'fk_IdRemision' => $citas->getFk_IdRemision()
            , 'fechaAgregado' => $citas->getFechaAgregado()
            , 'asistioPaciente' => 0, 'confirmada' => 0, 'noAsistio' => 0, 'tomoMedico' => 0
            , 'cedulaMedicoFinal' => 0]);
			//$this->acceso->exec($sql);
		}

        public function actualizaCita(ObjetoCitas $e){
			$id = $e->getId();
			$sql = $this->connect()->prepare("UPDATE citas SET 
							fechaCita = :fechaCita,
							horaCita = :horaCita
						WHERE id = :id");
			$sql->execute(['fechaCita' => $e->getFechaCita()
                            , 'horaCita' => $e->getHoraCita()
                            , 'id' => $id]);
		}


        public function cancelaCita(ObjetoCitas $e){
			$numeroDocumento = $e->getNumeroDocumento();
			$sql = $this->connect()->prepare("UPDATE citas SET 
							confirmada = :confirmada,
                            asistioPaciente = :asistioPaciente,
							motivoCancelacion = :motivoCancelacion,
							cancelada = :cancelada
						WHERE numeroDocumento = :numeroDocumento");
			$sql->execute(['confirmada' => 1
                            , 'motivoCancelacion' => $e->getMotivoCancelacion()
                            , 'asistioPaciente' => 1
                            , 'cancelada' => 1
                            , 'numeroDocumento' => $numeroDocumento]);
		}


        public function getCitasXCedula($numeroDocumento){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM citas  WHERE numeroDocumento = :numeroDocumento AND asistioPaciente = 0  ORDER BY fechaAgregado DESC  ");
            $resultado->execute(['numeroDocumento' => $numeroDocumento]);
                while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $citas = new ObjetoCitas();
    
                    $citas->setId($registro["id"]);
                    $citas->setNumeroDocumento($registro["numeroDocumento"]);
                    $citas->setnumeroHistoria($registro["numeroHistoria"]);
                    $citas->setnombrePaciente($registro["nombrePaciente"]);
                    $citas->setTelefono($registro["telefono"]);
                    $citas->setciudad($registro["ciudad"]);
                    $citas->setOficina($registro["oficina"]);
                    $citas->setFechaCita($registro["fechaCita"]);
                    $citas->setHoraCita($registro["horaCita"]);
                    $citas->setCCMedico($registro["ccMedico"]);
                    $citas->setFk_IdPaciente($registro["fk_IdPaciente"]);
                    $citas->setFk_IdMedico($registro["fk_IdMedico"]);
                    $citas->setFk_IdAuxAdmin($registro["fk_IdAux"]);
                    $citas->setFechaAgregado($registro["fechaAgregado"]);
                    $citas->setAsistioPaciente($registro["asistioPaciente"]);
                    $citas->setConfirmada($registro["confirmada"]);
                    $citas->setNoAsistio($registro["noAsistio"]);
                    $citas->setTomoMedico($registro["tomoMedico"]);
                    $citas->setCedulaMedicoFinal($registro["cedulaMedicoFinal"]);
                }
                
                return $citas;
            
        }


        public function TomarCitaXMedicoFinal(ObjetoCitas $e){
			$id = $e->getId();
			$sql = $this->connect()->prepare("UPDATE citas SET 
							asistioPaciente = :asistioPaciente, 
							tomoMedico = :tomoMedico,
							cedulaMedicoFinal = :cedulaMedicoFinal
						WHERE id = :id");
			$sql->execute(['asistioPaciente' => $e->getAsistioPaciente()
                            , 'tomoMedico' => $e->getTomoMedico()
                            , 'cedulaMedicoFinal' => $e->getCedulaMedicoFinal()
                            , 'id' => $id]);
		}



        public function NoAsistioCitaXMedicoFinal(ObjetoCitas $e){
			$id = $e->getId();
			$sql = $this->connect()->prepare("UPDATE citas SET 
							noAsistio = :noAsistio, 
							tomoMedico = :tomoMedico,
							cedulaMedicoFinal = :cedulaMedicoFinal
						WHERE id = :id");
			$sql->execute(['noAsistio' => $e->getNoAsistio()
                            , 'tomoMedico' => $e->getTomoMedico()
                            , 'cedulaMedicoFinal' => $e->getCedulaMedicoFinal()
                            , 'id' => $id]);
		}

        public function citasxllamar(){
            $matriz = array(); 
            $contador = 0;
            //$diaSemana = date("d");
            
            $ahora = time();
            $unDiaEnSegundos = 24 * 60 * 60;   
            $manana = $ahora + $unDiaEnSegundos;
            $diaSemana = date("Y-m-d", $manana);
            //echo "----- ". date("Y-m-d", $manana);
            //echo "----- ". date("l", $manana);
            $nombreDiaSemana = date("l", $manana);
            if($nombreDiaSemana == "Saturday"){

                    //echo "  mañana es sabado ". date("Y-m-d", $manana);
                    $manana = $ahora + $unDiaEnSegundos*2;
                    $nombreDiaSemana = date("l", $manana);
                    $diaSemana = date("Y-m-d", $manana);
                    //echo "----- "."eco sabado ---";

                if ($nombreDiaSemana == "Sunday"){
                    //echo "----   domingo ". date("Y-m-d", $manana);
                    $manana = $ahora + $unDiaEnSegundos*3;// aca ya estariamos a lunes
                    $nombreDiaSemana = date("l", $manana);
                    $diaSemana = date("Y-m-d", $manana);
                    //echo $diaSemana;
                    //echo "----- ". date("Y-m-d", $manana);
                    //echo "-- ". $nombreDiaSemana;
                    
                    $resultado = $this->connect()->prepare("SELECT * FROM citas WHERE confirmada != 1 and fechaCita = :diaSemana  ORDER BY horaCita ASC ");
                    $resultado->execute(['diaSemana' => $diaSemana]);
                    while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                        $citas = new ObjetoCitas();
                            $citas->setId($registro["id"]);
                            $citas->setNumeroDocumento($registro["numeroDocumento"]);
                            $citas->setnumeroHistoria($registro["numeroHistoria"]);
                            $citas->setnombrePaciente($registro["nombrePaciente"]);
                            $citas->setTelefono($registro["telefono"]);
                            $citas->setciudad($registro["ciudad"]);
                            $citas->setOficina($registro["oficina"]);
                            $citas->setFechaCita($registro["fechaCita"]);
                            $citas->setHoraCita($registro["horaCita"]);
                            $citas->setCCMedico($registro["ccMedico"]);
                            $citas->setFk_IdPaciente($registro["fk_IdPaciente"]);
                            $citas->setFk_IdMedico($registro["fk_IdMedico"]);
                            $citas->setFk_IdAuxAdmin($registro["fk_IdAux"]);
                            $citas->setFechaAgregado($registro["fechaAgregado"]);
                            $citas->setAsistioPaciente($registro["asistioPaciente"]);
                            $citas->setConfirmada($registro["confirmada"]);
                            $citas->setNoAsistio($registro["noAsistio"]);
                            $citas->setTomoMedico($registro["tomoMedico"]);
                            $citas->setCedulaMedicoFinal($registro["cedulaMedicoFinal"]);
                        $matriz[$contador] = $citas;
                        $contador++;
                        
                    }
                }

               
            }else {
                $resultado = $this->connect()->prepare("SELECT * FROM citas WHERE confirmada != 1 and fechaCita = :diaSemana  ORDER BY fechaAgregado ASC ");
                    $resultado->execute(['diaSemana' => $diaSemana]);
                    while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                        $citas = new ObjetoCitas();
                            $citas->setId($registro["id"]);
                            $citas->setNumeroDocumento($registro["numeroDocumento"]);
                            $citas->setnumeroHistoria($registro["numeroHistoria"]);
                            $citas->setnombrePaciente($registro["nombrePaciente"]);
                            $citas->setTelefono($registro["telefono"]);
                            $citas->setciudad($registro["ciudad"]);
                            $citas->setOficina($registro["oficina"]);
                            $citas->setFechaCita($registro["fechaCita"]);
                            $citas->setHoraCita($registro["horaCita"]);
                            $citas->setCCMedico($registro["ccMedico"]);
                            $citas->setFk_IdPaciente($registro["fk_IdPaciente"]);
                            $citas->setFk_IdMedico($registro["fk_IdMedico"]);
                            $citas->setFk_IdAuxAdmin($registro["fk_IdAux"]);
                            $citas->setFechaAgregado($registro["fechaAgregado"]);
                            $citas->setAsistioPaciente($registro["asistioPaciente"]);
                            $citas->setConfirmada($registro["confirmada"]);
                            $citas->setNoAsistio($registro["noAsistio"]);
                            $citas->setTomoMedico($registro["tomoMedico"]);
                            $citas->setCedulaMedicoFinal($registro["cedulaMedicoFinal"]);
                        $matriz[$contador] = $citas;
                        $contador++;
                        
                    }
            }
            //echo $manana;
            //echo "-----! ". date("Y-m-d", $manana);
            if(empty($matriz)){
                echo "Matriz vacia";
                //echo "----   domingo ". date("Y-m-d", $manana);
                $manana = $manana + $unDiaEnSegundos;// aca ya estariamos a martes
                $nombreDiaSemana = date("l", $manana);
                $diaSemana = date("Y-m-d", $manana);
                //echo $manana;
                //echo "-----! ". date("Y-m-d", $manana);
                //echo $diaSemana;
                //echo "----- ". date("Y-m-d", $manana);
                //echo "-- ". $nombreDiaSemana;
                
                $resultado = $this->connect()->prepare("SELECT * FROM citas WHERE confirmada != 1 and fechaCita = :diaSemana  ORDER BY horaCita ASC ");
                $resultado->execute(['diaSemana' => $diaSemana]);
                while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $citas = new ObjetoCitas();
                        $citas->setId($registro["id"]);
                        $citas->setNumeroDocumento($registro["numeroDocumento"]);
                        $citas->setnumeroHistoria($registro["numeroHistoria"]);
                        $citas->setnombrePaciente($registro["nombrePaciente"]);
                        $citas->setTelefono($registro["telefono"]);
                        $citas->setciudad($registro["ciudad"]);
                        $citas->setOficina($registro["oficina"]);
                        $citas->setFechaCita($registro["fechaCita"]);
                        $citas->setHoraCita($registro["horaCita"]);
                        $citas->setCCMedico($registro["ccMedico"]);
                        $citas->setFk_IdPaciente($registro["fk_IdPaciente"]);
                        $citas->setFk_IdMedico($registro["fk_IdMedico"]);
                        $citas->setFk_IdAuxAdmin($registro["fk_IdAux"]);
                        $citas->setFechaAgregado($registro["fechaAgregado"]);
                        $citas->setAsistioPaciente($registro["asistioPaciente"]);
                        $citas->setConfirmada($registro["confirmada"]);
                        $citas->setNoAsistio($registro["noAsistio"]);
                        $citas->setTomoMedico($registro["tomoMedico"]);
                        $citas->setCedulaMedicoFinal($registro["cedulaMedicoFinal"]);
                    $matriz[$contador] = $citas;
                    $contador++;
                    
                }
            }
            return $matriz;
        }

        public function noconfirmo(ObjetoCitas $e){
			$id = $e->getId();
            $resultado = $this->connect()->prepare("SELECT * FROM citas WHERE id = :id   ORDER BY horaCita ASC ");
            $resultado->execute(['id' => $id]);
            while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                $citas = new ObjetoCitas();
                    $citas->setId($registro["id"]);
                    $citas->setNumeroDocumento($registro["numeroDocumento"]);
                    $citas->setConfirmada($registro["confirmada"]);
            }
            $confirmada = $citas->getConfirmada();
            $ModConfirmada = $confirmada-1;

			$sql = $this->connect()->prepare("UPDATE citas SET 
							confirmada = :confirmada
						WHERE id = :id");
			$sql->execute(['confirmada' => $ModConfirmada
                            , 'id' => $id]);
        }

        public function confirmo(ObjetoCitas $e){
			$id = $e->getId();

			$sql = $this->connect()->prepare("UPDATE citas SET 
							confirmada = :confirmada
						WHERE id = :id");
			$sql->execute(['confirmada' => 1
                            , 'id' => $id]);
        }


    }