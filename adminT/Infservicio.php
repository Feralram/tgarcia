<?php
include_once ('../models/Usuario.php');
session_start();

$usuario = new Usuario();

$id = $_GET['servicioId'] ?? null;

if ($id) {
  $stmt = $usuario->conexion->prepare(
  "SELECT servicios.id_especifico, servicios.cliente, servicios.operador, servicios.num_candados,
  servicios.oriDestino, cotizaciones.dimension, operadores.rfc, operadores.celular
  , unidades.placas, unidades.modelo, unidades.unidad, unidades.eco
  FROM servicios  
  INNER JOIN operadores ON servicios.id_operador = operadores.id
  INNER JOIN unidades ON servicios.unidad = unidades.Uni_id
  INNER JOIN cotizaciones ON servicios.id_cotizacion = cotizaciones.id_cotizacion
  WHERE id_servicio = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $resultado = $stmt->get_result();

  if ($resultado && $resultado->num_rows > 0) {
    $servicio = $resultado->fetch_assoc();
  } else {
    echo "Servicio no encontrada.";
    exit;
  }
} else {
  echo "ID de servicio no proporcionado.";
  exit;
}


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
          <a class="nav-link text-white" href="listaServicios.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <span class="material-icons opacity-10">folder</span>
            </div>
            <span class="nav-link-text ms-1">Lista de servicios</span>
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
        <div class="col" id="datos">
          <div class="card">
            <div class="card-header">
              <div class="container mt-4">
                <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3 text-center h5">Informacion del servicio
                    <?php echo htmlspecialchars($servicio['id_especifico']); ?></h6>
                </div>
                <div id="contenedor" class="border p-4 card-body">
                <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th colspan="2" class="text-center bg-warning text-white font-weight-bold">TRANSPORTES ADUANALES GARCIA, S.A. DE C.V.</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Cliente:</td>
                          <td><?php echo htmlspecialchars($servicio['cliente']); ?></td>
                        </tr>
                        <tr>
                          <td>ECO:</td>
                          <td><?php echo htmlspecialchars($servicio['eco']); ?></td>
                        </tr>
                        <tr>
                          <td>Num de Candados:</td>
                          <td><?php echo htmlspecialchars($servicio['num_candados']); ?></td>
                        </tr>
                        <tr>
                          <td>Nombre del Operador:</td>
                          <td><?php echo htmlspecialchars($servicio['operador']); ?></td>
                        </tr>
                        <tr>
                          <td>Tipo de unidad:</td>
                          <td><?php echo htmlspecialchars($servicio['unidad']); ?></td>
                        </tr>
                        <tr>
                          <td>Modelo:</td>
                          <td><?php echo htmlspecialchars($servicio['modelo']); ?></td>
                        </tr>
                        <tr>
                          <td>Placas:</td>
                          <td><?php echo htmlspecialchars($servicio['placas']); ?></td>
                        </tr>
                        <tr>
                          <td>Coordinador:</td>
                          <td>Palestina Cordova Juan Carlos</td>
                        </tr>
                        <tr>
                          <td>Tel:</td>
                          <td><?php echo htmlspecialchars($servicio['celular']); ?></td>
                        </tr>
                        <tr>
                          <td>CAAT:</td>
                          <td>12DT</td>
                        </tr>
                        <tr>
                          <td>RFC:</td>
                          <td>TAG200630F74</td>
                        </tr>
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center mt-3">
        <!-- <button type="button" class="btn btn-primary me-2 bg-gradient-info" onclick="mostrarAlerta()">Guardar</button> -->
        <!--<button type="button" class="btn btn-secondary me-2">Editar</button>-->
        <button type="button" class="btn bg-gradient-info me-2" id="downloadBtn">
          <i class="fa fa-download"></i> Descargar
        </button>
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
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>


  <script>
document.getElementById('downloadBtn').addEventListener('click', function() {
  var nombre = "Estampa_<?php echo $servicio['id_especifico']; ?>";
  
  // Selecciona el elemento que deseas convertir a PDF
  var content = document.querySelector('#contenedor');
  
  // Configura las opciones para html2pdf
  var opt = {
    margin:       1,
    filename:     nombre + '.pdf',
    image:        { type: 'jpeg', quality: 0.98 },
    html2canvas:  { scale: 2 },
    jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
  };
  
  // Genera el PDF y lo descarga
  html2pdf().set(opt).from(content).save();
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
  <!-- Agrega el script al final del body o en el head -->

</body>

</html>