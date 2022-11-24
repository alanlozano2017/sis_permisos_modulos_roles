<?php
Class CalificacionesModel extends Mysql{

    private $year ="N/A";
    private $legajo ="N/A";
    private $puntualidad ="N/A";
    private $companierismo ="N/A";
    private $pp ="N/A";
    private $cn ="N/A";
    private $apt ="N/A";
    private $responsabilidad ="N/A";
    private $iniciativa ="N/A";
    private $promedio ="N/A";
    
    private $conn;
    private $calf  = array();

    public function __construct()
		{
			parent::__construct();
		}	

public function setCalificaciones($year="N/A",$legajo="N/A",$puntualidad="N/A",$companierismo="N/A",$pp="N/A",$cn="N/A",$apt="N/A",$responsabilidad="N/A",$iniciativa="N/A",$promedio="N/A"){
    
    
    $this->year = $year;
    $this->legajo = $legajo;
    $this->puntualidad = $puntualidad;
    $this->companierismo = $companierismo;
    $this->pp = $pp;
    $this->cn = $cn;
    $this->apt = $apt;
    $this->responsabilidad = $responsabilidad;
    $this->iniciativa = $iniciativa;
    $this->promedio = $promedio;

    $this->calf = array();
}
public function get_Calificaion()
		{			

			$sql = "SELECT Cal.* FROM calificacion as Cal, legajo as L WHERE Cal.legajo_id_legajo = L.id_legajo";

					$request = $this->select_all($sql);
					$this->calf = $request;
					
					return $this->calf;
		}

public function get_Legajos()
		{			

			$sql = "SELECT `id_legajo` FROM `legajo";

					$request = $this->select_all($sql);
					$this->calf = $request;
					
					return $this->calf;
		}

public function get_Calificaion_Promedio()
		{			

			$sql = "SELECT 
            avg(puntualidad) AS puntualidad, 
            avg(compañerismo) AS compañerismo,
            avg(presentacion_personal) AS presentacion_personal,
             avg(cumplimiento_normas) AS cumplimiento_normas,
             avg(aplicacion_procesos_trabajo) AS aplicacion_procesos,
             avg(responsabilidad) AS responsabilidad,
             avg(iniciativa) AS iniciativa
              FROM calificacion";

					$request = $this->select_all($sql);
					$this->calf = $request;
					
					return $this->calf;
		}


public function InsertCalificacion(){

    $sql = "INSERT INTO `calificacion`( `legajo_id_legajo`, `year`, `puntualidad`, `compañerismo`, `presentacion_personal`, `cumplimiento_normas`, `aplicacion_procesos_trabajo`, `responsabilidad`, `iniciativa`, `promedio`) VALUES ('".$this->legajo."','".$this->year."',".$this->puntualidad.",".$this->companierismo.",".$this->pp.",".$this->cn.",".$this->apt.",".$this->responsabilidad.",".$this->iniciativa.",".$this->promedio.")";

        $arrData = array();
        $request =$this->insert($sql,$arrData);
        if ($request !=0) {
            echo "<script> alert('Se inserto una nueva Calificacion')</script>";
            
        }else {
            echo "Error al insertar Calificacion: " .$request;
        }

}

public function UpdateCalificacion(){
			
    $sql = "UPDATE `calificacion` SET `year`= ".$this->year.",`puntualidad`= ".$this->puntualidad.",`compañerismo`= ".$this->companierismo.",`presentacion_personal`= ".$this->pp.",`cumplimiento_normas`= ".$this->cn.",`aplicacion_procesos_trabajo`= ".$this->apt.",`responsabilidad`= ".$this->responsabilidad.",`iniciativa`= ".$this->iniciativa.",`promedio`= ".$this->promedio." WHERE `legajo_id_legajo` = ".$this->legajo;
    $arrData = array(0);
    $request = $this->update($sql,$arrData);
    if ($request = true) {
        echo "<script> alert('Se modifico una nueva Calificacion !')</script>";
        
    }else {
        echo "Error al modificar Calificacion: " . $request;
    }

}




public function DeletCalificacion($id){
			
    $sql = "DELETE FROM `calificacion` WHERE `legajo_id_legajo` =".$id;
   
    $request = $this->delete($sql);
    if ($request = true) {
        echo "<script> alert('Se Elimino una nueva Calificacion: ".$id."' Se dio de baja!)</script>";
        
    }else {
        echo "Error al eliminar Calificacion: " . $request;
    }

}



}


?>