<?php
include('../controllers/admin/middleware.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.svg">
  <title>
    SIGE | Lista de personal escolar
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700"/>
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet"/>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet"/>
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0"/>
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet"/>
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
                <span class="ms-1 font-weight-bold text-white">SIGE</span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white " href="./crear-usuario.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <span class="material-icons opacity-10">person_add</span>
                        </div>
                        <span class="nav-link-text ms-1">Agregar usuarios</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="./lista-alumnos.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <span class="material-icons opacity-10">groups_2</span>
                        </div>
                        <span class="nav-link-text ms-1">Alumnos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-info" href="./lista-personal-escolar.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <span class="material-icons opacity-10">hail</span>
                        </div>
                        <span class="nav-link-text ms-1">Personal escolar</span>
                    </a>
                </li>
                <li class="nav-item mt-4">
                    <a class="nav-link text-white" id="logout" href="">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">logout</i>
                        </div>
                        <span class="nav-link-text ms-1">Cerrar sesión</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
      data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark"
              href="javascript:;">Inicio</a></li>
      <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Personal escolar</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Personal escolar</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <!-- <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              <label class="form-label">Type here...</label>
              <input type="text" class="form-control">
            </div>
          </div> -->
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Tabla Del Personal Escolar</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-4">

                <table class="table align-items-center mb-0" id="miTabla" class="display" style="width:100%">
                  <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Personal/Filiación</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Puesto</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Datos</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Documentos</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fecha de Registro</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Accion</th>
                      </tr>
                  </thead>
                  <tbody>
                      <!-- Los datos de la base de datos se cargarán aquí usando PHP y DataTables -->
                  </tbody>
              </table>                
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
          </div>
        </div>
      </footer>
    </div>
  </main>
  <div id="notifications" class="alert container text-white fade show" role="alert"><strong></strong></div>


  <!--   DataTables Js Links   -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../validations/validators.js"></script>
  <script src="../ajax/notifications.js"></script>
  <script src="../ajax/admin/logout.js"></script>
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
        // Utiliza AJAX para cargar los datos desde PHP
        $.ajax({
            url: 'php/tablaPersonal.php', // Ruta al archivo PHP que obtiene los datos
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // Itera a través de los datos y agrega filas a la tabla
                let text = "";
                for (var i = 0; i < data.length; i++) {
                  switch (data[i].empstatus) {
                    case 1:
                      text = '<span class="badge badge-sm bg-gradient-warning">Pendiente</span>';
                      break;

                    case 2:
                      text = '<span class="badge badge-sm bg-gradient-success">Aceptado</span>';                    
                    break;

                    case 3:
                      text = '<span class="badge badge-sm bg-gradient-danger">Rechazado</span>';                    
                    break;
                  
                    default:
                      break;
                  }
                    $('#miTabla tbody').append(
                        '<tr>' +
                        '<td><div class="d-flex px-2 py-1"> <div class="d-flex flex-column justify-content-center"> <h6 class="mb-0 text-sm">' + data[i].nombre + '</h6><p class="text-xs text-secondary mb-0">'+ data[i].rfc +'</p></div></div></td>' +
                        '<td><div class="d-flex px-2 py-1"> <div class="d-flex flex-column justify-content-center"> <span class="text-secondary text-xs font-weight-bold">'+ data[i].puesto +'</span></div></div></td>' +
                        '<td class="align-middle text-center text-sm"><a href="./ver-personal.php?id='+ data[i].id +'"><span class="material-symbols-rounded">description</span></td>' +
                        '<td class="align-middle text-center text-sm"><a href="./ver-documentos-personal.php?id='+ data[i].id +'"><span class="material-symbols-rounded">folder_open</span></td>' +
                        '<td class="align-middle text-center">' + text + '</td>' +
                        '<td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">' + data[i].fecha + '</span></td>' +
                        '<td class="align-middle text-center text-sm"><a onclick="return confirmarEnvio()" href="../controllers/personal-escolar/controllerPescolar.php?accion=2&id='+ data[i].id +'" class="delete-icon"><span class="material-symbols-rounded">delete</span></a></td>' +                        
                                           
                        '</tr>'                        
                    );
                }

                // Inicializa el DataTable
                var miTabla = $('#miTabla').DataTable({
                        dom: 'Bfrtip',
                        buttons: ['copy', 'excel', 'pdf', 'print'],
                        language: {
                            "sProcessing": "Procesando...",
                            "sLengthMenu": "Mostrar _MENU_ personal escolar",
                            "sZeroRecords": "No se encontraron resultados",
                            "sEmptyTable": "Ningún dato disponible en esta tabla",
                            "sInfo": "Mostrando personal escolar del _START_ al _END_ de un total de _TOTAL_ personal escolar",
                            "sInfoEmpty": "Mostrando personal escolar del 0 al 0 de un total de 0 personal escolar",
                            "sInfoFiltered": "(filtrado de un total de _MAX_ personal escolar)",
                            "sInfoPostFix": "",
                            "sSearch": "Buscar:",
                            "sUrl": "",
                            "sInfoThousands": ",",
                            "sLoadingRecords": "Cargando...",
                            "oPaginate": {
                                "sFirst": "Primero",
                                "sLast": "Último",
                                "sNext": "Siguiente",
                                "sPrevious": "Anterior"
                            },
                            "oAria": {
                                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                            },
                            searchBuilder: {
                                button: {
                                    0: 'Filtrar',
                                    1: 'Filtrar (%d)'
                                },
                                title: {
                                    1: 'Filtrador de una condición',
                                    _: 'Filtrador de %d condiciones'
                                },
                            }
                        }
                    });
            }
        });
    });
</script>
<script>
  function confirmarEnvio() {
    // Mostrar una alerta de confirmación personalizada
    var respuesta = confirm("¿Estás seguro de eliminar este personal?");

    // Si el usuario presiona 'Aceptar', se envía el formulario
    return respuesta;
}

</script>

<?php
if (isset($_SESSION['error'])) {
  $message = $_SESSION['error'];
  echo "<script type='text/javascript'>
          showErrorNotification('$message');
        </script>
  ";
  unset($_SESSION['error']);
}
?>

</body>

</html>