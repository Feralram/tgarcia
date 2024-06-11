<?php
include('../controllers/personal-escolar/middleware.php');
?>
<!--
=========================================================
* Material Dashboard 2 - v3.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        SIGE | Mis documentos
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
            <a class="navbar-brand m-0 " href="#"
                target="_blank">
                <span class="material-symbols-rounded navbar-brand-img h-100 text-white">upload_file</span>
                <span class="ms-1 font-weight-bold text-white">SIGE</span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item"><?php
                    if ($_SESSION['ComentarioPescolar'] == 'None') {?>
                        <a class="nav-link text-muted" href="javascript:void(0)" style="pointer-events: none">
                        <div class="text-muted text-center me-2 d-flex align-items-center justify-content-center">
                            <span class="material-icons opacity-10">badge</span>
                        </div>
                        <span class="nav-link-text ms-1">Mi perfil</span>
                        </a>
                        <?php
                    }else {?>
                        <a class="nav-link text-white" href="./perfil.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <span class="material-icons opacity-10">badge</span>
                        </div>
                        <span class="nav-link-text ms-1">Mi perfil</span>
                        </a><?php
                    }?>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-info" href="./documentos.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <span class="material-icons opacity-10">folder</span>
                        </div>
                        <span class="nav-link-text ms-1">Mis documentos</span>
                    </a>
                </li>
                <li class="nav-item mt-4">
                    <a class="nav-link text-white " href="../controllers/personal-escolar/controllerPescolar.php?accion=0">
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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark"
                                href="javascript:;">Inicio</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Personal escolar</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Mis documentos</h6>
                </nav>
            </div>
        </nav>
        <div class="container-fluid px-2 px-md-4">
            <!-- End Navbar -->
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('../assets/img/teachers-profile.jpg'); background-position: center 75%;">
                <span class="mask bg-gradient-info  opacity-6"></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">

            <form id="miFormularioActualizable" onsubmit="return validarFormulario1()" method="post" action="../controllers/personal-escolar/controllerPescolar.php" enctype="multipart/form-data">
            <input type="hidden" name="accion" id="accion" value="4">
                <div class="col-12 ">
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-0">Documentos Actualizables</h6>
                                </div>
                                <h6 class="text-body text-xs font-weight-bolder">En este apartado se subirán los documentos que deben ser actualizado periodicamente</h6>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="input-group-static mb-4 col-sm-12">
                                    <label for="talonPago" class="form-label">Talon de pago</label>
                                    <input class="form-control form-control-sm" id="archivo9" name="archivos[8]" type="file" accept=".pdf" >
                                </div>
                                <div class="input-group-static mb-4 col-sm-12">
                                    <label for="talonPago" class="form-label">SAT</label>
                                    <input class="form-control form-control-sm" id="archivo10" name="archivos[9]" type="file" accept=".pdf" >
                                </div>
                                <div class="input-group-static mb-4 col-sm-12">
                                    <label for="talonPago" class="form-label">INE o IFE</label>
                                    <input class="form-control form-control-sm" id="archivo11" name="archivos[10]" type="file" accept=".pdf" >
                                </div>
                                <div class="input-group-static mb-4 col-sm-12">
                                    <label for="talonPago" class="form-label">RFC</label>
                                    <input class="form-control form-control-sm" id="archivo12" name="archivos[11]" type="file" accept=".pdf" >
                                </div>
                                <div class="input-group-static mb-4 col-sm-12">
                                    <label for="talonPago" class="form-label">Adicional Uno</label>
                                    <input class="form-control form-control-sm" id="archivo13" name="archivos[12]" type="file" accept=".pdf" >
                                </div>
                                <div class="input-group-static mb-4 col-sm-12">
                                    <label for="talonPago" class="form-label">Adicional Dos</label>
                                    <input class="form-control form-control-sm" id="archivo14" name="archivos[13]" type="file" accept=".pdf" >
                                </div>
                                <div class="input-group-static mb-4 col-sm-12">
                                    <label for="talonPago" class="form-label">Adicional Tres (Cartilla)</label>
                                    <input class="form-control form-control-sm" id="archivo15" name="archivos[14]" type="file" accept=".pdf" >
                                </div>
                                <div class="row justify-content-md-end mt-0">
                                    <div class="col-sm-3">
                                        <button type="submit" class="btn bg-gradient-info w-100 mb-2 ">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            
                <div class="row gx-4 mb-2">
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                Carga de documentos
                            </h5>
                            <strong class="mb-0 font-weight-bolder text-sm">
                                En este apartado carga en formato PDF los documentos solicitados
                            </strong>
                        </div>
                    </div>
                </div>
                <div class="row">
                <form id="miFormulario" onsubmit="return validarFormulario()" method="post" action="../controllers/personal-escolar/controllerPescolar.php" enctype="multipart/form-data">
                <input type="hidden" name="accion" id="accion" value="3">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="input-group-static mb-4 col-sm-12">
                                        <label for="formFileSm" class="form-label">Hoja de datos (Cedula de identificación)</label>
                                        <input class="form-control form-control-sm" type="file" id="archivo1" name="archivos[]" accept=".pdf" >
                                    </div>
                                    <div class="input-group-static mb-4 col-sm-12">
                                        <label for="formFileSm" class="form-label">Acta de nacimiento</label>
                                        <input class="form-control form-control-sm" type="file" id="archivo2" name="archivos[]" accept=".pdf" >
                                    </div>
                                    <div class="input-group-static mb-4 col-sm-12">
                                        <label for="formFileSm" class="form-label">Filiación</label>
                                        <input class="form-control form-control-sm" type="file" id="archivo3" name="archivos[]" accept=".pdf" >
                                    </div>
                                    <div class="input-group-static mb-4 col-sm-12">
                                        <label for="formFileSm" class="form-label">CURP</label>
                                        <input class="form-control form-control-sm" type="file" id="archivo4" name="archivos[]" accept=".pdf" >
                                    </div>
                                    <div class="input-group-static mb-4 col-sm-12">
                                        <label for="formFileSm" class="form-label">Documento de preparación</label>
                                        <input class="form-control form-control-sm" type="file" id="archivo5" name="archivos[]" accept=".pdf" >
                                    </div>
                                    <div class="input-group-static mb-4 col-sm-12">
                                        <label for="formFileSm" class="form-label">FUP (Formato Unico de Personal)</label>
                                        <input class="form-control form-control-sm" type="file" id="archivo6" name="archivos[]" accept=".pdf" >
                                    </div>
                                    <div class="input-group-static mb-4 col-sm-12">
                                        <label for="formFileSm" class="form-label">Oficios de Adscripción</label>
                                        <input class="form-control form-control-sm" type="file" id="archivo7" name="archivos[]" accept=".pdf" >
                                    </div>
                                    <div class="input-group-static mb-4 col-sm-12">
                                        <label for="formFileSm" class="form-label">Dictamenes o basificacion</label>
                                        <input class="form-control form-control-sm" type="file" id="archivo8" name="archivos[]" accept=".pdf" >
                                    </div>
                                    <div class="row justify-content-md-end mt-0">
                                        <div class="col-sm-3">
                                            <button type="submit" class="btn bg-gradient-info w-100 mb-2 ">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </form>
                </div>
            </div>
        </div>
        </div>
        <footer class="footer py-4  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <!-- <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            made with <i class="fa fa-heart"></i> by
                            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative
                                Tim</a>
                            for a better web.
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link text-muted"
                                    target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                    target="_blank">About
                                    Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                    target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                    target="_blank">License</a>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </footer>
    </main>

    <script>
        function validarFormulario1() {
            var formulario = document.getElementById("miFormularioActualizable");
            var archivosSeleccionados = 0;

            var inputsFile = formulario.querySelectorAll('input[type="file"]');
            for (var i = 0; i < inputsFile.length; i++) {
                if (inputsFile[i].files.length > 0) {
                    archivosSeleccionados++;
                }
            }

            if (archivosSeleccionados === 0) {
                alert("Por favor, seleccione al menos un archivo antes de enviar el formulario.");
                return false; // Evita que el formulario se envíe
            }

            // Puedes agregar más validaciones si es necesario

            return true; // El formulario se enviará si al menos un archivo está seleccionado
        }
    </script>




<script>
        function validarFormulario() {
            var formulario = document.getElementById("miFormulario");
            var elementos = formulario.elements;
            var camposFaltantes = [];

            for (var i = 0; i < elementos.length; i++) {
                if (elementos[i].type === "file" && elementos[i].files.length === 0) {
                    camposFaltantes.push(elementos[i].id);
                }
            }

            if (camposFaltantes.length > 0) {
                var mensaje = "Los siguientes campos son obligatorios y están vacíos:\n";
                for (var j = 0; j < camposFaltantes.length; j++) {
                    mensaje += camposFaltantes[j] + "\n";
                }
                alert(mensaje);
                return false; // Evita que el formulario se envíe
            }

            // Aquí puedes agregar más validaciones si es necesario

            return true; // El formulario se enviará si todos los campos obligatorios están completos
        }
    </script>

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
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>