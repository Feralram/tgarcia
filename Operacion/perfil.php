<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">

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
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
      data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Inicio</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Operaciones</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Bienvenido</h6>
        </nav>
      </div>
    </nav>
    <div class="container-fluid px-2 px-md-4">
      <!-- End Navbar -->
       <!--Lista Operadores-->
       <div class="operadores-header">
        <h2 class="operadores-title">Operadores</h2>
        <div class="operadores-table-container">
            <table class="operadores-table">
                <thead>
                    <tr>
                        <th>Num Trab</th>
                        <th>Nombre Completo</th>
                        <th>Nacionalidad</th>
                        <th>Edad</th>
                        <th>Sexo</th>
                        <th>Estado Civil</th>
                        <th>Licencia</th>
                        <th>Vigencia</th>
                        <th>Tipo</th>
                        <th>Celular</th>
                        <th>CURP</th>
                        <th>RFC</th>
                        <th>Domicilio</th>
                        <th>Domicilio de Constancia</th>
                        <th>Delegación</th>
                        <th>CP</th>
                        <th>Tipo de Trabajador</th>
                        <th>Puesto</th>
                        <th>Lugar de Trabajo</th>
                        <th>Duración de la Jornada</th>
                        <th>Forma de Pago</th>
                        <th>Días de Pago</th>
                        <th>Días de Descanso</th>
                        <th>Beneficiarios</th>
                        <th>NSS</th>
                        <th>Fecha de Nacimiento</th>
                    </tr>
                </thead>
                <tbody id="operadores-body">
                    <!-- Aquí se llenarán las filas con los datos de la base de datos -->
                    <!-- Ejemplo de fila estática -->
                    <tr>
                        <td>001</td>
                        <td>Juan Pérez</td>
                        <td>Mexicana</td>
                        <td>35</td>
                        <td>Masculino</td>
                        <td>Casado</td>
                        <td>A1234567</td>
                        <td>2025-01-01</td>
                        <td>Automovilista</td>
                        <td>5551234567</td>
                        <td>PEPJ850101HDFNRR07</td>
                        <td>PEPJ850101RT5</td>
                        <td>Calle Falsa 123</td>
                        <td>Calle Real 456</td>
                        <td>Benito Juárez</td>
                        <td>03100</td>
                        <td>Fijo</td>
                        <td>Conductor</td>
                        <td>Ciudad de México</td>
                        <td>8 horas</td>
                        <td>Mensual</td>
                        <td>Último día del mes</td>
                        <td>Sábado y Domingo</td>
                        <td>María Pérez</td>
                        <td>12345678901</td>
                        <td>1985-01-01</td>
                    </tr>
                    <!-- Agrega más filas aquí según los datos -->
                </tbody>
            </table>
        </div>
    </div>

      <div class="card card-body mx-3 mx-md-4 mt-n6">

        
      </div>
    </div>
    </div>
    <div id="notifications" class="alert container text-white fade show" role="alert"><strong></strong></div>
    <footer class="footer py-4  ">
      <div class="container-fluid">
      </div>
    </footer>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../validations/validators.js"></script>
  <script src="../admin/ajax/notifications.js"></script>

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
