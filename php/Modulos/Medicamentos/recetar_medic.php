<?php include_once ("../../sesiones.php"); ?>
<link rel="STYLESHEET" href="./css/custom-style.css">

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1>Recetar Medicamentos</h1>
    </div>

    <script src="./js/funcionesRecetar.js"></script>


    <form id="recetarMedic" >
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Paciente</label>
                    <input type="text" class="form-control" id="rpaciente" name="rpaciente" />
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Documento de identidad</label>
                    <input type="text" class="form-control" id="rcedula" name="rcedula"/>
                </div>
            </div>

            <div class="form-group">
                <label for="inputAddress">Formula id</label>
                <input type="text" class="form-control" id="rid" name="rid" readonly="true"/>
            </div>

            <br>
            <table class="table table-bordered" id="medicamento">
            <h5 class="text-center">Medicamentos</h5>
            <thead class="thead-dark">
                <tr>
                <th scope="col"><h5 class="text-center">Medicamentos</h5></th>
                <th scope="col"><h5 class="text-center">Cantidad</h5></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> <select class="custom-select" id="rmedic1" name="rmedic1"> </select> </td>
                    <td> <input type="text" class="form-control" id="canm1" name="canm1"/> </td>
                </tr>
            </tbody>
    </table>
    <div class="btn btn-success" id="nuevomedic" name="nuevomedic">Añadir otro campo</div>
    <br><br>
            <button type="button" id="crear" class="btn btn-info" value="crear" name="crear">Crear formula</button>

            <input type="hidden" id="cantidad" value="" name="cantidad"/>
            <input type="hidden" id="nuevar" value="nuevar" name="accion"/>
    </form>


</div>