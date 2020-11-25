<?php include_once ("../../sesiones.php"); ?>
<link rel="STYLESHEET" href="./css/custom-style.css">

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1>Actualizacion de perfil</h1>
    </div>

    <script src="./js/funcionesPerfil.js"></script>

    <form id="actPerfil" >

        <fieldset class="container">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Nombre completo</label>
                    <input type="text" class="form-control" id="pnombre" name="pnombre" value="<?php echo $_SESSION["nombre"];?>" />
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Documento de identidad</label>
                    <input type="text" class="form-control" id="pcedula" name="pcedula" value="<?php echo $_SESSION["cedula"];?>"/>
                </div>
            </div>

            <div class="form-group">
                <label for="inputAddress">Celular</label>
                <input type="text" class="form-control" id="pcelular" name="pcelular" value="<?php echo $_SESSION["celular"];?>">
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Usuario</label>
                    <input type="text" class="form-control" id="pusuario" name="pusuario" value="<?php echo $_SESSION["usuario"];?>" readonly="true">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Correo</label>
                    <input type="text" class="form-control" id="pcorreo" name="pcorreo" value="<?php echo $_SESSION["correo"];?>">
                </div>
            </div>

            <br><br>
            <h5>Desera cambiar la contraseña ?</h5>
            <br>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Nueva contraseña:</label>
                    <input type="password" class="form-control" id="pnueva" name="pnueva" value="">
                </div>
            </div>
            <br>
            <button type="button" id="crear" class="btn btn-info" value="crear" name="crear">Actualizar Perfil</button>

            <input type="hidden" id="editar" value="editar" name="accion"/>
        </fieldset>
    </form>


</div>

