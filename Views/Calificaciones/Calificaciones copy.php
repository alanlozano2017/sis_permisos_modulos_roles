<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../views/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../views/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  
  <!-- Navbar -->
  <div id="encabezado"></div>
  <!-- /.navbar -->
  
  <div id="sidebar"></div>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      

      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
   

    <!-- Main content -->
    <section class="content">
    <div>
    <h1>&nbsp;&nbsp;<i class="fa fa fa-users"></i> Calificaciones &nbsp;
      <button class="btn btn-primary" type="button"  data-toggle="modal" data-target="#modalFormNuevoCalf"><i class="fa fa-plus-circle" aria-hidden="true"></i> Nuevo</button>

    </h1>
    <br>
    
  </div>
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col mb-6">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Datos de Calificaciones</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Legajo</th>
                    <th>Calf Principales</th>
                    <th>Calf Secundarias</th>
                    <th>Promedio</th>
                    <th class="not-export-column">Acciones</th>
                  </tr>
                </thead>
                <tbody>

                <?php
                          
                while($row = $arr->fetch_assoc()){
            
                ?>

                <?php
                  
                  $aux_parte = array();
                  $i = 0;
    
                  foreach($row as $v){
                   
                      if($v <= 2.50){
                        $aux_parte[$i] = "badge badge-danger";
                      }else if($v > 2.50 && $v < 3.50){
                        $aux_parte[$i] = "badge badge-warning";
                      }else if($v> 3.50){
                        $aux_parte[$i] = "badge badge-success";
                      }
                    $i++;
                    
                  
                  }

                  echo '<tr>
                    <td>'.$row['legajo_id_legajo'].'</td>
                    <td >
                        <span class="'.$aux_parte[3].'" style="margin-right: 10px;"> Puntualidad </span>
                        <span class="'.$aux_parte[6].'" style="margin-right: 10px;"> Cumplimiento normas </span>
                        <span class="'.$aux_parte[7].'" style="margin-right: 10px;"> APT </span>
                        <span class="'.$aux_parte[5].'" style="margin-right: 10px;"> Presentacion persoanal </span>
                    </td>
                    <td>
                        <span class="'.$aux_parte[4].'"style="margin-right: 10px;"> Compañerismo </span>
                        <span class="'.$aux_parte[9].'"style="margin-right: 10px;"> Iniciativa</span>
                        <span class="'.$aux_parte[8].'"style="margin-right: 10px;"> Responsabilidad </span>
                    </td>
                    <td><span class="'.$aux_parte[10].'"style="margin-right: 10px;"> '.$row['promedio'].' </span></td>
                    <td class="col-1"> 
                      <div>
                        <!-- <button class="btn btn-secondary btn-xs btnPermisosRol" rl="1" title="Permisos" type="button" data-toggle="modal" data-target="#modalFormActualizarPersona"><i class="fa fa-unlock-alt"></i></button> -->
                        <button class="btn btn-primary btn-xs btnEditRol" id="btnActu" rl="1" title="Editar" type="button" data-toggle="modal" data-target="#modalFormActualizarCalf" data-legajo='. $row['legajo_id_legajo'] .'><i class="fa fa-pencil-alt"></i></button>
                        <a href="Calificacion_controll.php?id_elim='.$row['legajo_id_legajo'].'"><button class="btn btn-danger btn-xs btnDelRol" id="btnElim" rl="1" title="Eliminar"><i class="fa fa-trash"></i></button></a>
                      </div>
                  </td>
                  </tr>';
           
                
            }
            ?>

                </tbody>
                <tfoot>
                <tr>
                    <th>Legajo</th>
                    <th>Calf Principales</th>
                    <th>Calf Secundarias</th>
                    <th>Promedio</th>
                    <th class="not-export-column">Acciones</th>
                  </tr>
                </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
</div> 
      </div>
      </div>
</section>
    
   
    <!-- Main content -->
    
    
    <!-- /.content ------------------------------------------------>


      </div><!-- /.container-fluid -->
    </div> <!-- /.content-header -->
  </div><!-- /.content-wrapper -->
  
  <div id="footer"></div>
  
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  
  <!-- jQuery -->
  <script src="../views/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../views/dist/js/adminlte.min.js"></script>
  
<script src="../views/js/tools.js"></script>
<script src="../views/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../views/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../views/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../views/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../views/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../views/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../views/plugins/jszip/jszip.min.js"></script>
<script src="../views/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../views/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../views/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../views/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../views/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->

<!-- AdminLTE for demo purposes -->
<script src="../views/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
     $(document).on("click", "#btnActu" , function (){
      
    var id =$(this).data('legajo');
    console.log(id);
    $("#txtlegajo").val(id);
  });

  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

 
</script>

<?php
include("../views/Tablas_Ref/opciones/new-calificacion.php");
include("../views/Tablas_Ref/opciones/edit-calificacion.php");
?>

</body>



</html>
