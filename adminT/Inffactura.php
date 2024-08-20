<?php
include_once('../models/Usuario.php');
session_start();

$usuario = new Usuario();

$id = $_GET['servicioId'] ?? null;

$tot = 0;

if ($id) {
    $stmt = $usuario->conexion->prepare(
        "SELECT id_factura, id_especifico, fecha, precio_base, iva, retencion, precio_final, razon_social, contacto_cliente, servicio, referencia, complemento, fecha_pago, observacion, fecha_envio, documento, portal_nippon, id_servicio
        FROM facturas
        WHERE id_servicio = ? AND activa = 1"
    );
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado && $resultado->num_rows > 0) {
        $facturas = [];
        while ($factura = $resultado->fetch_assoc()) {
            $facturas[] = $factura;
        }
    } else {
        echo "<script>
        alert('No se encontraron facturas.');
        window.location.href = 'perfil.php';
      </script>";
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
    <!-- Incluye jQuery y DataTables CSS y JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script src="https://cdn.datatables.net/plug-ins/1.11.5/i18n/Spanish.json"></script>
    <title>Facturas - Transportes Garcia</title>
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
    <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
    <style>
        .invoice {
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background: #fff;
    margin-bottom: 20px;
    /* Ajusta el tamaño aquí */
    font-size: 0.8em; /* Reducir el tamaño del texto */
}

        .invoice-header,
        .invoice-footer {
            text-align: center;
        }
        .invoice-header h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }
        .invoice-header .date {
            margin-top: 10px;
            font-size: 14px;
            color: #666;
        }
        .invoice-details {
            margin: 20px 0;
        }
        .invoice-details th,
        .invoice-details td {
            padding: 8px;
            border: 1px solid #ddd;
        }
        .invoice-details th {
            background: #f4f4f4;
            text-align: left;
        }
        .invoice-total {
            margin-top: 20px;
            text-align: right;
        }
        .invoice-total .total-label {
            font-weight: bold;
        }
    </style>
</head>

<body class="g-sidenav-show bg-gray-200">
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
          <a class="nav-link text-white" href="./listaServicios.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <span class="material-icons opacity-10">folder</span>
            </div>
            <span class="nav-link-text ms-1">Lista de servicios</span>
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
    <div class="container-fluid px-2 px-md-4">
        <!-- End Navbar -->
        <!-- Factura -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="container mt-4">
                            <?php $index = 1;
                             foreach ($facturas as $factura): 
                              $tot += $factura['precio_final'];?>
                                <div class="invoice">
                                    <div class="invoice-header">
                                        <h1>Factura <?php echo htmlspecialchars($index);  ?> - S<?php echo htmlspecialchars($factura['id_servicio']); ?></h1>
                                        <div class="date">Fecha: <?php echo htmlspecialchars($factura['fecha']); ?></div>
                                    </div>
                                    <div class="invoice-details">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>ID Específico</th>
                                                    <td><?php echo htmlspecialchars($factura['id_especifico']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Razón Social</th>
                                                    <td><?php echo htmlspecialchars($factura['razon_social']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Contacto Cliente</th>
                                                    <td><?php echo htmlspecialchars($factura['contacto_cliente']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Servicio</th>
                                                    <td><?php echo htmlspecialchars($factura['servicio']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Referencia</th>
                                                    <td><?php echo htmlspecialchars($factura['referencia']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Complemento</th>
                                                    <td><?php echo htmlspecialchars($factura['complemento']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Fecha Pago</th>
                                                    <td><?php echo htmlspecialchars($factura['fecha_pago']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Observación</th>
                                                    <td><?php echo htmlspecialchars($factura['observacion']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Fecha Envío</th>
                                                    <td><?php echo htmlspecialchars($factura['fecha_envio']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Documento</th>
                                                    <td><?php echo htmlspecialchars($factura['documento']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Portal Nippon</th>
                                                    <td><?php echo htmlspecialchars($factura['portal_nippon']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>ID Servicio</th>
                                                    <td><?php echo htmlspecialchars($factura['id_servicio']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Precio Base</th>
                                                    <td><?php echo htmlspecialchars($factura['precio_base']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>IVA</th>
                                                    <td><?php echo htmlspecialchars($factura['iva']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Retención</th>
                                                    <td><?php echo htmlspecialchars($factura['retencion']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Precio Final</th>
                                                    <td><?php echo htmlspecialchars($factura['precio_final']); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="invoice-footer">
                                        <button type="button" class="btn bg-gradient-info me-2" data-id="<?php echo htmlspecialchars($factura['id_factura']); ?>">
                                            <i class="fa fa-download"></i> Descargar PDF
                                        </button>
                                    </div>
                                </div>

                            <?php 
                            $index++;
                             endforeach; ?>
                        </div>
                        <div class="invoice-footer">
                            <label for="tot"><b>Total facturas: $<?php echo htmlspecialchars($tot); ?></b></label>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

<script>
document.querySelectorAll('.invoice-footer button').forEach(button => {
    button.addEventListener('click', function() {
        var facturaId = this.getAttribute('data-id');
        var nombre = 'factura_' + facturaId + '.pdf';
        var element = this.closest('.invoice');
        var opt = {
            margin: 0.5,
            filename: nombre,
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 1.5 }, // Ajusta la escala aquí
            jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
        };
        html2pdf().from(element).set(opt).save();
    });
});

</script>
</body>

</html>
