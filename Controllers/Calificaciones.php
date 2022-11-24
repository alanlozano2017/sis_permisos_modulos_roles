<?php
session_start();
getModel('CalificacionesModel');

class Calificaciones extends Controllers{
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

$calficacion = new CalificacionesModel();
$calficacion2 = new CalificacionesModel();


$arr = $calficacion->get_Calificaion();
$arr2 = $calficacion2->get_Legajos();

if(isset($_REQUEST['id_elim'])){
    $new_calf = new CalificacionesModel();
    $new_calf->DeletCalificacion($_REQUEST['id_elim']);
    header("Refresh:0; url=calificaciones");

}

if(isset($_POST['btn-new-calf']) || isset($_POST['btn-edit-calf'])){
    if(empty($_POST['iniciativa']) and empty($_POST['legajo']) and empty($_POST['responsabilidad']) and empty($_POST['puntualidad']) and empty($_POST['c_normas']) and empty($_POST['p_personal']) and empty($_POST['companierismo']) and empty($_POST['apt'])){
        echo "<script>alert('Campos vacios')</script>";
    }else{

        $year = date("Y");
        $promedio = ($_POST['puntualidad'] + $_POST['companierismo'] + $_POST['p_personal'] + $_POST['c_normas'] + $_POST['apt'] + $_POST['responsabilidad'] + $_POST['iniciativa'])/7;
        $new_calf = new CalificacionesModel();
        $new_calf -> setCalificaciones($year,$_POST['legajo'],$_POST['puntualidad'],$_POST['companierismo'],$_POST['p_personal'],$_POST['c_normas'],$_POST['apt'],$_POST['responsabilidad'],$_POST['iniciativa'],$promedio);

        if(isset($_POST['btn-edit-calf'])){
        $new_calf->UpdateCalificacion(); 
        header("Refresh:0; url=calificaciones");
        }else{
        $new_calf->InsertCalificacion(); 
        header("Refresh:0; url=calificaciones");
        }
        }
}

$data['page_tag'] = "Calificaciones";
            $data['page_title'] = "CALIFICACIONES <small>Sistema RRHH</small>";
            $data['page_name'] = "calificaciones";
            $data['page_functions_js'] = "functions_calificaciones.js";
            getPermisos(MCALIFICACIONES);

require_once "Views/Calificaciones/Calificaciones.php";

?>