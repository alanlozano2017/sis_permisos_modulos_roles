<?php 

	class PersonasModel extends Mysql
	{
		private $conn;
        private $dni ="N/A";
		private $nombre ="N/A";
		private $exp_id ="N/A";
		private $apellido ="N/A";
		private $email ="N/A";
		private $direccion ="N/A";
		private $tel ="N/A";
		private $fecha_ing ="N/A";
		private $fecha_nac ="N/A";
		private $intStatus ="N/A";

		private $puesto_id ="N/A";
		private $habilidades = array();
		private $estudios = array();
		private $curso ="N/A";
		private $titulo ="N/A";
	
		private $persona_arr = array();
		private $datos = array();





		public function __construct()
		{
			parent::__construct();
		}	

		public function setPersona($dni="N/A",$exp_id="N/A",$puesto_id="N/A",$nombre="N/A",$apellido="N/A",$email="N/A",$direccion="N/A",$tel="N/A",$fecha_ing="N/A",$fecha_nac="N/A",$status="N/A", $habilidades, $estudios,$curso="N/A",$titulo="N/A"){
			
			$this->persona_arr = array();
			$this->datos = array();
			$this->dni = $dni;
			$this->exp_id = $exp_id;
			$this->puesto_id = $puesto_id;
			$this->nombre = $nombre;
			$this->apellido = $apellido;
			$this->email = $email;
			$this->direccion = $direccion;
			$this->tel = $tel;
			$this->fecha_ing = $fecha_ing;
			$this->fecha_nac = $fecha_nac;
			$this->status = $status;
			$this->habilidades = $habilidades;
			$this->estudios = $estudios;
			$this->curso = $curso;
			$this->titulo = $titulo;
	
		}


        public function InsertPers(){

			$query_insert  = "INSERT INTO `persona`(`dni`, `experiencia`, `puesto_id`, `nombre`, `apellido`, `email`, `direccion`, `telefono`, `fecha_nac`, `fecha_ingreso`, `status`) 
			VALUES (".$this->dni.",".$this->exp_id.",".$this->puesto_id.",'".$this->nombre."','".$this->apellido."','".$this->email."','".$this->direccion."',".$this->tel.",'".$this->fecha_nac."','".$this->fecha_ing."',1)";

	        	$arrData = array();
	        	$request =$this->insert($query_insert,$arrData);
				if ($request !=0) {
					echo "<script> alert('Se inserto una nueva persona')</script>";
					
				}else {
					echo "Error al insertar persona: " .$request;
				}
		
				return $this->dni;
		}

		public function InsertHabil(){
			
			$arr_hab = $this->habilidades;
	
			$hab_val = "";
			$hab_key = "";
			
		
			for($i = 0; $i < count($arr_hab);$i++){
				if($i < (count($arr_hab)-1)){
					$hab_val = $hab_val." ".$arr_hab[$i].","; 
					$hab_key = $hab_key."`h".($i+1)."`,";
				}
				else{
					$hab_val = $hab_val." ".$arr_hab[$i];
					$hab_key = $hab_key."`h".($i+1)."`";
				}
			}
		
			$sql = "INSERT INTO `habilidad_persona`(".$hab_key.") VALUES (".$hab_val.")";
			$arrData = array();
	        $request =$this->insert($sql,$arrData);
			if ($request !=0) {
				echo "<script> alert('Se inserto una habilidad')</script>";
				
			}else {
				echo "Error al insertar habilidad: " . $request;
			}

			$sqlaux = "SELECT id_hab_pers FROM habilidad_persona ORDER BY id_hab_pers DESC LIMIT 1";
				$row = $this->select_all($sqlaux);
				//$row2 = $row->fetch_assoc();
				
				if ($row !=0) {
					echo "<script> alert('Se confirma insert de habilidad_persona')</script>";
					
				}else {
					echo " no se confirma insert habilidad_persona en database: " .$row;
				}
				

				return $row[0]["id_hab_pers"];

		}

		public function InsertEstud(){

			$arr_est = $this->estudios;
	
			$query_insert  = "INSERT INTO `estudio`(`primario`, `secundario`, `terciario_universitario`, `cursos_activos`, `titulo`) VALUES (".$arr_est[0].",".$arr_est[1].",".$arr_est[2].",'".$this->curso."','".$this->titulo."')";

	        	$arrData = array();
	        	$request =$this->insert($query_insert,$arrData);
				if ($request !=0) {
					echo "<script> alert('Se inserto un estudio')</script>";
					
				}else {
					echo "Error al insertar estudio: " .$request;
				}

				$sqlaux = "SELECT idestudios FROM estudio ORDER BY idestudios DESC LIMIT 1";
				 $result = $this->select_all($sqlaux);
				// //$row2 = $row->fetch_assoc();

				 if ($result !=0) {
				 	
					 echo "<script> alert('Se confirma insert de estudio')</script>";
					
				 }else {
				 	echo " no se confirma insert estudio en database: " .$result;
				 }
				

				return $result[0]["idestudios"];

		}
		public function InsertLegajo($dni,$idPues,$idHab,$idEst, $idPsico){
			$intdni = intval($dni);
			$intidPues = intval($idPues);
			$intidHab = intval($idHab);
			$intidEst = intval($idEst);
			$intidPsico = intval($idPsico);

			$sql = "INSERT INTO `legajo`( `id_legajo`, 
										`estudio_idestudio`, 
										`psicofisico_persona_id`, 
										`ID_Leg_puesto`, 
										`persona_dni`,
										`habilidad_persona_id`) 
			VALUES (:id_legajo,
						:estudio_idestudio,
						:psicofisico_persona_id,
						:ID_Leg_puesto,
						:persona_dni,
						:habilidad_persona_id
	
						)";

        
			$arrData = array(":id_legajo"=> null, 
                                    ":estudio_idestudio"=>$intidEst,
                                    ":psicofisico_persona_id" => 1, 
                                    ":ID_Leg_puesto" => $intidPues,
									":persona_dni" => $intdni,
                                    ":habilidad_persona_id" => $intidHab  
								
								);
			
			
			
	        	$request =$this->insert($sql,$arrData);
			if ($request != 0) {
				echo "<script> alert('Se inserto un Legajo')</script>";
				
			}else {
				echo "Error al insertar legajo: ";
			}
		
			
		}
		public function DeletPersona($id){
			
			$sql = "UPDATE `persona` SET `status`= 0 WHERE `dni` =".$id;
			$arrData = array(0);
			$request = $this->update($sql,$arrData);
			if ($request = true) {
				echo "<script> alert('La persona DNI: ".$id."' Se dio de baja!!)</script>";
				
			}else {
				echo "Error al eliminar: " . $request;
			}
		
		}

		 
		

		public function get_Hab()
		{			

			$sql = "SELECT * FROM habilidad";

					$request = $this->select_all($sql);
					$this->datos = $request;
					return $this->datos;
		}

		public function get_Puesto()
		{			

			$sql = "SELECT id_puesto , nombre_puesto FROM puesto ";

					$request = $this->select_all($sql);
					$this->datos = $request;
					
					return $this->datos;
		}

		public function get_Persona()
		{			

			$sql = "SELECT P.dni, P.nombre,P.apellido, Ps.nombre_puesto,P.fecha_ingreso, P.status FROM persona as P, puesto as Ps WHERE P.puesto_id = Ps.id_puesto and P.status = 1";

					$request = $this->select_all($sql);
					$this->persona_arr = $request;
					return $this->persona_arr;
		}

		//funciones de módulo antiguas
		public function selectModulos()
		{			

			$sql = "SELECT * FROM modulo WHERE status=1";

					$request = $this->select_all($sql);
					return $request;
		}

		public function selectModulo(int $idmodulo){
			$this->dni = $idmodulo;
			$sql ="SELECT * FROM modulo WHERE idmodulo=$this->dni";

			$request = $this->select($sql);
			return $request;
		}
		
		public function updateModulo( int $idmodulo , string $titulo, string $descripcion){

			$this->dni = $idmodulo;
			$this->nombre = $titulo;
			$this->apellido = $descripcion;

			$query_update  = "UPDATE modulo 
							SET
							titulo =?,
							descripcion=?
							WHERE idmodulo = $this->dni";

	        	$arrData = array(
								$this->nombre,
        						$this->apellido
        						);
	        	$this->update($query_update,$arrData);
		}

		public function deleteModulo(int $idmodulo)
		{
			$this->dni = $idmodulo;
			$sql = "UPDATE modulo SET status = ? WHERE idmodulo = $this->dni ";
			$arrData = array(0);
			$request = $this->update($sql,$arrData);
			return $request;
		}

		

	}
 ?>