
<form role="form"  id="feditarh">
  <div class="modal fade" id="editar" tabindex="-1" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Sede</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        <label for="validationTooltip04">Codigo</label>
        <input type="text" class="form-control" id="scodigo" name="scodigo" value = "" readonly="true"/>
        <br>
        <label for="validationTooltip04">Sede</label>
        <input type="text" class="form-control" id="ssede" name="ssede"/>
        <br>
        <label for="validationTooltip04">Direccion</label>
        <input type="text" class="form-control" id="sdir" name="sdir"/>
        <br>
        <label for="validationTooltip04">Ciudad</label>
        <select class="custom-select" id="sciudad" name="sciudad" required> </select>
        <br><br>
        <label for="validationTooltip04">Pais</label>
        <select class="custom-select" id="spais" name="spais" required> </select>
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
