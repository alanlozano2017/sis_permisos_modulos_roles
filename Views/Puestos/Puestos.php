<?php 
    headerAdmin($data); 
    
?>

<main class="app-content">
      <div class="app-title">
        <div>
            <h1><i class="fas fa-user-tag"></i> <?= $data['page_title'] ?>
            <?php if($_SESSION['permisosMod']['w']){ ?>
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalFormNuevoPuesto"><i class="fa fa-plus-circle" aria-hidden="true"></i> Nuevo</button>
                <?php } ?>
              </h1>
                
                    
                
                
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/puestos"><?= $data['page_title'] ?></a></li>
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
                  <th style="width: 10%;">ID Puesto</th>
                  <th style="width: 15%;">nombre del puesto</th>
                  <th style="width: 10%;">Experiencia Requerida:</th>
                  <th style="width: 12%;">Habilidad Principal</th>
                  <th class="not-export-column text-center" style="width: 15%;">Acciones</th>
                </tr>
                </thead>
                <tbody>

                <?php
                  foreach($arr as $row){
                ?>     
                  <tr>
                    <td><?php echo $row['id_puesto'] ?></td>
                    <td><?php echo $row['nombre_puesto'] ?></td>
                    <td><?php echo $row['rango_exp'] ?></td>
                    <td><?php echo $row['nombre_habilidad'] ?></td>
                    <td class="col-1 text-center"> 
                        <div>
                        <?php if($_SESSION['permisosMod']['u']){ ?>
                          <button class="btn btn-primary  btn-sm  btnEditRol" rl="'1'" title="Editar" type="button" data-toggle="modal" data-id=<?php echo $row['id_puesto'] ?> data-target="#modalFormActualizarPuesto"><i class="fas fa-pencil-alt"></i></button>
                        <?php } ?>
                          <!--<button class="btn btn-success btn-xs btnEditRol" rl="'1'" id="btnPsico" title="Agregar Psicofisico" type="button" data-toggle="modal" data-id=<?php //echo $row['dni'] ?> data-target="#modalFormNewPsicofisico"><i class="fa fa-cross"></i></button>-->
                        <?php if($_SESSION['permisosMod']['d']){ ?>
                          <a href="<?= base_url(); ?>/puestos?id_elim= <?php echo $row['id_puesto']?>"><button class="btn btn-danger btn-sm btnDelRol" rl="'1'" title="Eliminar" ><i class="far fa-trash-alt"></i></button></a>
                        <?php } ?>
                        </div>
                    </td>

                  </tr>
                  
              <?php
                  }
               ?>   
                </tbody>
                <tfoot>
                <tr>
                    <th>ID Puesto</th>
                    <th>Cantidad de empleados</th>
                    <th>Experiencia Requerida:</th>
                    <th>Habilidad Principal</th>
                    <th>Acciones</th>
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

require_once "Views/Template/Modals/new-puesto.php";
require_once "Views/Template/Modals/edit-puesto.php";



?>


