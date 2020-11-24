<?php include_once ("../../sesiones.php"); ?>
<link rel="STYLESHEET" href="./css/custom-style.css">

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1>Entrega de Medicamentos</h1>
    </div>

    <form id="formula" >
            <div class="form-group">    
                <label for="inputPassword4">Documento de identidad usuario:</label>
                <input type="text" class="form-control" id="encedula" name="encedula"/>
            </div>

            

            <button type="button" id="buscarx" class="btn btn-info" value="buscarx" name="buscarx">Buscar</button>

    </form>

    <br><br>

    <div class="details">
		<!-- div para cargar el formulario para una nueva comuna o editar una comuna -->
    </div>

    <div id="misCitas">
        <div class="box-body">

            <table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                <thead class="thead-dark">
                    <tr>
                        <th>Formula id</th>
                        <th>Cedula</th>
                        <th>Usuario</th>
                        <th>Medicamentos</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                
                </tbody>
            </table>

        </div><!-- /.box-body --> 
        <script src="./js/funcionesMedic_en.js"></script> 
    </div>

    <?php include_once ('editar_medic_en.php'); ?>


</div>