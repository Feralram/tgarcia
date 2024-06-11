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
    <link rel="icon" type="image/png" href="../assets/img/favicon.svg">
    <title>
        SIGE | Perfil personal escolar
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
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
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
                <!-- <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo"> -->
                <span class="material-symbols-rounded navbar-brand-img h-100 text-white">upload_file</span>
                <span class="ms-1 font-weight-bold text-white">SIGE</span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-info" href="./perfil.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <span class="material-icons opacity-10">badge</span>
                        </div>
                        <span class="nav-link-text ms-1">Mi perfil</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="./documentos.php">
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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark">Inicio</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Personal escolar</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Perfil del personal escolar</h6>
                </nav>
            </div>
        </nav>
        <div class="container-fluid px-2 px-md-4">
            <!-- End Navbar -->
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('../assets/img/teachers-profile.jpg'); background-position: center 85%;">
                <span class="mask  bg-gradient-info  opacity-6"></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row gx-4 mb-2">
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                            <?= $_SESSION['NombrePescolar'] ?>
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm">
                            <?= $_SESSION['PuestoPescolar'] ?>
                            </p>
                        </div>
                    </div>
                    <!-- <div class="col-lg-4 col-md-3 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0">
                            <ul class="nav nav-pills nav-fill p-1" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;"
                                        role="tab" aria-selected="false">
                                        <i class="material-icons text-lg position-relative">edit</i>
                                        <span class="ms-1">Editar</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div> -->
                </div>
                <div class="row">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-plain h-100">
                                <div class="card-header pb-0 p-3">
                                    <h6 class="mb-0">Datos Generales</h6>
                                </div>
                                <div class="card-body p-3">
                                <form id="miFormulario" onsubmit="return validarFormulario()" method="post" action="../controllers/personal-escolar/controllerPescolar.php">
                                    <input type="hidden" name="accion" id="accion" value="2">
                                    <div class="row">
                                        <div class="input-group-mody input-group-static mb-4 col-sm-3">
                                            <label>Fecha de nacimiento</label>
                                            <input type="date" id="fechadenacimiento" name="fechadenacimiento"
                                                class="form-control" >
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm">
                                            <label>Edad</label>
                                            <input type="text" class="form-control text-uppercase" id="edad" name="edad" >
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm">
                                            <label>Nacionalidad</label>
                                            <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" >
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm">
                                            <label>Entidad de nacimiento</label>
                                            <input type="text" class="form-control" id="entidaddenacimiento" name="entidaddenacimiento" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-group-mody input-group-static mb-4 col-sm">
                                            <label for="sexoSelect">Sexo</label>
                                            <select class="form-control" id="sexo" name="sexo" >
                                                <option value="Mujer">Mujer</option>
                                                <option value="Hombre" selected>Hombre</option>
                                                <option value="Otro">Otro</option>
                                            </select>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm">
                                            <label>CURP</label>
                                            <input type="text" class="form-control text-uppercase" id="curp" name="curp" >
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm">
                                            <label>Estado civil</label>
                                            <input type="text" id="estadocivil" name="estadocivil"
                                                class="form-control" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 ">
                            <div class="card card-plain h-100">
                                <div class="card-header pb-0 p-3">
                                    <div class="row">
                                        <div class="col-md-8 d-flex align-items-center">
                                            <h6 class="mb-0">Dirección</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="input-group-mody input-group-static mb-4 col-sm-5">
                                            <label>Calle</label>
                                            <input type="text" class="form-control" id="domicilio1" name="domicilio1" >
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm-3">
                                            <label>Numero</label>
                                            <input type="text" class="form-control" id="domicilio2" name="domicilio2" >
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm-4">
                                            <label>Colonia</label>
                                            <input type="text" class="form-control" id="domicilio3" name="domicilio3" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-group-mody input-group-static mb-4 col-sm-4">
                                            <label>Municipio</label>
                                            <input type="text" class="form-control" id="domicilio4" name="domicilio4" >
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm-4">
                                            <label>Código Postal</label>
                                            <input type="text" class="form-control" id="domicilio5" name="domicilio5" >
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm-4">
                                            <label>Entidad</label>
                                            <input type="text" class="form-control" id="domicilio6" name="domicilio6" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 ">
                            <div class="card card-plain h-100">
                                <div class="card-header pb-0 p-3">
                                    <div class="row">
                                        <div class="col-md-8 d-flex align-items-center">
                                            <h6 class="mb-0">Información de Contacto</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="input-group-mody input-group-static mb-4 col-sm">
                                            <label>Teléfono celular</label>
                                            <input type="text" class="form-control" aria-describedby="telefonoHelp" id="celular" name="celular" >
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm">
                                            <label>Teléfono casa</label>
                                            <input type="text" class="form-control" id="telefono" name="telefono" >
                                        </div>
                                        <!-- <div class="input-group-mody input-group-static mb-4 col-sm">
                                            <label>Correo electrónico</label>
                                            <input type="text" class="form-control">
                                        </div> -->
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
                    </div>
                </div>
            </div>
        </div>
        </div>
        <footer class="footer py-4  ">
            <div class="container-fluid">
                <!-- <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
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
                    </div>
                </div> -->
            </div>
        </footer>
    </main>
    <script>
        function validarFormulario() {
            var formulario = document.getElementById("miFormulario");
            var elementosDelFormulario = formulario.elements;

            for (var i = 0; i < elementosDelFormulario.length-1; i++) {
                if (elementosDelFormulario[i].value === "") {
                    alert("Por favor, complete todos los campos antes de enviar el formulario.");
                    return false; // Evita que el formulario se envíe
                }
            }

            // Aquí puedes agregar más validaciones si es necesario

            return true; // El formulario se enviará si todos los campos no están vacíos
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