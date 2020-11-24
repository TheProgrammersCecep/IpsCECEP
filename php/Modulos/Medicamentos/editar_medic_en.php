
<form role="form"  id="feditarh">
  <div class="modal fade" id="editar" tabindex="-1" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Entrega Medicamento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <label for="validationTooltip04">Formula id</label>
        <input type="text" class="form-control" id="mcformula" name="mcformula" value = "" readonly="true"/>
        <br>
        <label for="validationTooltip04">Cedula</label>
        <input type="text" class="form-control" id="mccedula" name="mccedula"/>
        <br>
        <label for="validationTooltip04">Usuario</label>
        <input type="text" class="form-control" id="mcusuario" name="mcusuario"/>
        <br>
        <label for="validationTooltip04">Medicamentos</label>
        <input type="text" class="form-control" id="mcmedic" name="mcmedic"/>
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
