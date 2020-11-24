
<form role="form"  id="feditarh">
  <div class="modal fade" id="editar" tabindex="-1" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Medicamento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <label for="validationTooltip04">Codigo</label>
        <input type="text" class="form-control" id="mdcodigo" name="mdcodigo" value = "" readonly="true"/>
        <br>
        <label for="validationTooltip04">Medicamento</label>
        <input type="text" class="form-control" id="mdmedicamento" name="mdmedicamento"/>
        <br>
        <label for="validationTooltip04">Descripcion</label>
        <input type="text" class="form-control" id="mddesc" name="mddesc"/>
        <br>
        <label for="validationTooltip04">Cantidad en stock</label>
        <input type="text" class="form-control" id="mdcan" name="mdcan"/>
        <br>
        <label for="validationTooltip04">Fecha de vencimiento</label>
        <input class="form-control" id="mdfechav" type="date" name="mdfechav" min = "<?php echo date("Y-m-d");?>" 
                              value="<?php echo date("Y-m-d");?>" required=”required”>
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
