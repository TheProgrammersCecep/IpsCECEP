<?php include_once ("./php/sesiones.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>IPS CECEP Gestion</title>

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <div class="jumbotron jumbotron-fluid">
        <div id="upbanner" class="container">
          <h1 class="display-4"><strong>IPS CECEP |</strong> Bienvenido</h1>
        </div>
  </div>

</head>

<body id="page-top">

  <div id="wrapper">

      <?php include_once ('navegacion.php'); ?>
      <?php include_once ('encabezado.php'); ?>
          

      <!-- Pagina de inicio -->
      <div class="pagina-inicio">
      </div>

      <div class="contenedor-paginas">
        <!-- CONTENIDO DE PAGINAS -->
      </div>

    <?php include_once ('fin_pagina.php'); ?>

  </div>
  
  <?php include_once ('php/cerrar_sesion.php'); ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.2/sweetalert2.all.js"></script>
<script src="./js/funcionesJquery.js"></script>

  <script>
    $(document).ready(Inicio);
  </script>

<?php include_once ('librerias.php'); ?>


</body>

</html>
