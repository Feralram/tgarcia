<?php
session_start();
include_once('../models/Usuario.php');

// Crear una instancia del objeto Usuario
$usuario = new Usuario();

// Obtener las fechas de inicio y fin del rango, si están definidas
$fechaInicio = isset($_GET['fechaInicio']) ? $_GET['fechaInicio'] : null;
$fechaFin = isset($_GET['fechaFin']) ? $_GET['fechaFin'] : null;

$facturas = $usuario->obtenerFacturasfiltros($fechaInicio, $fechaFin);
$facturasOtros = $usuario->obtenerFacturasOtrofiltros($fechaInicio, $fechaFin);
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
            <a class="nav-link text-white" href="perfil.php">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <span class="material-icons opacity-10">badge</span>
              </div>
              <span class="nav-link-text ms-1">Inicio</span>
            </a>
        </li>
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
          <a class="nav-link text-white" href="./listaOperadores.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <span class="material-icons opacity-10">folder</span>
            </div>
            <span class="nav-link-text ms-1">Lista Operadores</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-info" href="./listaFacturas.php">
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
    <form method="GET" action="listafacturas.php">
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="fechaInicio" class="form-label">Fecha de Inicio</label>
                <input type="date" id="fechaInicio" name="fechaInicio" class="form-control" value="<?php echo htmlspecialchars($fechaInicio); ?>">
            </div>
            <div class="col-md-4">
                <label for="fechaFin" class="form-label">Fecha de Fin</label>
                <input type="date" id="fechaFin" name="fechaFin" class="form-control" value="<?php echo htmlspecialchars($fechaFin); ?>">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary mt-4">Filtrar</button>
            </div>
        </div>
        <div class="col-md-2">
            <a href="../models/descargarCSVfacturas.php?fechaInicio=<?php echo urlencode($fechaInicio); ?>&fechaFin=<?php echo urlencode($fechaFin); ?>" class="btn btn-success">Descargar en CSV</a>
        </div>
    </form>
      <!-- End Navbar -->
       <!--Lista Operadores-->
        <div class="row">
            <div class="col">
                <div class="card">
                <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                      <h6 class="text-white text-capitalize ps-3 text-center h5">Facturas Generales</h6>
                </div>
                    <div class="card-header">
                    <div class="card-body">
                      <div class="table-responsive">
                          <table id="tablaGenerales" class="table table-bordered table-striped table-hover">
                          <thead class="thead-dark">
                                  <tr>
                                      <th scope="col">Factura</th>
                                      <th scope="col">Fecha</th>
                                      <th scope="col">Precio Base</th>
                                      <th scope="col">Iva</th>
                                      <th scope="col">Retención</th>
                                      <th scope="col">Precio final</th>
                                      <th scope="col">Razón social</th>
                                      <th scope="col">Ejecutivo</th>
                                      <th scope="col">Servicio</th>
                                      <th scope="col">Referencia</th>
                                      <th scope="col">Complemento</th>
                                      <th scope="col">Fecha de pago</th>
                                      <th scope="col">Observación</th>
                                      <th scope="col">Fecha de envio</th>                                      
                                      <th scope="col">Documento</th>
                                      <th scope="col">Ingresado al portal</th>
                                      <th scope="col">Eliminar</th>
                                  </tr>
                              </thead>
                              </thead>
                              <tbody>
                              <?php foreach ($facturas as $factura): ?>
        <tr>
            <td><?php echo $factura['id_especifico']; ?></td>
            <td><?php echo $factura['fecha']; ?></td>
            <td><?php echo $factura['precio_base']; ?></td>
            <td><?php echo $factura['iva']; ?></td>
            <td><?php echo $factura['retencion']; ?></td>
            <td><?php echo $factura['precio_final']; ?></td>
            <td><?php echo $factura['razon_social']; ?></td>
            <td><?php echo $factura['contacto_cliente']; ?></td>
            <td><?php echo $factura['servicio']; ?></td>
            <td><?php echo $factura['referencia']; ?></td>
            <td><?php echo $factura['complemento']; ?></td>
            <td><?php echo $factura['fecha_pago']; ?></td>
            <td><?php echo $factura['observacion']; ?></td>
            <td><?php echo $factura['fecha_envio']; ?></td>
            <td><?php echo $factura['documento']; ?></td>
            <td><?php echo $factura['portal_nippon']; ?></td>
            <td class="text-center">
                <form method="POST" onsubmit="return eliminarFactura(<?php echo $factura['id_factura']; ?>);">
                    <button type="button" class="btn btn-danger btn-icon btn-transparent" onclick="eliminarFactura(<?php echo $factura['id_factura']; ?>)">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </form>
            </td>
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
        <div class="row">
            <div class="col">
                <div class="card">
                <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                      <h6 class="text-white text-capitalize ps-3 text-center h5">Facturas Xcf</h6>
                </div>
                    <div class="card-header">
                    <div class="card-body">
                      <div class="table-responsive">
                          <table id="tablaXcf" class="table table-bordered table-striped table-hover">
                              <thead class="thead-dark">
                                  <tr>
                                      <th scope="col">Factura</th>
                                      <th scope="col">Fecha</th>
                                      <th scope="col">Precio Base</th>
                                      <th scope="col">Iva</th>
                                      <th scope="col">Retención</th>
                                      <th scope="col">Precio final</th>
                                      <th scope="col">Razón social</th>
                                      <th scope="col">Ejecutivo</th>
                                      <th scope="col">Servicio</th>
                                      <th scope="col">Referencia</th>
                                      <th scope="col">Complemento</th>
                                      <th scope="col">Fecha de pago</th>
                                      <th scope="col">Observación</th>
                                      <th scope="col">Fecha de envio</th>                                      
                                      <th scope="col">Documento</th>
                                      <th scope="col">Ingresado al portal</th>
                                  </tr>
                              </thead>
                              <tbody> 
                              <?php foreach ($facturasOtros as $factotros): ?>
        <tr>
            <td><?php echo $factotros['id_especifico']; ?></td>
            <td><?php echo $factotros['fecha']; ?></td>
            <td><?php echo $factotros['precio_base']; ?></td>
            <td><?php echo $factotros['iva']; ?></td>
            <td><?php echo $factotros['retencion']; ?></td>
            <td><?php echo $factotros['precio_final']; ?></td>
            <td><?php echo $factotros['razon_social']; ?></td>
            <td><?php echo $factotros['contacto_cliente']; ?></td>
            <td><?php echo $factotros['servicio']; ?></td>
            <td><?php echo $factotros['referencia']; ?></td>
            <td><?php echo $factotros['complemento']; ?></td>
            <td><?php echo $factotros['fecha_pago']; ?></td>
            <td><?php echo $factotros['observacion']; ?></td>
            <td><?php echo $factotros['fecha_envio']; ?></td>
            <td><?php echo $factotros['documento']; ?></td>
            <td><?php echo $factotros['portal_nippon']; ?></td>
            <td class="text-center">
                <form method="POST" onsubmit="return eliminarFactura(<?php echo $factotros['id_factura']; ?>);">
                    <button type="button" class="btn btn-danger btn-icon btn-transparent" onclick="eliminarFactura(<?php echo $factotros['id_factura']; ?>)">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </form>
            </td>
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
      $('#tablaXcf').DataTable({
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
  <script>
function eliminarFactura(id_factura) {
    var comentario = prompt('Motivo por el que quiere cancelar la factura:');
    if (comentario === null) {
        return false; // Cancela la eliminación si no se ingresa comentario
    }

    if (confirm('¿Estás seguro de que deseas eliminar esta factura?')) {
        fetch('../controllers/Usuario/controllerUsuario.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                accion: 'eliminarFactura',
                id_factura: id_factura,
                comentario: comentario
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Factura eliminada con éxito');
                location.reload(); // Recarga la página para actualizar la lista de facturas
            } else {
                alert('Error al eliminar la factura');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
    return false; // Evita la recarga de la página
}
</script>

</body>

</html>
