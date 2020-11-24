
<form role="form"  id="feditarh">
  <div class="modal fade" id="editar" tabindex="-1" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Empleado</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        <label for="validationTooltip04">Codigo</label>
        <input type="text" class="form-control" id="ecodigo" name="ecodigo" value = "" readonly="true"/>
        <br>
        <label for="validationTooltip04">Empleado</label>
        <input type="text" class="form-control" id="eempleado" name="eempleado"/>
        <br>
        <label for="validationTooltip04">Cargo</label>
        <input type="text" class="form-control" id="ecargo" name="ecargo"/>
        <br>
        <label for="validationTooltip04">Oficina</label>
        <select class="custom-select" id="esede" name="esede" required> </select>
        <br><br>
        <label for="validationTooltip04">Ciudad</label>
        <select class="custom-select" id="eciudad" name="eciudad" required> </select>
        <br><br>
        <label for="validationTooltip04">Pais</label>
        <select class="custom-select" id="epais" name="epais" required> </select>
        <br>
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
