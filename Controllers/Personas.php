<?php
session_start();
getModel('PersonasModel');

$pers = new PersonasModel();
$pues = new PersonasModel();



$arr = $pers->get_Persona();
$arr2 = $pues->get_Puesto();
$arr3 = $pues->get_Hab();

//echo $_POST['txtnombre'].$_POST['txtdni'];
if(isset($_REQUEST['id_elim'])){
    $new_pers = new PersonasModel();
    $pers->DeletPersona($_REQUEST['id_elim']);
    header("Refresh:0; url=personas");

}


if(isset($_POST['btn_new_pers']) || isset($_POST['btn_mod_pers'])){
if(empty($_POST['dni']) and empty($_POST['apellido_p']) and empty($_POST['nombre_p'])){
    echo '<script> alert("Error: Faltan campos por completar"); </script>';
}else{  
        $fecha_ing = date("Y-m-d");
        $estudios = array();
        

            if(isset($_POST['primaria'])){
                $estudios[0] = 1;
            }else{
                $estudios[0] = 0;
            }
            if(isset($_POST['secundaria'])){
                $estudios[1] = 1;
            }else{
                $estudios[1] = 0;
            }
            if(isset($_POST['ter_univ'])){
                $estudios[2] = 1;
            }else{
                $estudios[2] = 0;
            }

        $new_pers = new PersonasModel($_POST['dni'],$_POST['newexp'],$_POST['listpuesto'],$_POST['nombre_p'],$_POST['apellido_p'],$_POST['email'],$_POST['direc'],$_POST['tel'],$fecha_ing,$_POST['fecha_nac'],1,$_POST['newhabil'],$estudios,$_POST['cursos'],$_POST['titulos']);
        $dni_pers = $new_pers->InsertPers();
        $id_est = $new_pers->InsertEstud();
        $id_habl = $new_pers->InsertHabil();
        $new_pers->InsertLegajo($dni_pers,$_POST['listpuesto'],$id_habl,$id_est);
        header("Refresh:0; url=personas");
        echo "<script> alert('Todo salio correctamente!! ')</script>";
    }
}




            $data['page_tag'] = "Personas";
            $data['page_title'] = "PERSONAS <small>Sistema RRHH</small>";
            $data['page_name'] = "personas";
            $data['page_functions_js'] = "functions_personas.js";


require_once "Views/Personas/Personas.php"; 




?>