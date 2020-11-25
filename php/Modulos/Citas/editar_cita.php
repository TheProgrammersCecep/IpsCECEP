
<form role="form"  id="feditarh">
  <div class="modal fade" id="editar" tabindex="-1" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Cita</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        <label for="validationTooltip04">Historia cod</label>
        <input type="text" class="form-control" id="hcod" name="hcod" value = "" readonly="true"/>
        <br>
        <label for="validationTooltip04">Paciente</label>
        <input type="text" class="form-control" id="hpaciente" name="hpaciente"/>
        <br>
        <label for="validationTooltip04">Fecha</label>
        <input class="form-control" id="hfecha" type="date" name="hfecha" min = "<?php echo date("Y-m-d");?>" 
                              value="<?php echo date("Y-m-d");?>" required=”required”>
        <br>
        <label for="validationTooltip04">Hora</label>
        <input class="form-control" id="hhora" type="time" name="hhora"> </input>
        <br>

        
        
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="validationTooltip04">Medico</label>
            <select class="custom-select" id="hmedico" name="hmedico" required> </select>
          </div>  
          <div class="form-group col-md-6">
            <label for="validationTooltip04">Asesor</label>
            <select class="custom-select" id="hasesor" name="hasesor" required> </select>
          </div> 
        </div>

        <div class="form-group">
            <label>Servicio</label>
            <select class="custom-select" id="hservicio" name="hservicio" required> </select>
          </div> 

        <label for="validationTooltip04">Descipcion</label>
        <input class="form-control" id="hdesc" type="text" name="hdesc"> </input>
        <br>


        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="validationTooltip04">Pais</label>
            <select class="custom-select" id="hpais" name="hpais" required> </select>
          </div>  
          <div class="form-group col-md-6">
            <label>Ciudad</label>
            <select class="custom-select" id="hciudad" name="hciudad" required> </select>
          </div> 
        </div>

        <label for="validationTooltip04">Sede</label>
        <select class="custom-select" id="hsede" name="hsede" required> </select>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" id="actualizar" class="btn btn-primary" data-dismiss="modal">Guardar</button>
        </div>
      </div>
    </div>
  </div>

  <input type="hidden" id="editar" value="editar" name="accion"/>
</form>
