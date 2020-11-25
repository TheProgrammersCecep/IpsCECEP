<?php include_once ("../../sesiones.php"); ?>
<link rel="STYLESHEET" href="./css/custom-style.css">

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1>Creacion de cita</h1>
    </div>

    <script src="./js/funcionesCita.js"></script>

    <!--BARRA DE PROGRESO DE CREACION DE CITA
    <div class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
  </div>-->
    <form id="form-creacion" >
        <!--CREACION DE CITAS POR PASOS-->

        <!--PASO 1 - FECHAS-->
        <fieldset>
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header" id="tarjetas">
                            <bold>Seleccione fecha</bold>
                        </div>

                        <div class="card-body" id="body-tarjetas">
                            <h5 class="card-title"></h5>
                            <input id="hfecha" type="date" name="hfecha" min = "<?php echo date("Y-m-d");?>" 
                            value="<?php echo date("Y-m-d");?>" required=”required”>
                            <br><br>
                        </div>
                    </div>
                </div>
        

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header" id="tarjetas">
                            <bold>Seleccione la hora</bold>
                        </div>

                        <div class="card-body" id="body-tarjetas">
                            <h5 class="card-title"></h5>
                            <input id="hhora" type="time" name="hhora"> </input>
                            <br><br>
                        </div>
                    </div>
                </div>        
                </div>
            <br><br>
        </div>
        <input type="button" name="next" class="next btn btn-info" value="Siguiente" />
        </fieldset>


        <!--PASO 2 - Localizacion-->
        
        <fieldset class="container">
            <div class="form-group">
                <label for="validationTooltip04">Pais</label>
                <select class="custom-select" id="hpais" name="hpais" required>

                </select>
            </div>

            <div class="form-group">
                <label for="validationTooltip04">Ciudad</label>
                <select class="custom-select" id="hciudad" name="hciudad" required>
                    
                </select>
            </div>

            <div class="form-group">
                <label for="validationTooltip04">Sede</label>
                <select class="custom-select" id="hsede" name="hsede" required>
                    
                </select>
            </div>
            <input type="button" name="previous" class="previous btn btn-default" value="Anterior" />
            <input type="button" name="next" class="next btn btn-info" value="Siguiente" />
        </fieldset>
        

        <!--PASO 3 - DATOS-->
        <fieldset class="container">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Nombre completo</label>
                    <input type="hidden" class="form-control" id="hnombreCod" name="hnombreCod" value="<?php echo $_SESSION["codigo"];?>" />
                    <input type="text" class="form-control" id="hnombre" name="hnombre" value="<?php echo $_SESSION["nombre"];?>" />
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Documento de identidad</label>
                    <input type="text" class="form-control" id="hcedula" name="hcedula" value="<?php echo $_SESSION["cedula"];?>"/>
                </div>
            </div>

            <div class="form-group">
                <label for="inputAddress">Correo</label>
                <label class="form-control" id="hcorreo"><?php echo $_SESSION["correo"];?></label>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Celular</label>
                    <input type="text" class="form-control" id="cel" placeholder="">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Telefono Fijo</label>
                    <input type="text" class="form-control" id="tel" placeholder="">
                </div>
            </div>

            <input type="button" name="previous" class="previous btn btn-default" value="Anterior" />
            <input type="button" name="next" class="next btn btn-info" value="Siguiente" />

            <input type="hidden" id="crear" value="crear" name="accion"/>
        </fieldset>

        <!--PASO 4 - SELECCION-->
        <fieldset class="container">
            <div class="form-group">
                <label for="validationTooltip04">Medico</label>
                <select class="custom-select" id="hmedico" name="hmedico" required>

                </select>
            </div>

            <div class="form-group">
                <label for="validationTooltip04">Servicio</label>
                <select class="custom-select" id="hservicio" name="hservicio" required>
                    
                </select>
                
            </div>

            <div class="form-group">
            <label for="validationTooltip04">Descripcion cita</label><br>
                <textarea id="hdesc" name = "hdesc"
                            rows = 2
                            cols = 60></textarea>
            </div>

            <div class="form-group">
                <label for="validationTooltip04">Asesor</label>
                <select class="custom-select" id="hasesor" name="hasesor" required>
                    
                </select>
            </div>
            <br>

            <input type="button" name="previous" class="previous btn btn-default" value="Anterior" />
            <button type="button" id="crear" class="btn btn-info" value="crear" name="crear">Crear</button>
        </fieldset>
    </form>

    <style type="text/css">
        #form-creacion fieldset:not(:first-of-type) {
            display: none;
        }
    </style>

</div>

