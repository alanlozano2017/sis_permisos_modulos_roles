<?php
session_start();
getModel('PuestosModel');

class Puestos extends Controllers{
    public function __construct()
    {
        parent::__construct();
        
        //session_regenerate_id(true);
        if(empty($_SESSION['login']))
        {
            header('Location: '.base_url().'/login');
        }
        
        
    }
    
    public function Personas()
    {
        if(empty($_SESSION['permisosMod']['r'])){
            header("Location:".base_url().'/dashboard');
        }
        
        
    }
}
$pues = new PuestosModel();
$arr = $pues->get_Puesto();
$arr2 = $pues->get_Hab();
$arr3= $pues->get_Hab();

$name;$exper;$habil;
$psi = array();

if(isset($_REQUEST['id_elim'])){
    $nuevoPuesto = new PuestosModel();
    $nuevoPuesto->ElimPuesto($_REQUEST['id_elim']);
    header("Refresh:0; url=puestos");
}

if(isset($_POST['btn_new_puesto']) or isset($_POST['btn_mod_puesto'])){
if(empty($_POST["newnombre"]) and empty($_POST["newexp"]) and empty($_POST['newhabil'])){

    
    echo '<script>alert("Error faltan campos por completar");</script>';
    

}else{
if(isset($_POST["newnombre"],$_POST["newexp"],$_POST['newhabil'])){
    $name = $_POST["newnombre"];
    $exper = $_POST['newexp'];
    $habil = $_POST['newhabil'];

    if(isset($_POST['visual'])){
        $psi[0] = 1;
    }else{
        $psi[0] = 0;
    }
    if(isset($_POST['fisica'])){
        $psi[1] = 1;
    }else{
        $psi[1] = 0;
    }
    if(isset($_POST['alergia'])){
        $psi[2] = 1;
    }else{
        $psi[2] = 0;
    }
    if(isset($_POST['lesione'])){
        $psi[3] = 1;
    }else{
        $psi[3] = 0;
    }
    if(isset($_POST['cardio'])){
        $psi[4] = 1;
    }else{
        $psi[4] = 0;
    }
    if(isset($_POST['psicofisico'])){
        $psi[5] = 1;
    }else{
        $psi[5] = 0;
    }
    if(empty($_POST['idpuesto'])){
        $nuevoPuesto = new PuestosModel();
        $nuevoPuesto->setPuesto($name,$exper,$habil,$psi);
        
        $id_psi = $nuevoPuesto->insertarPsi();
        $nuevoPuesto->insertarPuesto($id_psi);
        header("Refresh:0; url=puestos");
    }else{
        $nuevoPuesto = new PuestosModel();
        $nuevoPuesto->setPuesto($name,$exper,$habil,$psi);
        $nuevoPuesto->ModfPsi($_POST['idpuesto']);
        $nuevoPuesto->ModfPuesto($_POST['idpuesto']);
        header("Refresh:0; url=puestos");
    }
}
}
}

$data['page_tag'] = "Puestos";
            $data['page_title'] = "PUESTOS <small>Sistema RRHH</small>";
            $data['page_name'] = "puestos";
            $data['page_functions_js'] = "functions_puestos.js";
            getPermisos(MPUESTOS);

require_once "Views/Puestos/Puestos.php"; 


?>