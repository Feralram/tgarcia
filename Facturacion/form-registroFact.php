<?php
session_start();
include_once('../models/Usuario.php');
require '../models/middleware.php';

$usuario = new Usuario();

$id = $_GET['servicioId'] ?? null;

if ($id) {
  $stmt = $usuario->conexion->prepare(
  "SELECT *
  FROM servicios  
  INNER JOIN cotizaciones ON servicios.id_cotizacion = cotizaciones.id_cotizacion
  INNER JOIN clientes ON cotizaciones.cliente = clientes.id_cliente
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
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
            <a class="nav-link text-white" href="perfil.php">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <span class="material-icons opacity-10">badge</span>
              </div>
              <span class="nav-link-text ms-1">Inicio</span>
            </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="./listaServicios.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <span class="material-icons opacity-10">folder</span>
            </div>
            <span class="nav-link-text ms-1">Lista de servicios</span>
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
        <li class="nav-item">
          <a class="nav-link text-white " href="./listaCanceladas.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <span class="material-icons opacity-10">folder</span>
            </div>
            <span class="nav-link-text ms-1">Lista Canceladas</span>
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
    <div class="container mt-5">
      <div class="border border-danger rounded p-4" style="max-width: 1200px; margin: auto;">
        <h3 class="text-center mb-4">Registro Factura</h3>
        <form id="facturaform" method="POST" >
          <div class="row">
            <div class="col-md-4 mb-3">
              <label for="factura" class="form-label">Factura</label>
              <input type="text" class="form-control form-control-sm" id="factura" name="factura" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="fecha_fac" class="form-label">Fecha</label>
              <input type="date" class="form-control form-control-sm" id="fecha_fac" name="fecha_fac" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="precio_base" class="form-label">Precio Base</label>
              <input type="number" class="form-control form-control-sm" id="precio_base" name="precio_base" value="<?php echo $servicio['costo']; ?>" required>
            </div>
            <div class="col-md-12 mb-3">
              <input type="checkbox" id="sin_impuestos" name="sin_impuestos">
              <label for="sin_impuestos" class="form-label">No aplicar retención</label>
            </div>
            <div class="col-md-4 mb-3">
              <label for="iva" class="form-label">Iva</label>
              <input type="number" class="form-control form-control-sm" id="iva" name="iva" readonly required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="Retención" class="form-label">Retención</label>
              <input type="number" class="form-control form-control-sm" id="Retención" name="Retención" readonly required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="precio_final" class="form-label">Precio final</label>
              <input type="number" class="form-control form-control-sm" id="precio_final" name="precio_final" readonly required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="razonSocial" class="form-label">Razón social</label>
              <input type="text" class="form-control form-control-sm" id="razonSocial" name="razonSocial" value="<?php echo $servicio['cliente']; ?>"readonly required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="contact_cliente" class="form-label">Ejecutivo</label>
              <input type="text" class="form-control form-control-sm" id="contact_cliente" name="contact_cliente" value="<?php echo $servicio['ejecutivo']; ?>"readonly required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="servicio" class="form-label">Servicio</label>
              <input type="text" class="form-control form-control-sm" id="servicio" name="servicio" value="<?php echo $servicio['servicio']; ?>"readonly  required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="referencia" class="form-label">Referencia</label>
              <input type="text" class="form-control form-control-sm" id="referencia" name="referencia" value="<?php echo $servicio['referencia']; ?>"readonly required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="complemento" class="form-label">Complemento</label>
              <input type="text" class="form-control form-control-sm" id="complemento" name="complemento" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="fecha_pag" class="form-label">Fecha de pago</label>
              <input type="date" class="form-control form-control-sm" id="fecha_pag" name="fecha_pag"required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="observacion" class="form-label">Observación</label>
              <input type="text" class="form-control form-control-sm" id="observacion" name="observacion" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="fecha_envio" class="form-label">Fecha de envio</label>
              <input type="date" class="form-control form-control-sm" id="fecha_envio" name="fecha_envio"required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="documento" class="form-label">Documento</label>
              <input type="text" class="form-control form-control-sm" id="documento" name="documento" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="portal_nip" class="form-label">Ingresado al portal</label>
              <input type="text" class="form-control form-control-sm" id="portal_nip" name="portal_nip" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="comentarios" class="form-label">Comentarios</label>
              <textarea class="form-control form-control-sm" id="comentarios" name="comentarios" rows="3" required></textarea>
            </div>
            <input type="hidden" name="idservicio" id="idservicio" value="<?php echo htmlspecialchars($id); ?>" required>
          </div>
      
          <button type="button" id="submitBtn" class="btn btn-danger btn-sm w-100">Registrar</button>
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
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Obtener los elementos de los inputs
        const sinImpuestosCheckbox = document.getElementById('sin_impuestos');
        const precioBaseInput = document.getElementById('precio_base');
        const ivaInput = document.getElementById('iva');
        const retencionInput = document.getElementById('Retención'); // Cambié 'Retención' a 'retencion'
        const precioFinalInput = document.getElementById('precio_final');

        // Función para calcular el IVA, la retención y el precio final
        function calcularValores() {
            const precioBase = parseFloat(precioBaseInput.value) || 0;
            const iva = precioBase * 0.16;
            // Si el checkbox está marcado, poner 0 en IVA y Retención
            if (sinImpuestosCheckbox.checked) {
                retencionInput.value = (0).toFixed(2);
                const preciosinRetencion = precioBase + iva;
                precioFinalInput.value = preciosinRetencion.toFixed(2);   // El precio final es igual al precio base
            } else {
                // Calcular el IVA (16%) y la retención (4%)
                
                const retencion = precioBase * 0.04;

                // Calcular el precio final
                const precioFinal = precioBase + iva - retencion;

                // Asignar los valores a los campos correspondientes
                ivaInput.value = iva.toFixed(2);
                retencionInput.value = retencion.toFixed(2);
                precioFinalInput.value = precioFinal.toFixed(2);
            }
        }

        // Calcular los valores al cargar la página
        calcularValores();

        // Agregar eventos para recalcular los valores cuando cambie el precio base o el checkbox
        precioBaseInput.addEventListener('input', calcularValores);
        sinImpuestosCheckbox.addEventListener('change', calcularValores);
    });
</script>




  <script>
document.getElementById('submitBtn').addEventListener('click', function() {
    var form = document.getElementById('facturaform');
    var formData = new FormData(form);

    var data = {};
    formData.forEach((value, key) => {
        data[key] = value;
    });

    fetch('../controllers/Usuario/controllerUsuario.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            accion: 'insertarFactura',
            ...data
        })
    })
    .then(response => response.json())
    .then(result => {
        if (result.success) {
            alert(result.message); // Alerta de éxito
            window.location.href = 'listaServicios.php'; // Redirigir a la página de éxito
        } else {
            alert(result.message); // Alerta de éxito
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
</script>

</body>

</html>