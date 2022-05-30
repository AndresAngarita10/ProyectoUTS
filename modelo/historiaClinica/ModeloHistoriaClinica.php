<?php 

    include_once("ObjetoHistoriaClinica.php");
    include_once("ObjetoHistoriaClinica.php");
    include_once("ObjetoAntecedentesPersonales.php");
    include_once("ObjetoEnfermedades.php");
    include_once("ObjetoExamenFisico.php");
    include_once '../../modelo/Conexion.php';


    class ModeloHistoriaClinica extends Conexion 
    {
        public function guardarHistoriaF1(ObjetoHistoriaClinica $Historia){

			$sql = $this->connect()->prepare("INSERT INTO historiaclinica (
                                                 numeroHistoria, identificacionPaciente, identificacionMedico, motivoConsulta
                                                , enfermedadActual, antecedentesEnfActual, finalizado
                                                , fk_IdPaciente, fechaAgregado, fechaUltMod) 
                                                values (
                                                 :numeroHistoria, :identificacionPaciente, :identificacionMedico, :motivoConsulta
                                                , :enfermedadActual, :antecedentesEnfActual, :finalizado
                                                , :fk_IdPaciente, :fechaAgregado, :fechaUltMod)");

			$sql->execute(['numeroHistoria' => $Historia->getnumeroHistoria(), 'identificacionPaciente' => $Historia->getidentificacionPaciente()
            , 'identificacionMedico' => $Historia->getidentificacionMedico(), 'motivoConsulta' => $Historia->getmotivoConsulta(), 'enfermedadActual' => $Historia->getenfermedadActual()
            , 'antecedentesEnfActual' => $Historia->getantecedentesEnfActual(), 'finalizado' => 0
            , 'fk_IdPaciente' => $Historia->getfk_IdPaciente(), 'fechaAgregado' => $Historia->getfrechaAgregado()
            , 'fechaUltMod' => null]);
			//$this->acceso->exec($sql);
		}
        


        public function guardarHistoriaF2(ObjetoAntecedentesPersonales $antecedentes){

			$sql = $this->connect()->prepare("INSERT INTO antecedentespersonales (
                                                 numeroHistoria, identificacionPaciente, alcoholHT
                                                , tabacoHT, drogasHT, infucionesHT
                                                , alimentacionHF, diuresisHF, catarsisHF
                                                , suenioHF, sexualidadHF, otrosHF
                                                , enfermedadesInfancia, antecedentesHeredados
                                                , fk_IdHistoriaClinica, fechaAgregado) 
                                                values (
                                                :numeroHistoria, :identificacionPaciente, :alcoholHT
                                                , :tabacoHT, :drogasHT, :infucionesHT
                                                , :alimentacionHF, :diuresisHF, :catarsisHF
                                                , :suenioHF, :sexualidadHF, :otrosHF
                                                , :enfermedadesInfancia, :antecedentesHeredados
                                                , :fk_IdHistoriaClinica, :fechaAgregado)");

			$sql->execute(['numeroHistoria' => $antecedentes->getnumeroHistoria(), 'identificacionPaciente' => $antecedentes->getidentificacionPaciente()
            , 'alcoholHT' => $antecedentes->getalcoholHT(), 'tabacoHT' => $antecedentes->gettabacoHT()
            , 'drogasHT' => $antecedentes->getdrogasHT(), 'infucionesHT' => $antecedentes->getinfucionesHT()
            , 'alimentacionHF' => $antecedentes->getalimentacionHF(), 'diuresisHF' => $antecedentes->getdiuresisHF()
            , 'catarsisHF' => $antecedentes->getcatarsisHF(), 'suenioHF' => $antecedentes->getsueñoHF()
            , 'sexualidadHF' => $antecedentes->getsexualidadHF(), 'otrosHF' => $antecedentes->getotrosHF()
            , 'enfermedadesInfancia' => $antecedentes->getenfermedadesInfancia()
            , 'antecedentesHeredados' => $antecedentes->getantecedentesHeredados()
            , 'fk_IdHistoriaClinica' => $antecedentes->getfk_IdHistoriaClinica()
            , 'fechaAgregado' => $antecedentes->getfrechaAgregado()]);
			//$this->acceso->exec($sql);
		}

        public function guardarHistoriaF3(ObjetoEnfermedades $enfermedades){

			$sql = $this->connect()->prepare("INSERT INTO enfermedades (
                                                 numeroHistoria, identificacionPaciente, cv
                                                , respiratorio, gastrointestinales, nefrourologicos
                                                , neurologicos, hematologicos, ginecologicos
                                                , infectologicos, endocrinologicos, quirurgicos
                                                , traumatologicos, alergicos
                                                , fk_IdHistoriaClinica, fechaAgregado) 
                                                values (
                                                :numeroHistoria, :identificacionPaciente, :cv
                                                , :respiratorio, :gastrointestinales, :nefrourologicos
                                                , :neurologicos, :hematologicos, :ginecologicos
                                                , :infectologicos, :endocrinologicos, :quirurgicos
                                                , :traumatologicos, :alergicos
                                                , :fk_IdHistoriaClinica, :fechaAgregado)");

			$sql->execute(['numeroHistoria' => $enfermedades->getnumeroHistoria(), 'identificacionPaciente' => $enfermedades->getidentificacionPaciente()
            , 'cv' => $enfermedades->getCV(), 'respiratorio' => $enfermedades->getrespiratorio()
            , 'gastrointestinales' => $enfermedades->getgastrointestinales(), 'nefrourologicos' => $enfermedades->getnefrourologicos()
            , 'neurologicos' => $enfermedades->getneurologicos(), 'hematologicos' => $enfermedades->gethematologicos()
            , 'ginecologicos' => $enfermedades->getginecologicos(), 'infectologicos' => $enfermedades->getinfectologicos()
            , 'endocrinologicos' => $enfermedades->getendocrinologicos(), 'quirurgicos' => $enfermedades->getquirurgicos()
            , 'traumatologicos' => $enfermedades->gettraumatologicos(), 'alergicos' => $enfermedades->getalergicos()
            , 'fk_IdHistoriaClinica' => $enfermedades->getfk_IdHistoriaClinica()
            , 'fechaAgregado' => $enfermedades->getfrechaAgregado()]);
			//$this->acceso->exec($sql);
		}

        public function guardarHistoriaF4(ObjetoExamenFisico $examenFisico){

			$sql = $this->connect()->prepare("INSERT INTO examenfisico (
                                                 numeroHistoria, identificacionPaciente, tA
                                                , fC, fR, temperatura
                                                , peso, altura, imc
                                                , impresionGeneral, constitucion, facies
                                                , actitud, decubito
                                                , marcha, aspecto, lesiones
                                                , fk_IdHistoriaClinica, fechaAgregado, segundoExamen) 
                                                values (
                                                :numeroHistoria, :identificacionPaciente, :tA
                                                , :fC, :fR, :temperatura
                                                , :peso, :altura, :imc
                                                , :impresionGeneral, :constitucion, :facies
                                                , :actitud, :decubito
                                                , :marcha, :aspecto, :lesiones
                                                , :fk_IdHistoriaClinica, :fechaAgregado, :segundoExamen)");

			$sql->execute(['numeroHistoria' => $examenFisico->getnumeroHistoria(), 'identificacionPaciente' => $examenFisico->getidentificacionPaciente()
            , 'tA' => $examenFisico->getTA(), 'fC' => $examenFisico->getFC()
            , 'fR' => $examenFisico->getFR(), 'temperatura' => $examenFisico->gettemperatura()
            , 'peso' => $examenFisico->getpeso(), 'altura' => $examenFisico->getaltura()
            , 'imc' => $examenFisico->getimc(), 'impresionGeneral' => $examenFisico->getimpresionGeneral()
            , 'constitucion' => $examenFisico->getconstitucion(), 'facies' => $examenFisico->getfacies()
            , 'actitud' => $examenFisico->getactitud(), 'decubito' => $examenFisico->getdecubito()
            , 'marcha' => $examenFisico->getmarcha(), 'aspecto' => $examenFisico->getaspecto()
            , 'lesiones' => $examenFisico->getlesiones()
            , 'fk_IdHistoriaClinica' => $examenFisico->getfk_IdHistoriaClinica()
            , 'fechaAgregado' => $examenFisico->getfrechaAgregado(), 'segundoExamen' => 0]);
			//$this->acceso->exec($sql);
		}


        public function guardarSegundoExamenFisico(ObjetoExamenFisico $examenFisico){

			$sql = $this->connect()->prepare("INSERT INTO examenfisico (
                                                 numeroHistoria, identificacionPaciente, tA
                                                , fC, fR, temperatura
                                                , peso, altura, imc
                                                , impresionGeneral, constitucion, facies
                                                , actitud, decubito
                                                , marcha, aspecto, lesiones
                                                , fk_IdHistoriaClinica, fechaAgregado, segundoExamen) 
                                                values (
                                                :numeroHistoria, :identificacionPaciente, :tA
                                                , :fC, :fR, :temperatura
                                                , :peso, :altura, :imc
                                                , :impresionGeneral, :constitucion, :facies
                                                , :actitud, :decubito
                                                , :marcha, :aspecto, :lesiones
                                                , :fk_IdHistoriaClinica, :fechaAgregado, :segundoExamen)");

			$sql->execute(['numeroHistoria' => $examenFisico->getnumeroHistoria(), 'identificacionPaciente' => $examenFisico->getidentificacionPaciente()
            , 'tA' => $examenFisico->getTA(), 'fC' => $examenFisico->getFC()
            , 'fR' => $examenFisico->getFR(), 'temperatura' => $examenFisico->gettemperatura()
            , 'peso' => $examenFisico->getpeso(), 'altura' => $examenFisico->getaltura()
            , 'imc' => $examenFisico->getimc(), 'impresionGeneral' => $examenFisico->getimpresionGeneral()
            , 'constitucion' => $examenFisico->getconstitucion(), 'facies' => $examenFisico->getfacies()
            , 'actitud' => $examenFisico->getactitud(), 'decubito' => $examenFisico->getdecubito()
            , 'marcha' => $examenFisico->getmarcha(), 'aspecto' => $examenFisico->getaspecto()
            , 'lesiones' => $examenFisico->getlesiones()
            , 'fk_IdHistoriaClinica' => $examenFisico->getfk_IdHistoriaClinica()
            , 'fechaAgregado' => $examenFisico->getfrechaAgregado(), 'segundoExamen' => 1]);
			//$this->acceso->exec($sql);
		}

        public function guardarRemision(ObjetoDatosAdministrativos $datosRemision){

			$sql = $this->connect()->prepare("INSERT INTO datosremision (
                                                 tipoSolicitud, identificacionPaciente , numeroHistoria
                                                , medicoSolicitante, servicioRemite, servicioRemitido
                                                , entidadResponsablePago, telefono, especialidadRemite
                                                , especialidadRemitido, observaciones
                                                , fechaAgregado, fkIdMedico) 
                                                values (
                                                :tipoSolicitud, :identificacionPaciente , :numeroHistoria
                                                , :medicoSolicitante, :servicioRemite, :servicioRemitido
                                                , :entidadResponsablePago, :telefono, :especialidadRemite
                                                , :especialidadRemitido, :observaciones
                                                , :fechaAgregado, :fkIdMedico)");

			$sql->execute(['tipoSolicitud' => $datosRemision->getTipoSolicitud()
            ,'identificacionPaciente' => $datosRemision->getidentificacionPaciente() 
            , 'numeroHistoria' => $datosRemision->getnumeroHistoria()
            , 'medicoSolicitante' => $datosRemision->getMedicoSolicitante()
            , 'servicioRemite' => $datosRemision->getServicioRemite()
            , 'servicioRemitido' => $datosRemision->getServicioRemitido()
            , 'entidadResponsablePago' => $datosRemision->getEntidadResponsablePago()
            , 'telefono' => $datosRemision->getTelefono()
            , 'especialidadRemite' => $datosRemision->getEspecialidadRemite()
            , 'especialidadRemitido' => $datosRemision->getEspecialidadRemitido()
            , 'observaciones' => $datosRemision->getobservaciones()
            , 'fechaAgregado' => $datosRemision->getFechaAgregado()
            , 'fkIdMedico' => $datosRemision->getfkIdMedico()]);
			//$this->acceso->exec($sql);
		}


        public function getHistoriaF1($numeroHistoria){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM historiaclinica  WHERE numeroHistoria = :numeroHistoria AND finalizado = 0  ");
            $resultado->execute(['numeroHistoria' => $numeroHistoria]);
            if($resultado!=null){
                $historia = new ObjetoHistoriaClinica();
                while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
    
                    $historia->setId($registro["id"]);
                    $historia->setnumeroHistoria($registro["numeroHistoria"]);
                    $historia->setidentificacionPaciente($registro["identificacionPaciente"]);
                    $historia->setmotivoConsulta($registro["motivoConsulta"]);
                    $historia->setenfermedadActual($registro["enfermedadActual"]);
                    $historia->setantecedentesEnfActual($registro["antecedentesEnfActual"]);
                    $historia->setfinalizado($registro["finalizado"]);
                    $historia->setfk_IdPaciente($registro["fk_IdPaciente"]);
                    $historia->setfrechaAgregado($registro["fechaAgregado"]);
                    $historia->setfechaUltMod($registro["fechaUltMod"]);
                }
                
                return $historia;
            }else {
                return null;
                
            }
            
        }


        public function getHistoriaxCedula($numeroHistoria){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM historiaclinica  WHERE numeroHistoria = :numeroHistoria ");
            $resultado->execute(['numeroHistoria' => $numeroHistoria]);
            if($resultado!=null){
                $historia = new ObjetoHistoriaClinica();
                while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
    
                    $historia->setId($registro["id"]);
                    $historia->setnumeroHistoria($registro["numeroHistoria"]);
                    $historia->setidentificacionPaciente($registro["identificacionPaciente"]);
                    $historia->setmotivoConsulta($registro["motivoConsulta"]);
                    $historia->setenfermedadActual($registro["enfermedadActual"]);
                    $historia->setantecedentesEnfActual($registro["antecedentesEnfActual"]);
                    $historia->setfinalizado($registro["finalizado"]);
                    $historia->setfk_IdPaciente($registro["fk_IdPaciente"]);
                    $historia->setfrechaAgregado($registro["fechaAgregado"]);
                    $historia->setfechaUltMod($registro["fechaUltMod"]);
                }
                
                return $historia;
            }else {
                return null;
                
            }
            
        }


        public function getHistoriaF2($numeroHistoria){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM antecedentespersonales  WHERE numeroHistoria = :numeroHistoria ");
            $resultado->execute(['numeroHistoria' => $numeroHistoria]);
            if($resultado!=null){
                $antecedentes = new ObjetoAntecedentesPersonales();
                while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
    
                    $antecedentes->setId($registro["id"]);
                    $antecedentes->setnumeroHistoria($registro["numeroHistoria"]);
                    $antecedentes->setidentificacionPaciente($registro["identificacionPaciente"]);
                    $antecedentes->setalcoholHT($registro["alcoholHT"]);
                    $antecedentes->settabacoHT($registro["tabacoHT"]);
                    $antecedentes->setdrogasHT($registro["drogasHT"]);
                    $antecedentes->setinfucionesHT($registro["infucionesHT"]);
                    $antecedentes->setalimentacionHF($registro["alimentacionHF"]);
                    $antecedentes->setdiuresisHF($registro["diuresisHF"]);
                    $antecedentes->setcatarsisHF($registro["catarsisHF"]);
                    $antecedentes->setsueñoHF($registro["suenioHF"]);
                    $antecedentes->setsexualidadHF($registro["sexualidadHF"]);
                    $antecedentes->setotrosHF($registro["otrosHF"]);
                    $antecedentes->setenfermedadesInfancia($registro["enfermedadesInfancia"]);
                    $antecedentes->setfk_IdHistoriaClinica($registro["fk_IdHistoriaClinica"]);
                    $antecedentes->setantecedentesHeredados($registro["antecedentesHeredados"]);
                    $antecedentes->setfrechaAgregado($registro["fechaAgregado"]);
                    $antecedentes->setfechaUltMod($registro["fechaUltMod"]);
                }
                
                return $antecedentes;
            }else {
                return null;
                
            }
            
        }

        public function getHistoriaF3($numeroHistoria){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM enfermedades  WHERE numeroHistoria = :numeroHistoria ");
            $resultado->execute(['numeroHistoria' => $numeroHistoria]);
                while($registro = $resultado->fetch()){
                    $enfermedades = new ObjetoEnfermedades();

                    $enfermedades->setId($registro["id"]);
                    $enfermedades->setnumeroHistoria($registro["numeroHistoria"]);
                    $enfermedades->setidentificacionPaciente($registro["identificacionPaciente"]);
                    $enfermedades->setCV($registro["cv"]);
                    $enfermedades->setrespiratorio($registro["respiratorio"]);
                    $enfermedades->setgastrointestinales($registro["gastrointestinales"]);
                    $enfermedades->setnefrourologicos($registro["nefrourologicos"]);
                    $enfermedades->setneurologicos($registro["neurologicos"]);
                    $enfermedades->sethematologicos($registro["hematologicos"]);
                    $enfermedades->setginecologicos($registro["ginecologicos"]);
                    $enfermedades->setinfectologicos($registro["infectologicos"]);
                    $enfermedades->setendocrinologicos($registro["endocrinologicos"]);
                    $enfermedades->setquirurgicos($registro["quirurgicos"]);
                    $enfermedades->settraumatologicos($registro["traumatologicos"]);
                    $enfermedades->setalergicos($registro["alergicos"]);
                    $enfermedades->setfk_IdHistoriaClinica($registro["fk_IdHistoriaClinica"]);
                    $enfermedades->setfrechaAgregado($registro["fechaAgregado"]);
                    $enfermedades->setfechaUltMod($registro["fechaUltMod"]);
                }
                
                return $enfermedades;
            
        }


        public function getHistoriaF4($numeroHistoria){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM examenfisico  WHERE numeroHistoria = :numeroHistoria ");
            $resultado->execute(['numeroHistoria' => $numeroHistoria]);
            if($resultado!=null){
                while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $examenFisico = new ObjetoExamenFisico();
    
                    $examenFisico->setId($registro["id"]);
                    $examenFisico->setnumeroHistoria($registro["numeroHistoria"]);
                    $examenFisico->setidentificacionPaciente($registro["identificacionPaciente"]);
                    $examenFisico->setTA($registro["tA"]);
                    $examenFisico->setFC($registro["fC"]);
                    $examenFisico->setFR($registro["fR"]);
                    $examenFisico->settemperatura($registro["temperatura"]);
                    $examenFisico->setpeso($registro["peso"]);
                    $examenFisico->setaltura($registro["altura"]);
                    $examenFisico->setimc($registro["imc"]);
                    $examenFisico->setimpresionGeneral($registro["impresionGeneral"]);
                    $examenFisico->setconstitucion($registro["constitucion"]);
                    $examenFisico->setfacies($registro["facies"]);
                    $examenFisico->setactitud($registro["actitud"]);
                    $examenFisico->setdecubito($registro["decubito"]);
                    $examenFisico->setmarcha($registro["marcha"]);
                    $examenFisico->setaspecto($registro["aspecto"]);
                    $examenFisico->setlesiones($registro["lesiones"]);
                    $examenFisico->setfk_IdHistoriaClinica($registro["fk_IdHistoriaClinica"]);
                    $examenFisico->setfrechaAgregado($registro["fechaAgregado"]);
                    $examenFisico->setfechaUltMod($registro["fechaUltMod"]);
                    $examenFisico->setSegundoExamen($registro["segundoExamen"]);
                }
                
                return $examenFisico;
            }else {
                return null;
                
            }
            
        }

        public function getHistoriaF5($numeroHistoria){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM examenfisico  WHERE numeroHistoria = :numeroHistoria AND segundoExamen = 1 ");
            $resultado->execute(['numeroHistoria' => $numeroHistoria]);
            if($resultado!=null){
                while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $examenFisico = new ObjetoExamenFisico();
    
                    $examenFisico->setId($registro["id"]);
                    $examenFisico->setnumeroHistoria($registro["numeroHistoria"]);
                    $examenFisico->setidentificacionPaciente($registro["identificacionPaciente"]);
                    $examenFisico->setTA($registro["tA"]);
                    $examenFisico->setFC($registro["fC"]);
                    $examenFisico->setFR($registro["fR"]);
                    $examenFisico->settemperatura($registro["temperatura"]);
                    $examenFisico->setpeso($registro["peso"]);
                    $examenFisico->setaltura($registro["altura"]);
                    $examenFisico->setimc($registro["imc"]);
                    $examenFisico->setimpresionGeneral($registro["impresionGeneral"]);
                    $examenFisico->setconstitucion($registro["constitucion"]);
                    $examenFisico->setfacies($registro["facies"]);
                    $examenFisico->setactitud($registro["actitud"]);
                    $examenFisico->setdecubito($registro["decubito"]);
                    $examenFisico->setmarcha($registro["marcha"]);
                    $examenFisico->setaspecto($registro["aspecto"]);
                    $examenFisico->setlesiones($registro["lesiones"]);
                    $examenFisico->setfk_IdHistoriaClinica($registro["fk_IdHistoriaClinica"]);
                    $examenFisico->setfrechaAgregado($registro["fechaAgregado"]);
                    $examenFisico->setfechaUltMod($registro["fechaUltMod"]);
                    $examenFisico->setSegundoExamen($registro["segundoExamen"]);
                }
                
                return $examenFisico;
            }else {
                return null;
                
            }
            
        }


        public function getHistoriaF1xCedula($identificacionPaciente){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM historiaclinica  WHERE identificacionPaciente = :identificacionPaciente AND finalizado = 1 ORDER BY fechaAgregado DESC ");
            $resultado->execute(['identificacionPaciente' => $identificacionPaciente]);
                while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $historia = new ObjetoHistoriaClinica();
    
                    $historia->setId($registro["id"]);
                    $historia->setnumeroHistoria($registro["numeroHistoria"]);
                    $historia->setidentificacionPaciente($registro["identificacionPaciente"]);
                    $historia->setmotivoConsulta($registro["motivoConsulta"]);
                    $historia->setenfermedadActual($registro["enfermedadActual"]);
                    $historia->setantecedentesEnfActual($registro["antecedentesEnfActual"]);
                    $historia->setfinalizado($registro["finalizado"]);
                    $historia->setfk_IdPaciente($registro["fk_IdPaciente"]);
                    $historia->setfrechaAgregado($registro["fechaAgregado"]);
                    $historia->setfechaUltMod($registro["fechaUltMod"]);
                    $matriz[$contador] = $historia;
                    $contador++;
                }
                
            
            return $matriz;
            
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

        
        public function finalizarHistoria($numeroHistoria){
			$sql = $this->connect()->prepare("UPDATE historiaclinica SET 
							finalizado = :finalizado
						WHERE numeroHistoria = :numeroHistoria");
			$sql->execute(['finalizado' => 1, 'numeroHistoria' => $numeroHistoria]);
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
                }
                
                return $medico;
            }else {
                return null;
                
            }
            
        }



        public function validarHistoriaxPaciente($cedula){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM historiaclinica  WHERE identificacionPaciente like '%'+:cedula+'%' AND finalizado = 0  ");
            $resultado->execute(['cedula' => $cedula]);
            if($resultado!=null){
                while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $historia = new ObjetoHistoriaClinica();
    
                    $historia->setId($registro["id"]);
                    $historia->setnumeroHistoria($registro["numeroHistoria"]);
                    $historia->setidentificacionPaciente($registro["identificacionPaciente"]);
                    $historia->setmotivoConsulta($registro["motivoConsulta"]);
                    $historia->setenfermedadActual($registro["enfermedadActual"]);
                    $historia->setantecedentesEnfActual($registro["antecedentesEnfActual"]);
                    $historia->setfinalizado($registro["finalizado"]);
                    $historia->setfk_IdPaciente($registro["fk_IdPaciente"]);
                    $historia->setfrechaAgregado($registro["fechaAgregado"]);
                    $historia->setfechaUltMod($registro["fechaUltMod"]);
                }
                
                return $historia;
            }else {
                return null;
                
            }
            
        }

        


        public function validarAntecedentes($cedula){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM antecedentespersonales  WHERE identificacionPaciente like '%'+:cedula+'%'  ");
            $resultado->execute(['cedula' => $cedula]);
            if($resultado!=null){
                while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $antecedentes = new ObjetoAntecedentesPersonales();
    
                    $antecedentes->setId($registro["id"]);
                    $antecedentes->setnumeroHistoria($registro["numeroHistoria"]);
                    $antecedentes->setidentificacionPaciente($registro["identificacionPaciente"]);
                    $antecedentes->setfrechaAgregado($registro["fechaAgregado"]);
                    $antecedentes->setfechaUltMod($registro["fechaUltMod"]);
                }
                
                return $antecedentes;
            }else {
                return null;
                
            }
        }



        public function validarEnfermedades($cedula){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM enfermedades  WHERE identificacionPaciente like '%'+:cedula+'%'  ");
            $resultado->execute(['cedula' => $cedula]);
            if($resultado!=null){
                while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $enfermedades = new ObjetoEnfermedades();
    
                    $enfermedades->setId($registro["id"]);
                    $enfermedades->setnumeroHistoria($registro["numeroHistoria"]);
                    $enfermedades->setidentificacionPaciente($registro["identificacionPaciente"]);
                    $enfermedades->setfrechaAgregado($registro["fechaAgregado"]);
                    $enfermedades->setfechaUltMod($registro["fechaUltMod"]);
                }
                
                return $enfermedades;
            }else {
                return null;
                
            }
        }


        public function validarExamenFisico($cedula){
            $matriz = array(); 
            $contador = 0;
            $resultado = $this->connect()->prepare("SELECT * FROM examenfisico  WHERE identificacionPaciente like '%'+:cedula+'%'  ");
            $resultado->execute(['cedula' => $cedula]);
            if($resultado!=null){
                while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $examenFisico = new ObjetoExamenFisico();
    
                    $examenFisico->setId($registro["id"]);
                    $examenFisico->setnumeroHistoria($registro["numeroHistoria"]);
                    $examenFisico->setidentificacionPaciente($registro["identificacionPaciente"]);
                    $examenFisico->setfrechaAgregado($registro["fechaAgregado"]);
                    $examenFisico->setfechaUltMod($registro["fechaUltMod"]);
                }
                
                return $examenFisico;
            }else {
                return null;
                
            }
        }

        




    }

    ?>