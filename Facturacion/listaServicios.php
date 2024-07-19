  <?php
session_start();
include_once('../models/Usuario.php');

// Crear una instancia del objeto Usuario
$usuario = new Usuario();

$servicios = $usuario->obtenerServicios();
$serviciosNippon = $usuario->obtenerServiciosNippon();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
<!-- Incluye jQuery y DataTables CSS y JS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">


<!-- Incluye el archivo de idioma español de DataTables -->
<script src="https://cdn.datatables.net/plug-ins/1.11.5/i18n/Spanish.json"></script>

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
            <a class="nav-link text-white" href="./perfil.php">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <span class="material-icons opacity-10">badge</span>
              </div>
              <span class="nav-link-text ms-1">Inicio</span>
            </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="./cotizacionProceso.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <span class="material-icons opacity-10">folder</span>
            </div>
            <span class="nav-link-text ms-1">Cotización en proceso</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-info" href="./listaServicios.php">
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
          <a class="nav-link text-white " href="../controllers/Usuario/controllerUsuario.php?accion=cerrarSesion">
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
    </nav>
    <div class="container-fluid px-2 px-md-4">
      <!-- End Navbar -->
       <!--Lista Operadores-->
        <div class="row">
            <div class="col">
                <div class="card">
                <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                      <h6 class="text-white text-capitalize ps-3 text-center h5">Servicios Generales</h6>
                </div>
                    <div class="card-header">
                    <div class="card-body">
                      <div class="table-responsive">
                          <table id="tablaGenerales" class="table table-bordered table-striped table-hover">
                              <thead class="thead-dark">
                                  <tr>
                                      <th scope="col">Fecha recoleccion</th>
                                      <th scope="col">Cliente</th>
                                      <th scope="col">Unidad</th>
                                      <th scope="col">Placas</th>
                                      <th scope="col">Econ</th>
                                      <th scope="col">Unid-Factura</th>
                                      <th scope="col">Origen y Destino</th>
                                      <th scope="col">Local o Foranea</th>
                                      <th scope="col">Sello</th>
                                      <th scope="col">Operador</th>
                                      <th scope="col">Cliente que solicita</th>
                                      <th scope="col">Referencia</th>
                                      <th scope="col">Bultos</th>
                                      <th scope="col">Doc-Fiscal</th>                                      
                                      <th scope="col">Factura</th>
                                      <th scope="col">Costo</th>
                                      <th scope="col">Observaciones</th>
                                      <th scope="col">Ver ficha</th>
                                  </tr>
                              </thead>
                              <tbody>
                              <?php foreach ($servicios as $servicio): ?>
        <tr>
          <td><?php echo $servicio['fecha_recoleccion']; ?></td>
            <td><?php echo $servicio['cliente']; ?></td>
            <td><?php echo $servicio['unidad']; ?></td>
            <td><?php echo $servicio['Placas']; ?></td>
            <td><?php echo $servicio['eco']; ?></td>
            <td><?php echo $servicio['unid_factura']; ?></td>
            <td><?php echo $servicio['oriDestino']; ?></td>
            <td><?php echo $servicio['local_foranea']; ?></td>
            <td><?php echo $servicio['sello']; ?></td>
            <td><?php echo $servicio['Nombre_completo']; ?></td>
            <td><?php echo $servicio['cliente_solicita']; ?></td>
            <td><?php echo $servicio['referencia']; ?></td>
            <td><?php echo $servicio['bultos']; ?></td>
            <td><?php echo $servicio['doc_fiscal']; ?></td>
            <td><?php echo $servicio['factura']; ?></td>
            <td><?php echo $servicio['costo']; ?></td>
            <td><?php echo $servicio['observaciones']; ?></td>
            <td class="text-center">
            <a href="Infservicio.php?servicioId=<?php echo $servicio['id_servicio']; ?>">
              <button type="button" class="btn btn-success btn-icon btn-transparent">
                <i class="fas fa-eye fa-lg"></i> <!-- Ajusté fa-lg para hacer el ícono más grande -->
              </button>
            
            </td>
        </tr>
        <?php endforeach; ?>
                                  
                                  <!-- Más filas de datos aquí -->
                              </tbody>
                          </table>
                      </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                      <h6 class="text-white text-capitalize ps-3 text-center h5">Servicios Proexi</h6>
                </div>
                    <div class="card-header">
                    <div class="card-body">
                      <div class="table-responsive">
                          <table id="tablaNippon" class="table table-bordered table-striped table-hover">
                              <thead class="thead-dark">
                                  <tr>
                                      <th scope="col">Fecha recoleccion</th>
                                      <th scope="col">cliente</th>
                                      <th scope="col">Unidad</th>
                                      <th scope="col">Placas</th>
                                      <th scope="col">Econ</th>
                                      <th scope="col">Unid-Factura</th>
                                      <th scope="col">Origen y Destino</th>
                                      <th scope="col">Local o Foranea</th>
                                      <th scope="col">Sello</th>
                                      <th scope="col">Operador</th>
                                      <th scope="col">Cliente que solicita</th>
                                      <th scope="col">Referencia</th>
                                      <th scope="col">Bultos</th>
                                      <th scope="col">Doc-Fiscal</th>
                                      <th scope="col">Factura</th>
                                      <th scope="col">Costo</th>
                                      <th scope="col">Observaciones</th>
                                      <th scope="col">Ver ficha</th>
                                  </tr>
                              </thead>
                              <tbody>
                              <?php foreach ($serviciosNippon as $servNippon): ?>
        <tr>
          <td><?php echo $servNippon['fecha_recoleccion']; ?></td>
            <td><?php echo $servNippon['cliente']; ?></td>
            <td><?php echo $servNippon['unidad']; ?></td>
            <td><?php echo $servNippon['placas']; ?></td>
            <td><?php echo $servNippon['eco']; ?></td>
            <td><?php echo $servNippon['unid_factura']; ?></td>
            <td><?php echo $servNippon['oriDestino']; ?></td>
            <td><?php echo $servNippon['local_foranea']; ?></td>
            <td><?php echo $servNippon['sello']; ?></td>
            <td><?php echo $servNippon['Nombre_completo']; ?></td>
            <td><?php echo $servNippon['cliente_solicita']; ?></td>
            <td><?php echo $servNippon['referencia']; ?></td>
            <td><?php echo $servNippon['bultos']; ?></td>
            <td><?php echo $servNippon['doc_fiscal']; ?></td>
            <td><?php echo $servNippon['factura']; ?></td>
            <td><?php echo $servNippon['costo']; ?></td>
            <td><?php echo $servNippon['observaciones']; ?></td>
            <td class="text-center">
            <a href="Infservicio.php?servicioId=<?php echo $servNippon['id_servicio']; ?>">
              <button type="button" class="btn btn-success btn-icon btn-transparent">
                <i class="fas fa-eye fa-lg"></i> <!-- Ajusté fa-lg para hacer el ícono más grande -->
              </button>
            
            </td>
        </tr>
        <?php endforeach; ?>
                                  
                                  
                                  <!-- Más filas de datos aquí -->
                              </tbody>
                          </table>
                      </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
 </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../validations/validators.js"></script>
  <script src="../admin/ajax/notifications.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<script>
  $(document).ready(function() {
      $('#tablaGenerales').DataTable({
          "language": {
              "sProcessing":     "Procesando...",
              "sLengthMenu":     "Mostrar _MENU_ registros",
              "sZeroRecords":    "No se encontraron resultados",
              "sEmptyTable":     "Ningún dato disponible en esta tabla",
              "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
              "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
              "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
              "sInfoPostFix":    "",
              "sSearch":         "Buscar:",
              "sUrl":            "",
              "sInfoThousands":  ",",
              "sLoadingRecords": "Cargando...",
              "oPaginate": {
                  "sFirst":    "Primero",
                  "sLast":     "Último",
                  "sNext":     "Siguiente",
                  "sPrevious": "Anterior"
              },
              "oAria": {
                  "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                  "sSortDescending": ": Activar para ordenar la columna de manera descendente"
              }
          }
      });
  });
</script>
<script>
  $(document).ready(function() {
      $('#tablaNippon').DataTable({
          "language": {
              "sProcessing":     "Procesando...",
              "sLengthMenu":     "Mostrar _MENU_ registros",
              "sZeroRecords":    "No se encontraron resultados",
              "sEmptyTable":     "Ningún dato disponible en esta tabla",
              "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
              "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
              "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
              "sInfoPostFix":    "",
              "sSearch":         "Buscar:",
              "sUrl":            "",
              "sInfoThousands":  ",",
              "sLoadingRecords": "Cargando...",
              "oPaginate": {
                  "sFirst":    "Primero",
                  "sLast":     "Último",
                  "sNext":     "Siguiente",
                  "sPrevious": "Anterior"
              },
              "oAria": {
                  "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                  "sSortDescending": ": Activar para ordenar la columna de manera descendente"
              }
          }
      });
  });
</script>
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
