<?php
Class Calificacion{

    private $year;
    private $legajo;
    private $puntualidad;
    private $companierismo;
    private $pp;
    private $cn;
    private $apt;
    private $responsabilidad;
    private $iniciativa;
    private $promedio;
    
    private $conn;
    private $calf;


public function __construct($year="N/A",$legajo="N/A",$puntualidad="N/A",$companierismo="N/A",$pp="N/A",$cn="N/A",$apt="N/A",$responsabilidad="N/A",$iniciativa="N/A",$promedio="N/A"){
    require_once("../models/Conexion.php");
    $this->conn = Conexion::conectar();
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

public function get_Calificaion(){
    $datos = mysqli_query($this->conn,"SELECT Cal.* FROM calificacion as Cal, legajo as L WHERE Cal.legajo_id_legajo = L.id_legajo");
    $this->calf = $datos;
    ($this->conn)->close();     
    
    return $this->calf;
}
public function get_Legajos(){
    $datos = mysqli_query($this->conn,"SELECT `id_legajo` FROM `legajo`");
    $this->calf = $datos;
    ($this->conn)->close();     
    
    return $this->calf;
}

public function get_Calificaion_Promedio(){
    $datos = mysqli_query($this->conn,"
        
            SELECT 
            avg(puntualidad) AS puntualidad, 
            avg(compañerismo) AS compañerismo,
            avg(presentacion_personal) AS presentacion_personal,
             avg(cumplimiento_normas) AS cumplimiento_normas,
             avg(aplicacion_procesos_trabajo) AS aplicacion_procesos,
             avg(responsabilidad) AS responsabilidad,
             avg(iniciativa) AS iniciativa
              FROM calificacion
        ");
    $this->calf = $datos;
    ($this->conn)->close();     
    
    return $this->calf;
}

public function InsertCalificacion(){
    $this->conn = Conexion::conectar();

        $sql = mysqli_query($this->conn,"INSERT INTO `calificacion`( `legajo_id_legajo`, `year`, `puntualidad`, `compañerismo`, `presentacion_personal`, `cumplimiento_normas`, `aplicacion_procesos_trabajo`, `responsabilidad`, `iniciativa`, `promedio`) VALUES ('".$this->legajo."','".$this->year."',".$this->puntualidad.",".$this->companierismo.",".$this->pp.",".$this->cn.",".$this->apt.",".$this->responsabilidad.",".$this->iniciativa.",".$this->promedio.")");

        if ($sql = true) {
            echo "<script> alert('Se inserto una nueva Calificacion)</script>";
            
        }else {
            echo "Error al insertar Calificacion: " . mysqli_error($sql);
        }

        ($this->conn)->close();
}
public function UpdateCalificacion(){
    $this->conn = Conexion::conectar();
    $sql = mysqli_query($this->conn,"UPDATE `calificacion` SET `year`= ".$this->year.",`puntualidad`= ".$this->puntualidad.",`compañerismo`= ".$this->companierismo.",`presentacion_personal`= ".$this->pp.",`cumplimiento_normas`= ".$this->cn.",`aplicacion_procesos_trabajo`= ".$this->apt.",`responsabilidad`= ".$this->responsabilidad.",`iniciativa`= ".$this->iniciativa.",`promedio`= ".$this->promedio." WHERE `legajo_id_legajo` = ".$this->legajo);
    if ($sql = true) {
        echo "<script> alert('Se modifico una nueva Calificacion)</script>";
        
    }else {
        echo "Error al modificar Calificacion: " . mysqli_error($sql);
    }
    ($this->conn)->close();
}

public function DeletCalificacion($id){
    $this->conn = Conexion::conectar();
    $sql = mysqli_query($this->conn,"DELETE FROM `calificacion` WHERE `legajo_id_legajo` =".$id);

    if ($sql = true) {
        echo "<script> alert('Se Elimino una nueva Calificacion)</script>";
        
    }else {
        echo "Error al Eliminar Calificacion: " . mysqli_error($sql);
    }

    ($this->conn)->close();
}

}


?>