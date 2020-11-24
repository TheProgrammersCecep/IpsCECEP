
<form role="form"  id="fnuevoe">
  <div class="modal fade" id="nuevoe" tabindex="-1" >
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
        <input type="text" class="form-control" id="ecodigon" name="ecodigon" value = "" readonly="true"/>
        <br>
        <label for="validationTooltip04">Empleado</label>
        <input type="text" class="form-control" id="eempleadon" name="eempleadon"/>
        <br>
        <label for="validationTooltip04">Cargo</label>
        <input type="text" class="form-control" id="ecargon" name="ecargon"/>
        <br>
        <label for="validationTooltip04">Oficina</label>
        <select class="custom-select" id="eseden" name="eseden" required> </select>
        <br><br>
        <label for="validationTooltip04">Ciudad</label>
        <select class="custom-select" id="eciudadn" name="eciudadn" required> </select>
        <br><br>
        <label for="validationTooltip04">Pais</label>
        <select class="custom-select" id="epaisn" name="epaisn" required> </select>
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

