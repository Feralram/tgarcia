<?php

include('../controllers/Alumno/middleware.php');

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
        SIGE | Mi perfil
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
    <link rel="stylesheet" href="../assets/css/aviso.css">
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
                <span class="ms-1 font-weight-bold text-white">SIGE</span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <?php
          if ($_SESSION['ComentarioAlumno'] == 'None') {?>
                    <a class="nav-link text-muted" href="javascript:void(0)" style="pointer-events: none">
                        <div class="text-muted text-center me-2 d-flex align-items-center justify-content-center">
                            <span class="material-icons opacity-10">badge</span>
                        </div>
                        <span class="nav-link-text ms-1">Mi perfil</span>
                    </a>
                    <?php
          }else {?>
                    <a class="nav-link text-muted" href="javascript:void(0)" style="pointer-events: none">
                        <div class="text-muted text-center me-2 d-flex align-items-center justify-content-center">
                            <span class="material-icons opacity-10">badge</span>
                        </div>
                        <span class="nav-link-text ms-1">Mi perfil</span>
                    </a>
                    <?php
          }
          ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-muted" href="javascript:void(0)" style="pointer-events: none">
                        <div class="text-muted text-center me-2 d-flex align-items-center justify-content-center">
                            <span class="material-icons opacity-10">folder</span>
                        </div>
                        <span class="nav-link-text ms-1">Mis documentos</span>
                    </a>
                </li>
                <li class="nav-item mt-4">
                    <a class="nav-link text-white " href="../controllers/Alumno/controllerAlumnos.php?accion=0">
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
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Alumnos</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Perfil del alumno</h6>
                </nav>
            </div>
        </nav>
            <div class="container-fluid px-2 px-md-4">
                <!-- End Navbar -->
                <div class="page-header min-height-300 border-radius-xl mt-4"
                    style="background-image: url('../assets/img/students-profile.jpg'); background-position: center 75%;">
                    <span class="mask  bg-gradient-info  opacity-6"></span>
                </div>
                <div class="card card-body mx-3 mx-md-4 mt-n6">

                    <div class="row gx-4 mb-2">
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="mb-1">
                                    <?= $_SESSION['NombreAlumno'] ?>
                                </h5>
                                <p class="mb-0 font-weight-normal text-sm">
                                    <?= $_SESSION['GradoAlumno'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                            <div class="header-aviso">
                                <div class="image-aviso">
                                    <span class="material-icons">done</span>
                                </div>
                                <div class="content-aviso">
                                    <span class="title">Tu perfil ya se encuentra llenado</span>
                                    <p class="message-aviso">Espera indicaciones de los administradores para saber que sigue.</p>
                                </div>
                                <div class="actions">
                                    <a href="../controllers/Alumno/controllerAlumnos.php?accion=0">
                                        <button class="desactivate btn-info" type="button">Cerrar sesion</button>
                                    </a>
                                    <!-- <button class="cancel" type="button">Cancel</button> -->
                                </div>
                            </div>
                    </div>

                </div>
            </div>
        <!-- </div> -->
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