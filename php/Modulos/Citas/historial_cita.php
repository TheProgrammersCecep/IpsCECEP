<?php include_once ("../../sesiones.php"); ?>

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1>Mis Citas</h1>
    </div>

    <div class="details">
		<!-- div para cargar el formulario para una nueva comuna o editar una comuna -->
    </div>

    <div id="misCitas">
    <br><br>
        <div class="box-header">
            <div class="pull-right box-tools">
                <div class="container">
                <div class="row">
                    <div class="col text-center">
                    <a class="btn btn-info btn-sm" href="php/fpdf/historialPdf.php" target="_blank" role="button">Generar informe <i class="fa fa-file-pdf"></i></a>
                    </div>
                </div>
                </div>
               
            </div>
        </div>

        <div class="box-body">

            <table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Paciente</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Medico</th>
                        <th>Asesor</th>
                        <th>Servicio</th>
                        <th>Descripcion</th>
                        <th>Sede</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                
                </tbody>
            </table>

        </div><!-- /.box-body -->  
        <script src="./js/funcionesHistorial.js"></script>
    </div>

    <?php include_once ('detalles_cita.php'); ?>
    <?php include_once ('editar_cita.php'); ?>

</div>