<div class="modal fade" id="modalFormNuevoPersona" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">Nueva Persona</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <!-- formularios -->
      <div class="tile">
          <div class="tile-body">
            <form action="personas" id="formRol" name="formRol" method="POST">
            


              <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label">DNI</label>
                    <input class="form-control" type="number" id="txtdni" name="dni" placeholder="ingresa el DNI" required="">
                  </div>
                </div> 
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">Nombre</label>
                    <input class="form-control" type="text" id="txtnombre" name="nombre_p" placeholder="nombre" required="">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">Apellido</label>
                    <input class="form-control" type="text" id="txtdescripcion" name="apellido_p" rows="2" placeholder="apellido" required="">
                  </div>
                </div>    
            
             
               <div class="col-sm-6">
                  <div class="form-group">
                      <label class="control-label">Email</label>
                      <input class="form-control" type="mail" id="txtdescripcion" name="email" rows="2" placeholder="ingresa el email" required="">
                    </div>
               </div> 
              </div>
             </div>
               <div class="row">
               <div class="col-3">    
                    <div class="form-group">
                      <label class="control-label">Teléfono</label>
                      <input class="form-control" type="tel" id="txttelefono" name="tel" rows="2" placeholder="Teléfono" required="">
                    </div>
               </div>
         
              <div class="col-4">  
                  <div class="form-group">
                      <label class="control-label">Direccion</label>
                      <input class="form-control" type="text" id="dir" name="direc" rows="2" placeholder="Direccion" required="">
                    </div>
              </div>
              <div class="col-5">      
                  <div class="form-group">
                      <label class="control-label">Fecha de nacimiento</label>
                      <input class="form-control" type="date" id="fecha_nac" name="fecha_nac" rows="2" placeholder="ingresa la Fecha de nacimiento" required="">
                    </div>
              </div>
             </div>



             <hr>
             <!--  Puestos   datos  -->

             <div class="row">
              
               
               <div class="col-sm-6">
                <div class="form-group">
                    <label for="exampleSelect1">Puesto</label>
                    <select class="form-control" id="liststatus" name="listpuesto" required="">
                  <?php
                  while($row = $arr2->fetch_assoc()){               
                    
                    echo "<option value=".$row["id_puesto"].">".$row["nombre_puesto"]."</option>"; 
                    }
                    ?>
                    </select>
                </div>
               </div>
               <div class="col-sm-6">
               <div class="form-group">
                      <label for="exampleSelect1">Experiencia</label>
                      <select class="form-control" id="liststatus" name="newexp">
                        <option value="1">0 a 1 año</option>
                        <option value="2">1 a 2 años</option>
                        <option value="3">2 a 3 años</option>
                        <option value="4">3 a 4 años</option>
                        <option value="5">4 a 5 años</option>               
                      </select>
                  </div>
                </div> 
              </div>
            
              
          
          
            <hr>

            <div class="row">
            
            <div class="col-sm-6">

                      <div class="form-group">
                            <label>Habilidades (ctrl + click)</label>
                            <select multiple class="custom-select" name="newhabil[]" >
                              <?php
                            
                              while($row = $arr3->fetch_assoc()){
                            
                              echo "<option value=".$row["id_habilidad"].">".$row["nombre_habilidad"]."</option>";                         
                            
                              }
                    
                              ?>
                            </select>
                          </div>
                    </div>

            <div class="col-sm-6"> 
                  <div class="form-group">
                  <label>Estudios finallizados</label>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="primaria">
                      <label class="form-check-label">Primaria</label>
                      </div>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="secundaria">
                      <label class="form-check-label">Secundaria</label>
                      </div>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="ter_univ">
                      <label class="form-check-label">Terc/Univer</label>
                      </div>
                  </div>
            </div>
            </div>
            <div class="row">
            <div class="col-sm-6">
                    <div class="form-group">                 
                    <label class="control-label">Cursos Activos</label>
                    <textarea class="form-control" name="cursos" rows="3" placeholder="Enter ..." style="resize: none;"></textarea>
                    </div>
              </div>
              

              <div class="col-sm-6">
              <div class="form-group">
                      <label class="control-label">Titulos</label>
                      <textarea class="form-control" name="titulos" rows="3" placeholder="Enter ..." style="resize: none;"></textarea>
                    </div>
              </div>
            </div>

      
                              
          <hr>
              <!-- botones -->  
              <div class="tile-footer">
                <button class="btn btn-primary" name="btn_new_pers" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;

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

