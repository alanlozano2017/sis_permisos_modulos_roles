<div class="modal fade" id="modalFormNuevoPuesto" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">Nuevo Puesto</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <!-- formularios -->
      <div class="tile">
          <div class="tile-body">
            <form action="Puestos_controll.php" id="formRol" name="formRol" method="post">
            


              
    
                  <div class="form-group">
                    <label class="control-label">Nombre Puesto</label>
                    <input class="form-control" type="text" id="txtnombre" name="newnombre" placeholder="nombre">
                  </div>
      
                
                <div class="form-group">
                      <label for="exampleSelect1">Experiencia Requerida</label>
                      <select class="form-control" id="liststatus" name="newexp">
                        <option value="1">0 a 1 año</option>
                        <option value="2">1 a 2 años</option>
                        <option value="3">2 a 3 años</option>
                        <option value="4">3 a 4 años</option>
                        <option value="5">4 a 5 años</option>               
                      </select>
                  </div>
                
              
              <hr>
               
                  <label for="exampleSelect1">ctrl + click </label>
                  <div class="form-group">
                        <label>Habilidades</label>
                        <select multiple class="custom-select" name="newhabil[]" >
                          <?php
                         
                          while($row = $arr2->fetch_assoc()){
                        
                          echo "<option value=".$row["id_habilidad"].">".$row["nombre_habilidad"]."</option>";                         
                        
                          }
                
                          ?>
                        </select>
                      </div>
                  
                  <hr>

                  <label for="exampleSelect1">Psicofisico</label>
               <div class="row">
               
               <div class="col-3">
                    <!-- radio -->
                    <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="visual">
                          <label class="form-check-label">Examen visual</label>
                        </div>
                    
                    
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="fisica">
                          <label class="form-check-label">Evaluacion fisica</label>
                        </div>
                    </div>
                  </div>
         
              
              <div class="col-4">      
              <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="alergia">
                          <label class="form-check-label">Alergias</label>
                        </div>
                    
              
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="lesione">
                          <label class="form-check-label">Lesiones</label>
                        </div>
                    </div>
             </div>

             <div class="col-5">      
              <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="cardio">
                          <label class="form-check-label">Problemas cardiacos</label>
                        </div>
                    
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="psicofisico">
                          <label class="form-check-label">Examen Psicofisico</label>
                        </div>
                    </div>
             </div>

</div>

            <!--<div class="form-group">
                      <label for="exampleSelect1">Sexo</label>
                      <select class="form-control" id="liststatus" name="liststatus" required="">
                        <option value="1">Masculino</option>
                        <option value="0">Femenino</option>
                        
                      </select>
                      
                  </div>-->
              <!-- botones -->  
              <div class="tile-footer">
                <button class="btn btn-primary" name="btn_new_puesto" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;

                <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar
                </button>
             </div>
            </form>
          </div>
          
        </div>

    </div>

  </div>
</div>
</div>

