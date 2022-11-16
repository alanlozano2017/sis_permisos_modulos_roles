<div class="modal fade" id="modalFormActualizarPersona" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">Actualizar Persona</h5>
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
                    <input class="form-control" type="number" id="txtnombre" name="txtnombre" placeholder="ingresa el DNI" required="">
                  </div>
                </div> 
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">Nombre</label>
                    <input class="form-control" type="text" id="txtnombre" name="txtnombre" placeholder="nombre" required="">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="control-label">Apellido</label>
                    <input class="form-control" type="text" id="txtdescripcion" name="txtdescripcion" rows="2" placeholder="apellido" required="">
                  </div>
                </div>    
            
             
               <div class="col-sm-6">
                  <div class="form-group">
                      <label class="control-label">Email</label>
                      <input class="form-control" type="mail" id="txtdescripcion" name="txtdescripcion" rows="2" placeholder="ingresa el email" required="">
                    </div>
               </div> 
              </div>
             </div>
               <div class="row">
               <div class="col-3">    
                    <div class="form-group">
                      <label class="control-label">Teléfono</label>
                      <input class="form-control" type="number" id="txttelefono" name="txtdescripcion" rows="2" placeholder="Teléfono" required="">
                    </div>
               </div>
         
              <div class="col-4">  
                  <div class="form-group">
                      <label class="control-label">Direccion</label>
                      <input class="form-control" type="text" id="fecha_nac" name="txtdescripcion" rows="2" placeholder="Direccion" required="">
                    </div>
              </div>
              <div class="col-5">      
                  <div class="form-group">
                      <label class="control-label">Fecha de nacimiento</label>
                      <input class="form-control" type="date" id="fecha_nac" name="txtdescripcion" rows="2" placeholder="ingresa la Fecha de nacimiento" required="">
                    </div>
              </div>
             </div>



             <hr>
             <!--  Puestos   datos  -->

             <div class="row">
              <div class="col-sm-6">
                  <div class="form-group">
                      <label for="exampleSelect1">Sector</label>
                      <select class="form-control" id="liststatus" name="liststatus" required="">
                        <option value="1">Compra</option>
                        <option value="2">Ventas</option>
                        <option value="3">Producción</option>
                        <option value="4">Marketing</option>
                        <option value="5">RRHH</option>
                        <option value="4">Depósito</option>
                      </select>
                  </div>
               </div>
               
               <div class="col-sm-6">
                <div class="form-group">
                    <label for="exampleSelect1">Puesto</label>
                    <select class="form-control" id="liststatus" name="liststatus" required="">
                      <option value="1">Jefe de planta</option>
                      <option value="2">Jefe de sector</option>
                      <option value="3">jafe de sector</option>
                      <option value="4">administrador</option>
                      <option value="5">supervisor</option>
                      <option value="4">evaluador</option>
                      <option value="4">Lider</option>
                      <option value="5">operario</option>
                      <option value="4">mecánico</option>
                    </select>
                </div>
               </div>
              </div>
            
              
            <div class="row">
              <!-- select -->
             <div class="col-sm-6">
              <div class="form-group">
                  <label for="exampleSelect1">Estado</label>
                  <select class="form-control" id="liststatus" name="liststatus" required="">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                    
                  </select>
               </div>
              </div>
            

            
            <div class="col-sm-6">      
                  <div class="form-group">
                      <label class="control-label">Fecha de ingreso</label>
                      <input class="form-control" type="date" id="fecha_nac" name="txtdescripcion" rows="2" placeholder="ingresa la Fecha de nacimiento" required="">
                    </div>
              </div>
             </div>
             
          
            <hr>

            <div class="row">
            <div class="col-3"> 
                  <div class="form-group">
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox">
                      <label class="form-check-label">Primaria</label>
                      </div>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox">
                      <label class="form-check-label">Secundaria</label>
                      </div>
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox">
                      <label class="form-check-label">Terc/Univer</label>
                      </div>
                  </div>
            </div>
              <div class="col-4">
              <div class="form-group">
                      <label class="control-label">Cursos Activos</label>
                      <input class="form-control" type="text" id="fecha_nac" name="txtdescripcion" rows="2" placeholder="Cursos Ac" required="">
                    </div>
              </div>
              <div class="col-5">
              <div class="form-group">
                      <label class="control-label">Titulos</label>
                      <input class="form-control" type="text" id="fecha_nac" name="txtdescripcion" rows="2" placeholder="Titulos" required="">
                    </div>
              </div>
            </div>

            <div class="row">
                  <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Experiencias</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Habilidades</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
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
                <button class="btn btn-primary" name="btn_mod_pers" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;

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