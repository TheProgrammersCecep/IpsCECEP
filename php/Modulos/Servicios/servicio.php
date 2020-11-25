<?php include_once ("../../sesiones.php"); ?>
<link rel="STYLESHEET" href="./css/custom-style.css">

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1>Gestion de Servicios</h1>
    </div>

    <div class="details">
		<!-- div para cargar el formulario para una nueva comuna o editar una comuna -->
    </div>

    <div id="pais">
    <br><br>
        <div class="box-header">
            <div class="pull-right box-tools">
                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#nuevop" id="nuevo"  data-toggle="tooltip" title="Nuevo Pais">Agregar Nuevo Servicio  <i class="fa fa-plus" aria-hidden="true"></i></button> 
            </div>
        </div>

        <div class="box-body">

            <table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Servicio</th>
                        <th>Descripcion</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                
                </tbody>
            </table>

        </div><!-- /.box-body -->  
        <script src="./js/funcionesServicio.js"></script>
    </div>

    <?php include_once ('editar_servicio.php'); ?>
    <?php include_once ('nuevo_servicio.php'); ?>

</div>