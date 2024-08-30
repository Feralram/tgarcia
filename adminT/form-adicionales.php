<?php
// Mostrar todos los errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
  Transportes Garcia 
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
            <a class="nav-link text-white" href="./perfil.php">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <span class="material-icons opacity-10">badge</span>
              </div>
              <span class="nav-link-text ms-1">Inicio</span>
            </a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="./form-altaCot.php">
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
          <a class="nav-link text-white" href="./listaCotCanceladas.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <span class="material-icons opacity-10">folder</span>
            </div>
            <span class="nav-link-text ms-1">Cotizaciónes canceladas</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="./listaServCancelados.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <span class="material-icons opacity-10">folder</span>
            </div>
            <span class="nav-link-text ms-1">Servicios Cancelados</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-info" href="./form-adicionales.php">
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
    <div class="container mt-5">
     <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
        <h6 class="text-white text-capitalize ps-3 text-center h5">Iniciar cotización adicional</h6>
      </div>
      <div class="border border-danger rounded p-4" style="max-width: 1200px; margin: auto;">
      <form id="cotizacionForm">
          <div class="row">
          <div class="col-md-4 mb-3">
              <label for="cliente" class="form-label">Cliente</label>
              <input type="text" class="form-control form-control-sm" name="cliente" id="cliente">
            </div>
            <div class="col-md-4 mb-3">
              <label for="origen" class="form-label">Origen</label>
              <input type="text" class="form-control form-control-sm" name="origen" id="origen">
            </div>
            <div class="col-md-4 mb-3">
              <label for="destino" class="form-label">Destino</label>
              <input type="text" class="form-control form-control-sm" name="destino" id="destino">
            </div>
            <div class="col-md-4 mb-3">
              <label for="codigo_postal" class="form-label">Código Postal</label>
              <input type="text" class="form-control form-control-sm" name="codigo_postal" id="codigo_postal">
            </div>
            <div class="col-md-4 mb-3">
              <label for="peso" class="form-label">Peso</label>
              <input type="text" class="form-control form-control-sm" name="peso" id="peso">
            </div>
            <div class="col-md-4 mb-3">
              <label for="dimension" class="form-label">Dimension</label>
              <input type="text" class="form-control form-control-sm" name="dimension" id="dimension">
            </div>
            <div class="col-md-4 mb-3">
              <label for="precio" class="form-label">Precio</label>
              <input type="text" class="form-control form-control-sm" name="precio" id="precio">
            </div>
            <div class="col-md-4 mb-3">
              <label for="num_bultos" class="form-label">Número de Bultos</label>
              <input type="text" class="form-control form-control-sm" name="num_bultos" id="num_bultos">
            </div>
          </div>
          <button type="submit" class="btn btn-danger btn-sm w-100 bg-gradient-info">Guardar cotización</button>
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
document.getElementById('cotizacionForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevenir el envío tradicional del formulario
    
    // Obtener los valores del formulario
    const cliente = document.getElementById('cliente').value;
    const origen = document.getElementById('origen').value;
    const destino = document.getElementById('destino').value;
    const codigo_postal = document.getElementById('codigo_postal').value;
    const peso = document.getElementById('peso').value;
    const dimension = document.getElementById('dimension').value;
    const precio = document.getElementById('precio').value;
    const num_bultos = document.getElementById('num_bultos').value;

    // Construir el objeto JSON a enviar
    const datos = {
        accion: 'guardarCotizacionAdicional',
        datos: {
            cliente: cliente,
            origen: origen,
            destino: destino,
            codigo_postal: codigo_postal,
            peso: peso,
            dimension: dimension,
            precio: precio,
            num_bultos: num_bultos
        }
    };

    // Enviar la solicitud POST usando fetch
    fetch('../controllers/Usuario/controllerUsuario.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(datos)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error en la solicitud');
        }
        return response.json();
    })
    .then(data => {
        // Manejar la respuesta del servidor
        if (data.success) {
            alert('Cotización guardada correctamente');
            // Redirigir a la página de lista de adicionales
            window.location.href = data.redirectUrl;
        } else {
            alert('Error al guardar la cotización');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error en la solicitud');
    });
});

  </script>
</body>

</html>
