<div class="modal fade" id="modalFormNewPsicofisico" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">Nueva Psicofisico</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <!-- formularios -->
      <div class="tile">
          <div class="tile-body">
            <form action="Psicofisico_controll.php" id="formRol" name="formRol" method="POST">

            <div class="form-group">
                    <label class="control-label">Dni Persona</label>
                    <input class="form-control" type="number" id="txtdni_pers" name="dni" >
            </div>
    
<div class="row">
            <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label">Peso</label>
                      <input class="form-control" type="number" id="txttelefono" name="peso" rows="2" placeholder="Peso" required="">
                    </div>

              
            </div>
            <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label">Altura</label>
                      <input class="form-control" type="number" id="txttelefono" name="altura" rows="2" placeholder="Altura" required="">
                    </div>

                   
            </div>
        
        </div>
        <div class="row">
            <div class="col-sm-4">
                  <div class="form-group">
                      <label class="control-label">Exm Visual</label>
                      <textarea class="form-control" name="exm_visual" rows="3" placeholder="Enter ..." style="resize: none;"></textarea>
                    </div>
            </div>   

            <div class="col-sm-4">
                  <div class="form-group">
                      <label class="control-label">Exm Fisico</label>
                      <textarea class="form-control" name="exm_fisico" rows="3" placeholder="Enter ..." style="resize: none;"></textarea>
                    </div>
            </div>  

            <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">Alergias</label>
                            <textarea class="form-control" name="alergia" rows="3" placeholder="Enter ..." style="resize: none;"></textarea>
                            </div>
                    </div>  

    
         </div>   
        <div class="row">
            
                             
              <div class="col-sm-6">
                  <div class="form-group">
                      <label class="control-label">Lesiones</label>
                      <textarea class="form-control" name="lesione" rows="3" placeholder="Enter ..." style="resize: none;"></textarea>
                    </div>
            </div>  

            <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Problemas Cardiacos</label>
                        <textarea class="form-control" name="cardio" rows="3" placeholder="Enter ..." style="resize: none;"></textarea>
                        </div>
                </div>
                                 
        </div>
        
        <div class="row">
            
            <div class="col-sm-6">
                  <div class="form-group">
                      <label class="control-label">Exm Psicofisco</label>
                      <textarea class="form-control" name="exm_psico" rows="3" placeholder="Enter ..." style="resize: none;"></textarea>
                    </div>
                </div>  
                            
              <div class="col-sm-6">
                  <div class="form-group">
                      <label class="control-label">Otras Enfermedades</label>
                      <textarea class="form-control" name="o_enfermedades" rows="3" placeholder="Enter ..." style="resize: none;"></textarea>
                    </div>
            </div>               
        </div>
        <div class="row">
       
                          
            <div class="col-sm-6">
                  <div class="form-group">
                      <label class="control-label">Informe Medico</label>
                      <textarea class="form-control" name="info_medico" rows="3" placeholder="Enter ..." style="resize: none;"></textarea>
                    </div>
            </div>  

            <div class="col-sm-6">
                  <div class="form-group">
                      <label class="control-label">Diagnostico</label>
                      <textarea class="form-control" name="diagnostico" rows="3" placeholder="Enter ..." style="resize: none;"></textarea>
                    </div>
            </div>        
        </div>

           
                          


          <hr>
              <!-- botones -->  
              <div class="tile-footer">
                <button class="btn btn-primary" name="btn_new_psico" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;

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