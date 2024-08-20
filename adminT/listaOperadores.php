<?php
session_start();
include_once('../models/Usuario.php');

// Crear una instancia del objeto Usuario
$usuario = new Usuario();

// Obtener las unidades desde el modelo
$unidades = $usuario->obtenerUnidades();
$operadores = $usuario->obtenerOperadores();
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
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
            <a class="nav-link text-white " href="perfil.php">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <span class="material-icons opacity-10">badge</span>
              </div>
              <span class="nav-link-text ms-1">Inicio</span>
            </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="form-altaCot.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <span class="material-icons opacity-10">folder</span>
            </div>
            <span class="nav-link-text ms-1">Alta Cotización</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="cotizacionProceso.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <span class="material-icons opacity-10">folder</span>
            </div>
            <span class="nav-link-text ms-1">Cotización en proceso</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="./listaCanceladas.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <span class="material-icons opacity-10">folder</span>
            </div>
            <span class="nav-link-text ms-1">Facturas canceladas</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="./form-adicionales.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <span class="material-icons opacity-10">folder</span>
            </div>
            <span class="nav-link-text ms-1">Cotización Adicional</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="./lista-adicionales.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <span class="material-icons opacity-10">folder</span>
            </div>
            <span class="nav-link-text ms-1">Lista Adicionales</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="./listaUnidades.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <span class="material-icons opacity-10">folder</span>
            </div>
            <span class="nav-link-text ms-1">Lista Unidades</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-info" href="./listaOperadores.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <span class="material-icons opacity-10">folder</span>
            </div>
            <span class="nav-link-text ms-1">Lista Operadores</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="./listaFacturas.php">
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
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Inicio</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Administracion</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Bienvenido</h6>
        </nav>
      </div>
    </nav>
    <div class="container-fluid px-2 px-md-4">
      <!-- End Navbar -->
    <div class="container mt-5">
      <div class="row">
          <div class="col">
              <div class="card">
              <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                      <h6 class="text-white text-capitalize ps-3 text-center h5">Lista Operadores</h6>
                </div>
                  <div class="card-body">
                      <div class="table-responsive">
                      <table id="tablaOperadores" class="table table-bordered table-striped table-hover">

                                <thead class="thead-dark">
                                    <tr>
                                      <th scope="col">Num Trab</th>
                                      <th scope="col">Nombre Completo</th>
                                      <th scope="col">Nacionalidad</th>
                                      <th scope="col">Edad</th>
                                      <th scope="col">Sexo</th>
                                      <th scope="col">Estado Civil</th>
                                      <th scope="col">Licencia</th>
                                      <th scope="col">Vigencia</th>
                                      <th scope="col">Tipo</th>
                                      <th scope="col">Celular</th>
                                      <th scope="col">CURP</th>
                                      <th scope="col">RFC</th>
                                      <th scope="col">Domicilio</th>
                                      <th scope="col">Domicilio de Constancia</th>
                                      <th scope="col">Delegación</th>
                                      <th scope="col">CP</th>
                                      <th scope="col">Tipo de Trabajador</th>
                                      <th scope="col">Fecha de ingreso</th>
                                      <th scope="col">Puesto</th>
                                      <th scope="col">Descripción</th>
                                      <th scope="col">Lugar de Trabajo</th>
                                      <th scope="col">Duración de la Jornada</th>
                                      <th scope="col">Forma de Pago</th>
                                      <th scope="col">Días de Pago</th>
                                      <th scope="col">Días de Descanso</th>
                                      <th scope="col">Beneficiarios</th>
                                      <th scope="col">NSS</th>
                                      <th scope="col">Fecha de Nacimiento</th>
                                      <th scope="col">Activo o inactivo</th>
                                  </tr>
                              </thead>
                              <tbody>
                              <?php foreach ($operadores as $operador): ?>
        <tr>
            <td><?php echo $operador['Id']; ?></td>
            <td><?php echo $operador['Nombre_completo']; ?></td>
            <td><?php echo $operador['Nacionalidad']; ?></td>
            <td><?php echo $operador['Edad']; ?></td>
            <td><?php echo $operador['Sexo']; ?></td>
            <td><?php echo $operador['EstadoCivil']; ?></td>
            <td><?php echo $operador['Licencia']; ?></td>
            <td><?php echo $operador['Vigencia']; ?></td>
            <td><?php echo $operador['Tipo']; ?></td>
            <td><?php echo $operador['Celular']; ?></td>
            <td><?php echo $operador['Curp']; ?></td>
            <td><?php echo $operador['Rfc']; ?></td>
            <td><?php echo $operador['Domicilio_actual']; ?></td>
            <td><?php echo $operador['Domicilio_constancia']; ?></td>
            <td><?php echo $operador['Delegacion']; ?></td>
            <td><?php echo $operador['CP']; ?></td>
            <td><?php echo $operador['TipoTrabajador']; ?></td>
            <td><?php echo $operador['Fecha_ingreso']; ?></td>
            <td><?php echo $operador['Puesto']; ?></td>
            <td><?php echo $operador['Descripcion']; ?></td>
            <td><?php echo $operador['LugardeTrabajo']; ?></td>
            <td><?php echo $operador['DuraciondelaJornada']; ?></td>
            <td><?php echo $operador['Forma_pago']; ?></td>
            <td><?php echo $operador['DiasPago']; ?></td>
            <td><?php echo $operador['DiasDescanso']; ?></td>
            <td><?php echo $operador['Beneficiarios']; ?></td>
            <td><?php echo $operador['NSS']; ?></td>
            <td><?php echo $operador['FechaNacimiento']; ?></td>
            <td><?php echo $operador['Eactivo']; ?></td>
        </tr>
        <?php endforeach; ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>


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
  
<script>
  $(document).ready(function() {
      $('#tablaUnidades').DataTable({
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
    $('#tablaOperadores').DataTable({
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





</body>

</html>
