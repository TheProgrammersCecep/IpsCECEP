
<form role="form"  id="fnuevomd">
  <div class="modal fade" id="nuevomd" tabindex="-1" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Nuevo Medicamento en Stock</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        <label for="validationTooltip04">Codigo</label>
        <input type="text" class="form-control" id="mdcodigon" name="mcodigon" value = "" readonly="true"/>
        <br>
        <label for="validationTooltip04">Medicamento</label>
        <input type="text" class="form-control" id="mdmedicamenton" name="mdmedicamenton"/>
        <br>
        <label for="validationTooltip04">Descripcion</label>
        <input type="text" class="form-control" id="mddescn" name="mddescn"/>
        <br>
        <label for="validationTooltip04">Cantidad en stock</label>
        <input type="text" class="form-control" id="mdcann" name="mdcann"/>
        <br>
        <label for="validationTooltip04">Fecha de vencimiento</label>
        <input class="form-control" id="mdfechavn" type="date" name="mdfechavn" min = "<?php echo date("Y-m-d");?>" 
                              value="<?php echo date("Y-m-d");?>" required=”required”>
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

