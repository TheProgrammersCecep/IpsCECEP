<?php include_once ("php/sesiones.php"); ?>

<ul class="navbar-nav bg-gradient-navbar sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Titulo bara de navegacion -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index-panel.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">IPS GESTIONADOR</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Inicio -->
      <li class="nav-item">
        <a class="nav-link" id="home" href="index-panel.php">
          <i class="fa fa-home"></i>
          <span>Inicio</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Encabezado -->
      <div class="sidebar-heading">
        MODULOS
      </div>

      <!-- Items de navegacion -->
      <?php include_once ("php/Acceso/nav-admin.php"); ?>
      <?php include_once ("php/Acceso/nav-afiliado.php"); ?>
      <?php include_once ("php/Acceso/nav-asesor.php"); ?>
      <?php include_once ("php/Acceso/nav-director.php"); ?>
      <?php include_once ("php/Acceso/nav-medico.php"); ?>
      <?php include_once ("php/Acceso/nav-usuario.php"); ?>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePerfil" aria-expanded="true" aria-controls="collapsePerfil">
          <i class="fa fa-cogs"></i>
          <span>Perfil</span>
        </a>
        <div id="collapsePerfil" class="collapse" aria-labelledby="headingPerfil" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="php/Modulos/Perfil/perfil.php">Actualizar</a>
          </div>
        </div>
      </li>

        <!-- Divisor -->
      <hr class="sidebar-divider">

      <!-- BOTON OCULTAR -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
<!-- Ionicons -->
<link rel="stylesheet" href="./Recursos/css/ionicons.min.css">

</ul>
