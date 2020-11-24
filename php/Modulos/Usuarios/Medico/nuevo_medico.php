
<form role="form"  id="fnuevom">
  <div class="modal fade" id="nuevom" tabindex="-1" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Nuevo Medico</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        <label for="validationTooltip04">Codigo</label>
        <input type="text" class="form-control" id="mcodigon" name="mcodigon" value = "" readonly="true"/>
        <br>
        <label for="validationTooltip04">Medico</label>
        <input type="text" class="form-control" id="mmedicon" name="mmedicon"/>
        <br>
        <label for="validationTooltip04">Sede</label>
        <select class="custom-select" id="mseden" name="mseden" required> </select>
        <br><br>
        <label for="validationTooltip04">Ciudad</label>
        <select class="custom-select" id="mciudadn" name="mciudadn" required> </select>
        <br><br>
        <label for="validationTooltip04">Pais</label>
        <select class="custom-select" id="mpaisn" name="mpaisn" required> </select>
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

