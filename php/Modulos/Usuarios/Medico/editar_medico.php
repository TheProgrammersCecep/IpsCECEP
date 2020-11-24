
<form role="form"  id="feditarh">
  <div class="modal fade" id="editar" tabindex="-1" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Medico</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        <label for="validationTooltip04">Codigo</label>
        <input type="text" class="form-control" id="mcodigo" name="mcodigo" value = "" readonly="true"/>
        <br>
        <label for="validationTooltip">Empleado</label>
        <input type="text" class="form-control" id="mmedico" name="mmedico"/>
        <br>
        <label for="validationTooltip04">Sede</label>
        <select class="custom-select" id="msede" name="msede" required> </select>
        <br><br>
        <label for="validationTooltip04">Ciudad</label>
        <select class="custom-select" id="mciudad" name="mciudad" required> </select>
        <br><br>
        <label for="validationTooltip04">Pais</label>
        <select class="custom-select" id="mpais" name="mpais" required> </select>
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
