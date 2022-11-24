



<?php 
    headerAdmin($data); 
    
?>

<main class="app-content">
      <div class="app-title">
        <div>
            <h1><i class="fas fa-user-tag"></i> <?= $data['page_title'] ?>
            <?php if($_SESSION['permisosMod']['w']){ ?>
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalFormNuevoCalf"><i class="fa fa-plus-circle" aria-hidden="true"></i> Nuevo</button>
                <?php } ?>
              </h1>
                
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/calificaciones"><?= $data['page_title'] ?></a></li>
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
                    <th style="width: 10%;">Legajo</th>
                    <th style="width: 15%;">Calf Principales</th>
                    <th style="width: 10%;">Calf Secundarias</th>
                    <th style="width: 10%;">Promedio</th>
                    <th class="not-export-column text-center" style="width: 15%;">Acciones</th>
                  </tr>
                </thead>
                <tbody>

                <?php
                          
                foreach($arr as $row){
            
                ?>

                <?php
                  
                  $aux_parte = array();
                  $i = 0;
    
                  foreach($row as $v){
                   
                      if($v <= 2.50){
                        $aux_parte[$i] = "badge badge-danger";
                      }else if($v > 2.50 && $v < 3.50){
                        $aux_parte[$i] = "badge badge-warning";
                      }else if($v>= 3.50){
                        $aux_parte[$i] = "badge badge-success";
                      }
                    $i++;
                    
                  
                  }

                  echo '<tr>
                    <td>'.$row['legajo_id_legajo'].'</td>
                    <td >
                        <span class="'.$aux_parte[2].'" style="margin-right: 10px;"> Puntualidad </span>
                        <span class="'.$aux_parte[5].'" style="margin-right: 10px;"> Cumplimiento normas </span>
                        <span class="'.$aux_parte[6].'" style="margin-right: 10px;"> APT </span>
                        <span class="'.$aux_parte[4].'" style="margin-right: 10px;"> Presentacion persoanal </span>
                    </td>
                    <td>
                        <span class="'.$aux_parte[3].'"style="margin-right: 10px;"> Compañerismo </span>
                        <span class="'.$aux_parte[8].'"style="margin-right: 10px;"> Iniciativa</span>
                        <span class="'.$aux_parte[7].'"style="margin-right: 10px;"> Responsabilidad </span>
                    </td>
                    <td><span class="'.$aux_parte[9].'"style="margin-right: 10px;"> '.$row['promedio'].' </span></td>
                    ';
            ?>  
                    <td class="col-1 text-center"> 
                        <div>
                        <?php if($_SESSION['permisosMod']['u']){ ?>
                          <button class="btn btn-primary  btn-sm  btnEditRol" rl="'1'" title="Editar" type="button" data-toggle="modal" data-target="#modalFormActualizarCalf"><i class="fas fa-pencil-alt"></i></button>
                        <?php } ?>

                        <?php if($_SESSION['permisosMod']['d']){ ?>
                          <a href="<?= base_url(); ?>/calificaciones?id_elim= <?php echo $row['legajo_id_legajo']?>"><button class="btn btn-danger btn-sm btnDelRol" rl="'1'" title="Eliminar" ><i class="far fa-trash-alt"></i></button></a>
                        <?php } ?>
                        </div>
                    </td>

            <?php
            echo  '</tr>';
            }
            ?>

                </tbody>
                
                </table>

                </div>
                </div>
              </div>
            </div>
        </div>

    </main>

    
    
   
    
<?php footerAdmin($data); 

require_once "Views/Template/Modals/new-calificacion.php";
require_once "Views/Template/Modals/edit-calificacion.php";



?>
   


