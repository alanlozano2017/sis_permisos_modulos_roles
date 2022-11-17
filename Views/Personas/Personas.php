<?php 
    headerAdmin($data); 
    
?>

<main class="app-content">
      <div class="app-title">
        <div>
            <h1><i class="fas fa-user-tag"></i> <?= $data['page_title'] ?>
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalFormNuevoPersona"><i class="fa fa-plus-circle" aria-hidden="true"></i> Nuevo</button>
                </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/usuarios"><?= $data['page_title'] ?></a></li>
        </ul>
      </div>

        <div class="row">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10%;">DNI</th>
                    <th style="width: 15%;">Nombre y Apellido</th>
                    <th style="width: 10%;">Puesto</th>
                    <th style="width: 12%;" >Fecha ingreso</th>
                    <th class="not-export-column htestado d-none d-sm-table-cell"  style="width: 10%;">Estado</th>
                    <th class="not-export-column text-center" style="width: 15%;">Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
<?php

foreach($arr as $row){

?>     
                    <tr>
                      <td><?php echo $row['dni'] ?></td>
                      <td><?php echo $row['nombre']." ".$row['apellido'] ?></td>
                      <td><?php echo $row['nombre_puesto'] ?></td>
                      <td><?php echo date("d-m-Y", strtotime($row['fecha_ingreso'])); ?></td>
                      <td class="estado col-1 "> 
                        <span class="badge badge-success">Activo</span>
                      </td>
                      <td class="col-1 text-center"> 
                        <div>
                          <button class="btn btn-primary  btn-sm  btnEditRol" rl="'1'" title="Editar" type="button" data-toggle="modal" data-target="#modalFormActualizarPersona"><i class="fas fa-pencil-alt"></i></button>
                          <!--<button class="btn btn-success btn-xs btnEditRol" rl="'1'" id="btnPsico" title="Agregar Psicofisico" type="button" data-toggle="modal" data-id=<?php //echo $row['dni'] ?> data-target="#modalFormNewPsicofisico"><i class="fa fa-cross"></i></button>-->
                          <a href="<?= base_url(); ?>/personas?id_elim= <?php echo $row['dni']?>"><button class="btn btn-danger btn-sm btnDelRol" rl="'1'" title="Eliminar" ><i class="far fa-trash-alt"></i></button></a>
                        </div>
                    </td>
                    </tr>
<?php
                  }
   ?>              
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>DNI</th>
                    <th>Nombre y Apellido</th>
                    <th>Puesto</th>
                    <th>Puesto</th>
                    <th>Estado/th>
                    <th>Accion</th>
                  </tr>
                  </tfoot>
                </table>
                  </div>
                </div>
              </div>
            </div>
        </div>

    </main>

    
    
   
    
<?php footerAdmin($data); 

require_once "Views/Template/Modals/new-persona.php";
require_once "Views/Template/Modals/edit-persona.php";
require_once "Views/Template/Modals/new-psicofisico.php";


?>