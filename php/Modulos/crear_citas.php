<link rel="STYLESHEET" href="./css/custom-style.css">

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1>Creacion de cita</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header" id="tarjetas">
                        <bold>Seleccione fecha</bold>
                    </div>

                    <div class="card-body" id="body-tarjetas">
                        <h5 class="card-title"></h5>
                        <input id="opcion" type="date" name="fecha" min = "<?php echo date("Y-m-d");?>" 
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
                        <input id="opcion" type="time" name="hora"> </input>
                        <br><br>
                    </div>
                </div>
            </div> 
            </div>
        <br><br>
    </div>
</div>

