<?php

Class PuestosModel extends Mysql{
    private $conn;
    private $datos = array();
    private $hab_b_pue_prom = array();
    private $hab_d_pue_prom = array();
    private $nombre_puesto ="N/A";
    private $exp_puesto ="N/A";
    private $habilidad_puesto =array();
    private $psicofisico_puesto =array();

    public function __construct()
		{
			parent::__construct();
		}	

public function setPuesto($nombre_puesto="N/A",$exp_puesto="N/A",$habilidad_puesto=array(),$psicofisico_puesto=array()){
    
    $this->datos = array();
	$this->hab_b_pue_prom = array();
	$this->hab_d_pue_prom = array();
    $this->nombre_puesto = $nombre_puesto;
    $this->exp_puesto = $exp_puesto;
    $this->habilidad_puesto = $habilidad_puesto;
    $this->psicofisico_puesto = $psicofisico_puesto;
}

public function get_Puesto()
		{			

			$sql = "SELECT Pu.id_puesto , Pu.nombre_puesto, Ex.rango_exp, H.nombre_habilidad FROM puesto as Pu, experiencia as Ex, habilidad as H WHERE Pu.status_puesto = 1 and Pu.experiencia_nivel = Ex.nivel and H.id_habilidad = Pu.H1";

					$request = $this->select_all($sql);
					$this->datos = $request;
					
					return $this->datos;
		}

public function get_Hab()
{			

    $sql = "SELECT * FROM habilidad";

            $request = $this->select_all($sql);
            $this->datos = $request;
            return $this->datos;
}

public function insertarPsi(){

    $arrPsi = $this->psicofisico_puesto;
    $prom = array_count_values($arrPsi);
    $sql = "INSERT INTO psicofisico_puesto(`examen_visual`, `evaluacion_fisica`, `alergia`, `lesiones`, `problema_cardiaco`, `examen_psicofisico`, `diagnostico`) VALUES (".$arrPsi[0].",".$arrPsi[1].",".$arrPsi[2].",".$arrPsi[3].",".$arrPsi[4].",".$arrPsi[5].",1)";




        $arrData = array();
        $request =$this->insert($sql,$arrData);
        if ($request !=0) {
            echo "<script> alert('Se inserto un psicofisico')</script>";
            
        }else {
            echo "Error al insertar psicofisico: " .$request;
        }

        $sqlaux = "SELECT id_ps_puesto FROM psicofisico_puesto ORDER BY id_ps_puesto DESC LIMIT 1";
         $result = $this->select_all($sqlaux);
        

         if ($result !=0) {
             
             echo "<script> alert('Se confirma insert de psicofisico')</script>";
            
         }else {
             echo " no se confirma insert psicofisico en database: " .$result;
         }
        

        return $result[0]["id_ps_puesto"];

}


public function insertarPuesto($id){
    $arrHab = $this->habilidad_puesto;
    $name_p = $this->nombre_puesto; 
    $hab_val = "";
    $hab_key = "";
    

    for($i = 0; $i < count($arrHab);$i++){
        $hab_val = $hab_val.",".$arrHab[$i]; 
        $hab_key = $hab_key.", `h".($i+1)."`";
    }

    $query_insert  = "INSERT INTO `puesto` (`experiencia_nivel`, `psicofisico_puesto_id`, `nombre_puesto`, `status_puesto`".$hab_key.") VALUES (".$this->exp_puesto.",".$id.",'".$name_p."',1".$hab_val.")";

        $arrData = array();
        $request =$this->insert($query_insert,$arrData);
        if ($request !=0) {
            echo "<script> alert('Se inserto un nuevo puesto')</script>";
            
        }else {
            echo "Error al insertar puesto: " .$request;
        }

        
}



public function ModfPsi($idpuesto){
	$arrPsi = $this->psicofisico_puesto;
    $prom = array_count_values($arrPsi);

    $sql = "SELECT psicofisico_puesto_id FROM puesto WHERE id_puesto = ".$idpuesto;
    $sql_id = $this->select_all($sql);
    $sql2 ="";
    $arrData = array(0);
    echo "paso algo";
    if($prom[0] > $prom[1]){
        $sql2 = "UPDATE `psicofisico_puesto` SET `examen_visual`=".$arrPsi[0].",`evaluacion_fisica`=".$arrPsi[1].",`alergia`=".$arrPsi[2].",`lesiones`=".$arrPsi[3].",`problema_cardiaco`=".$arrPsi[4].",`examen_psicofisico`=".$arrPsi[5].",`diagnostico`='0' WHERE id_ps_puesto =".$sql_id[0]['psicofisico_puesto_id']."";
    }else{
        $sql2 = "UPDATE `psicofisico_puesto` SET `examen_visual`='".$arrPsi[0]."',`evaluacion_fisica`='".$arrPsi[1]."',`alergia`='".$arrPsi[2]."',`lesiones`='".$arrPsi[3]."',`problema_cardiaco`='".$arrPsi[4]."',`examen_psicofisico`='".$arrPsi[5]."',`diagnostico`='1' WHERE id_ps_puesto =".$sql_id[0]['psicofisico_puesto_id']."";
    }
    $request2 = $this->update($sql2,$arrData);
    
    if ($request2 = true) {
        echo "<script> alert('Se Elimino un nuevo puesto: ".$idpuesto."' Se dio de baja!)</script>";
        
    }else {
        echo "Error al eliminar puesto: " . $request2;
    }

}



//MODIFICAR PUESTO ..........

public function ModfPuesto($id){
    $arrHab = $this->habilidad_puesto;
    $name_p = $this->nombre_puesto; 
    $arr_sql_hab = "";
    for($i = 0; $i < count($arrHab);$i++){
        $arr_sql_hab = $arr_sql_hab.",`h".($i+1)."` = ".$arrHab[$i];
    }

    $sql = "UPDATE `puesto` SET `experiencia_nivel`=".$this->exp_puesto.",`nombre_puesto`='".$name_p."',`status_puesto` = 1".$arr_sql_hab." WHERE id_puesto = ".$id;
    $arrData = array(0);
    $request = $this->update($sql,$arrData);
    if ($request = true) {
        echo "<script> alert('Se Elimino un nuevo puesto: ".$id."' Se dio de baja!)</script>";
        
    }else {
        echo "Error al eliminar puesto: " . $request;
    }

}



public function ElimPuesto($id){
			
    $sql = "UPDATE `puesto` SET `status_puesto`= 0 WHERE id_puesto =".$id;
    $arrData = array(0);
    $request = $this->update($sql,$arrData);
    if ($request = true) {
        echo "<script> alert('Se Elimino un nuevo puesto: ".$id."' Se dio de baja!)</script>";
        
    }else {
        echo "Error al eliminar puesto: " . $request;
    }

}


public function get_habilidad_blanda_puesto_promedio()
		{			

			$sql = "SELECT 
            avg(h1) AS h1, 
            avg(h2) AS h2,
            avg(h3) AS h3,
            avg(h4) AS h4,
            avg(h5) AS h5,
            avg(h6) AS h6,
            avg(h7) AS h7,
            avg(h8) AS h8,
            avg(h9) AS h9,
            avg(h10) AS h10        
        FROM puesto";

					$request = $this->select_all($sql);
					$this->hab_b_pue_prom = $request;
					return $this->hab_b_pue_prom;
		}



public function get_habilidad_dura_puesto_promedio()
		{			

			$sql = "SELECT 
            avg(h11) AS h11, 
            avg(h12) AS h12,
            avg(h13) AS h13,
            avg(h14) AS h14,
            avg(h15) AS h15,
            avg(h16) AS h16,
            avg(h17) AS h17,
            avg(h18) AS h18,
            avg(h19) AS h19,
            avg(h20) AS h20             
        FROM puesto";

					$request = $this->select_all($sql);
					$this->hab_d_pue_prom = $request;
					return $this->hab_d_pue_prom;
		}




}

?>