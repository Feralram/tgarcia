<?php

include('../controllers/Alumno/middleware.php');

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Trasportes Garcia
   </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="g-sidenav-show  bg-gray-200">
  
    <aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0 " href="#">
        <span class="material-symbols-rounded navbar-brand-img h-100 text-white">upload_file</span>
        <span class="ms-1 font-weight-bold text-white">Transportes Garcia</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link text-white active bg-gradient-info" href="./perfil.php">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <span class="material-icons opacity-10">badge</span>
              </div>
              <span class="nav-link-text ms-1">Inicio</span>
            </a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="./documentos.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <span class="material-icons opacity-10">folder</span>
            </div>
            <span class="nav-link-text ms-1">Alta Cotización</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="./documentos.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <span class="material-icons opacity-10">folder</span>
            </div>
            <span class="nav-link-text ms-1">Cotización en proceso</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="./documentos.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <span class="material-icons opacity-10">folder</span>
            </div>
            <span class="nav-link-text ms-1">Lista de servicios</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="./documentos.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <span class="material-icons opacity-10">folder</span>
            </div>
            <span class="nav-link-text ms-1">Lista de facturas</span>
          </a>
        </li>
        <li class="nav-item mt-4">
          <a class="nav-link text-white " href="../controllers/Usuario/controllerUsuario.php?accion=0">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">logout</i>
              </div>
              <span class="nav-link-text ms-1">Cerrar sesión</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="container mt-5">
      <div class="border border-danger rounded p-4" style="max-width: 1200px; margin: auto;">
        <h3 class="text-center mb-4">Registro de Servicio</h3>
        <form>
          <div class="row">
            <div class="col-md-4 mb-3">
              <label for="fecha_recoleccion" class="form-label">Fecha de recolección</label>
              <input type="date" class="form-control form-control-sm" id="fecha_recoleccion" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="cliente" class="form-label">Cliente</label>
              <input type="text" class="form-control form-control-sm" id="cliente" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="unidad" class="form-label">Unidad</label>
              <select id="unidad" class="form-select form-select-sm">
                <option selected>Elige...</option>
                <option>Unidad 1</option>
                <option>Unidad 2</option>
                <option>Unidad 3</option>
                <!-- Agrega más opciones según sea necesario -->
              </select>
            </div>
            <div class="col-md-4 mb-3">
              <label for="placas" class="form-label">Placas</label>
              <input type="text" class="form-control form-control-sm" id="placas" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="econ" class="form-label">Econ</label>
              <input type="text" class="form-control form-control-sm" id="econ">
            </div>
            <div class="col-md-4 mb-3">
              <label for="unid_factura" class="form-label">Unid-factura</label>
              <input type="text" class="form-control form-control-sm" id="unid_factura">
            </div>
            <div class="col-md-4 mb-3">
              <label for="origen_destino" class="form-label">Origen y destino</label>
              <input type="text" class="form-control form-control-sm" id="origen_destino">
            </div>
            <div class="col-md-4 mb-3">
              <label for="local_foranea" class="form-label">Local o foránea</label>
              <select id="local_foranea" class="form-select form-select-sm">
                <option selected>Elige...</option>
                <option>Local</option>
                <option>Foránea</option>
              </select>
            </div>
            <div class="col-md-4 mb-3">
              <label for="sello" class="form-label">Sello</label>
              <input type="text" class="form-control form-control-sm" id="sello">
            </div>
            <div class="col-md-4 mb-3">
              <label for="operador" class="form-label">Operador</label>
              <select id="operador" class="form-select form-select-sm">
                <option selected>Elige...</option>
                <option>Operador 1</option>
                <option>Operador 2</option>
                <option>Operador 3</option>
                <!-- Agrega más opciones según sea necesario -->
              </select>
            </div>
            <div class="col-md-4 mb-3">
              <label for="cliente_solicita" class="form-label">Cliente que solicita</label>
              <input type="text" class="form-control form-control-sm" id="cliente_solicita">
            </div>
            <div class="col-md-4 mb-3">
              <label for="referencia" class="form-label">Referencia</label>
              <input type="text" class="form-control form-control-sm" id="referencia">
            </div>
            <div class="col-md-4 mb-3">
              <label for="bultos" class="form-label">Bultos</label>
              <input type="text" class="form-control form-control-sm" id="bultos">
            </div>
            <div class="col-md-4 mb-3">
              <label for="doc_fiscal" class="form-label">Doc. fiscal</label>
              <input type="text" class="form-control form-control-sm" id="doc_fiscal">
            </div>
            <div class="col-md-4 mb-3">
              <label for="precio" class="form-label">Precio</label>
              <input type="text" class="form-control form-control-sm" id="precio">
            </div>
            <div class="col-md-4 mb-3">
              <label for="factura" class="form-label">Factura</label>
              <input type="text" class="form-control form-control-sm" id="factura">
            </div>
            <div class="col-md-4 mb-3">
              <label for="observaciones" class="form-label">Observaciones</label>
              <textarea class="form-control form-control-sm" id="observaciones" rows="3"></textarea>
            </div>
            <div class="col-md-4 mb-3">
              <label for="costo" class="form-label">Costo</label>
              <input type="text" class="form-control form-control-sm" id="costo">
            </div>
          </div>
          <button type="submit" class="btn btn-danger btn-sm w-100">Generar cotización</button>
        </form>
      </div>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>