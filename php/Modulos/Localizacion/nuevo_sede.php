
<form role="form"  id="fnuevos">
  <div class="modal fade" id="nuevos" tabindex="-1" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Nueva Sede</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        <label for="validationTooltip04">Codigo</label>
        <input type="text" class="form-control" id="scodigoe" name="scodigoe" value = "" readonly="true"/>
        <br>
        <label for="validationTooltip04">Sede</label>
        <input type="text" class="form-control" id="ssedee" name="ssedee"/>
        <br>
        <label for="validationTooltip04">Direccion</label>
        <input type="text" class="form-control" id="sdire" name="sdire"/>
        <br>
        <label for="validationTooltip04">Ciudad</label>
        <select class="custom-select" id="sciudade" name="sciudade" required> </select>
        <br><br>
        <label for="validationTooltip04">Pais</label>
        <select class="custom-select" id="spaise" name="spaise" required> </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" id="grabar" class="btn btn-primary" data-dismiss="modal">Crear</button>
        </div>
      </div>
    </div>
  </div>

  <input type="hidden" id="nuevo" value="nuevo" name="accion"/>
</form>
