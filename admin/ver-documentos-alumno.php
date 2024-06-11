<?php
include('../controllers/admin/middleware.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.svg">
    <title>
        SIGE | Documentos del alumno
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
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

<body class="g-sidenav-show bg-gray-200">
    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="#">
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
                    <a class="nav-link text-white" href="./lista-personal-escolar.php">
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
                    <h6 class="font-weight-bolder mb-0">Documentos del alumno</h6>
                </nav>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Documentos de...</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="input-group-mody input-group-static mb-1 card-header pb-2">
                                <label for="floatingTextarea">Comentarios</label>
                                <textarea class="form-control" id="comments" rows="5"></textarea>
                            </div>
                            <div class="row justify-content-md-end mx-3">
                                <div class="col-sm-3">
                                    <button type="button" class="btn bg-gradient-info w-100 mb-4"
                                    data-bs-toggle="modal" data-bs-target="#sendModal">
                                        Enviar comentarios
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive p-4">
                                <table class="table align-items-center mb-0" id="miTabla" class="display"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nombre del documento</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Ver documento</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fecha de Registro</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Eliminar documento</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Aprobar documento
                                            </th>
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
            <footer class="footer py-4">
                <div class="container-fluid">
                </div>
            </footer>
        </div>
    </main>
    <div id="notifications" class="alert container text-white fade show" role="alert"><strong></strong></div>
    <!-- Modal email -->
    <div class="modal fade" id="sendModal" tabindex="-1" role="dialog" aria-labelledby="sendModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-normal" id="sendModalLabel">¿Deseas enviar los comentarios?</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Antes de enviar los comentarios, asegúrate de seguir estos pasos:
                    </p>
                    <ol>
                        <li>Elimina los documentos que no son necesarios. Puedes hacerlo haciendo clic en el icono <span class="material-symbols-rounded">delete</span>.</li>
                        <li>Proporciona razones detalladas para el rechazo en el campo de comentarios.</li>
                        <li>No olvides especificar la fecha límite para el envío de nuevos documentos.</li>
                    </ol>
                    <p>
                        Esto ayudará a evitar confusiones y asegurará que los nuevos documentos sean correctos y enviados a tiempo.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cancelar envío</button>
                    <button type="button" class="btn bg-gradient-info" id="sendEmail">Enviar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal aprobar documento -->
    <div class="modal fade" id="ApproveModal" tabindex="-1" role="dialog" aria-labelledby="ApproveModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title font-weight-normal" id="ApproveModalLabel">¿Deseas aprobar este documento?</h6>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <span class="material-icons">question_mark</span> -->
                    <h4 class="text-gradient text-info mt-4">Por favor, lee con atención el siguiente texto</h4>
                    <p>Antes de aprobar el documento, asegúrate de revisarlo cuidadosamente para para verificar que cumple con los siguientes criterios:</p>
                    <ol>
                        <li>Que puedas abrir  <span class="material-symbols-rounded">visibility</span>  el documento proporcionado.</li>
                        <li>Que el documento PDF entregado por el alumno sea el correcto.</li>
                        <li>Que puedas leer las partes importantes del documento de manera clara.</li>
                    </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn bg-gradient-info" id="Approve">Aprobar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
        function obtenerParametro(nombreParametro) {
            var urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(nombreParametro);
        }
        $(document).ready(function () {

            var id = obtenerParametro("id");
            //Si se accede a la URL sin parámetros, te redirecciona a la tabla de alumnos
            if (!id) {
                showErrorNotification("Parece que falta información necesaria para consultar los documentos. Por favor, revise la URL o consulte el manual. Error #1");
                window.location.replace('/admin/lista-alumnos.php');
            }
            // Utiliza AJAX para cargar los datos desde PHP
            $.ajax({
                url: 'php/documentosAlumnos.php?id=' + id, // Ruta al archivo PHP que obtiene los datos
                type: 'GET',
                dataType: 'json',
                success: function (data) {

                    let Textostatus = "";
                    let TextoDocumentos = ""
                    // Itera a través de los datos y agrega filas a la tabla
                    for (var i = 0; i < data.length; i++) {
                        

                        if (data[i].Aprobado==0) {
                            
                            Textostatus = '<span class="badge badge-sm bg-gradient-warning">Sin revisar</span>';
                        }
                        if (data[i].Aprobado==1) {
                            
                            Textostatus = '<span class="badge badge-sm bg-gradient-success">Aprobado</span>';   
                        }

                        $('#miTabla tbody').append(
                            '<tr>' +
                            '<td><div class="d-flex px-2 py-1"> <div class="d-flex flex-column justify-content-center"> <h6 class="mb-0 text-sm">' + data[i].NombreDocumento + '</h6></div></div></td>' +
                            '<td class="align-middle text-center text-sm"><a href="' + data[i].ruta + '" target="_blank"><span class="material-symbols-rounded">visibility</span></td>' +
                            '<td class="align-middle text-center">' + Textostatus + '</td>' +
                            '<td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">' + data[i].Fecha + '</span></td>' +
                            '<td class="align-middle text-center text-sm"><a onclick="return confirmarEnvio()" href="../controllers/Alumno/controllerAlumnos.php?accion=1&AlumnoId=' + data[i].EstudianteId+ '&Tipo='+data[i].TipoDocumentoId+'" class="delete-icon"><span class="material-icons">delete</span></a></td>' +
                            '<td class="align-middle text-center text-sm"><a type="button" onclick="getDocumentID(' + data[i].TipoDocumentoId + ')" data-document="' + data[i].Aprobado + '" data-bs-toggle="modal" data-bs-target="#ApproveModal" class="approve-icon"><span class="material-icons">task</span></a></td>' +
                            '</tr>'
                        );
                    }

                    // Inicializa el DataTable
                    var miTabla = $('#miTabla').DataTable({
                        dom: 'Bfrtip',
                        buttons: ['copy', 'excel', 'pdf', 'print'],
                        language: {
                            "sProcessing": "Procesando...",
                            "sLengthMenu": "Mostrar _MENU_ documentos",
                            "sZeroRecords": "No se encontraron resultados",
                            "sEmptyTable": "Ningún dato disponible en esta tabla",
                            "sInfo": "Mostrando documentos del _START_ al _END_ de un total de _TOTAL_ documentos",
                            "sInfoEmpty": "Mostrando documentos del 0 al 0 de un total de 0 documentos",
                            "sInfoFiltered": "(filtrado de un total de _MAX_ documentos)",
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
                    // Verifica si la tabla no tiene datos
                    if (miTabla.rows().count() === 0) {
                        // Redirige a otra página
                        alert("No hay documentos disponibles.");
                        window.location.href = 'lista-alumnos.php';                        
                    }
                }
            });
        });
    </script>
    <script>
        function confirmarEnvio() {
    // Mostrar una alerta de confirmación personalizada
    var respuesta = confirm("¿Estás seguro de eliminar este documento?");

    // Si el usuario presiona 'Aceptar', se envía el formulario
    return respuesta;
}
    </script>
    <script src="../ajax/admin/approve-document-student.js"></script>
    <script src="../ajax/admin/send-email-student.js"></script>
</body>

</html>