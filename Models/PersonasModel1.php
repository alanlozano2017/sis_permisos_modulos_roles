<?php
Class PersonasModel{
    private $conn;
    private $dni;
    private $exp_id;
    private $nombre;
    private $apellido;
    private $email;
    private $direccion;
    private $tel;
    private $fecha_ing;
    private $fecha_nac;
    private $status;

    private $puesto_id;
    private $habilidades;
    private $estudios;
    private $curso;
    private $titulo;

    private $persona_arr;
    private $datos;

    public function __construct($dni="N/A",$exp_id="N/A",$puesto_id="N/A",$nombre="N/A",$apellido="N/A",$email="N/A",$direccion="N/A",$tel="N/A",$fecha_ing="N/A",$fecha_nac="N/A",$status="N/A", $habilidades=array(), $estudios=array(),$curso="N/A",$titulo="N/A"){
        require_once("Conexion.php");
        $this->conn = Conexion::conectar();
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

    

    public function get_Persona(){
        $datos = mysqli_query($this->conn,"SELECT P.dni, P.nombre,P.apellido, Ps.nombre_puesto,P.fecha_ingreso, P.status FROM persona as P, puesto as Ps WHERE P.puesto_id = Ps.id_puesto and P.status = 1");
            $this->persona_arr = $datos;
        ($this->conn)->close();     
        
        return $this->persona_arr;
    }

    public function get_Puesto(){
        $this->conn = Conexion::conectar();
        $sql = mysqli_query($this->conn,"SELECT id_puesto , nombre_puesto FROM puesto ");
        $this->datos = $sql;
        ($this->conn)->close();     
        
        return $this->datos;
    }

    public function get_Hab(){
        $this->conn = Conexion::conectar();
        $sql = mysqli_query($this->conn,"SELECT * FROM habilidad");
        $this->datos = $sql;
        ($this->conn)->close();     
        
        return $this->datos;
    }

    public function InsertPers(){
        $this->conn = Conexion::conectar();

        $sql = mysqli_query($this->conn,"INSERT INTO `persona`(`dni`, `experiencia`, `puesto_id`, `nombre`, `apellido`, `email`, `direccion`, `telefono`, `fecha_nac`, `fecha_ingreso`, `status`) VALUES (".$this->dni.",".$this->exp_id.",".$this->puesto_id.",'".$this->nombre."','".$this->apellido."','".$this->email."','".$this->direccion."',".$this->tel.",'".$this->fecha_nac."','".$this->fecha_ing."',".$this->status.")");
        if ($sql = true) {
            echo "<script> alert('Se inserto una nueva persona')</script>";
            
        }else {
            echo "Error al insertar persona: " . mysqli_error($sql);
        }

        ($this->conn)->close();
        return $this->dni;
    }
    public function InsertEstud(){
        $this->conn = Conexion::conectar();
        $arr_est = $this->estudios;

        $sql = mysqli_query($this->conn,"INSERT INTO `estudio`(`primario`, `secundario`, `terciario_universitario`, `cursos_activos`, `titulo`) VALUES (".$arr_est[0].",".$arr_est[1].",".$arr_est[2].",'".$this->curso."','".$this->titulo."')");

        if ($sql = true) {
            echo "<script> alert('Se inserto un estudio')</script>";
            
        }else {
            echo "Error al insertar estudio: " . mysqli_error($sql);
        }
        $sqlaux = mysqli_query($this->conn,"SELECT idestudios FROM estudio ORDER BY idestudios DESC");
        $row = $sqlaux->fetch_assoc();
        
        ($this->conn)->close();
        return $row['idestudios'];
    }

    public function InsertHabil(){
        $this->conn = Conexion::conectar();
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
    
        $sql = mysqli_query($this->conn,"INSERT INTO `habilidad_persona`(".$hab_key.") VALUES (".$hab_val.")");
        if ($sql = true) {
            echo "<script> alert('Se inserto una habilidad')</script>";
            
        }else {
            echo "Error al insertar habilidad: " . mysqli_error($sql);
        }
        $sqlaux = mysqli_query($this->conn,"SELECT id_hab_pers FROM habilidad_persona ORDER BY id_hab_pers DESC");
        $row = $sqlaux->fetch_assoc();

        ($this->conn)->close();
        return $row['id_hab_pers'];
    }
  
    public function InsertLegajo($dni,$idPues,$idHab,$idEst){
        $this->conn = Conexion::conectar();
        $idLeg = rand(100000, 999999);

        $sql = mysqli_query($this->conn,"INSERT INTO `legajo`(`id_legajo`, `persona_dni`, `ID_Leg_puesto`, `habilidad_persona_id`, `psicofisico_persona_:id`, `estudio_idestudio`) VALUES (".$idLeg.",".$dni.",".$idPues.",".$idHab.",1,".$idEst.")");
    
    if ($sql = true) {
        echo "<script> alert('Se inserto un Legajo')</script>";
        
    }else {
        echo "Error al insertar legajo: " . mysqli_error($sql);
    }

    ($this->conn)->close();
}


public function DeletPersona($id){
    $this->conn = Conexion::conectar();
    $sql = mysqli_query($this->conn,"UPDATE `persona` SET `status`= 0 WHERE `dni` =".$id);
    if ($sql = true) {
        echo "<script> alert('La persona DNI: ".$id."' Se dio de baja!!)</script>";
        
    }else {
        echo "Error al eliminar: " . mysqli_error($sql);
    }

}
}


?>