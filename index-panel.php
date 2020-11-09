<?php include_once ("./php/sesiones.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>IPS CECEP</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <div class="jumbotron jumbotron-fluid">
        <div id="upbanner" class="container">
          <h1 class="display-4"><strong>IPS CECEP |</strong> Bienvenido</h1>
        </div>
  </div>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <ul class="navbar-nav bg-gradient-navbar sidebar sidebar-dark accordion" id="accordionSidebar">
      <?php include_once ('navegacion.php'); ?>
    </ul>
  
    <!-- Barra superior -->
    <div id="content-wrapper" class="d-flex flex-column">
          
        <?php include_once ('encabezado.php'); ?>
          
        </nav>

        <!-- Pagina de inicio -->
        <div class="pagina-inicio">
        </div>

          <div class="contenedor-paginas">
            <!-- CONTENIDO PAGINAS -->
          </div>

        <!-- Pie de pagina -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; IPS CECEP 2020</span>
            </div>
          </div>
        </footer>
        <!-- Final - Pie de pagina -->
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Buton de moverse arriba-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Clase de cerrar sesion-->
  <?php include_once ('php/cerrar_sesion.php'); ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="./js/funcionesJquery.js"></script>

  <script>
    $(document).ready(Inicio);
  </script>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <!--<script src="vendor/chart.js/Chart.min.js"></script>-->

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
