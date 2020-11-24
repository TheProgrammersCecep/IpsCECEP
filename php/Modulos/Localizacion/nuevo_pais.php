
<form role="form"  id="fnuevop">
  <div class="modal fade" id="nuevop" tabindex="-1" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Nuevo Pais</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        <label for="validationTooltip04">Codigo</label>
        <input type="text" class="form-control" id="pcodigoe" name="pcodigoe" value = "" readonly="true"/>
        <br>
        <label for="validationTooltip04">Pais</label>
        <input type="text" class="form-control" id="ppaise" name="ppaise"/>
        <br>
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
