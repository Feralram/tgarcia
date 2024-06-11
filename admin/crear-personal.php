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
        SIGE | Crear personal escolar
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
                <span class="ms-1 font-weight-bold text-white">SIGE</span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-info" href="./crear-usuario.php">
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
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark"
                                href="javascript:;">Inicio</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Agregar usuario</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Agregar personal escolar</h6>
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
                <div class="row">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-plain h-100">
                                <div class="card-header pb-0 p-3">
                                    <h6 class="mb-0">Registrar personal escolar</h6>
                                    <!-- <h6 class="text-body text-xs font-weight-bolder">Registra a un nuevo usuario </h6> -->
                                </div>
                                <div class="card-body p-3">
                                    <form id="create-personal">
                                        <div class="row">
                                            <div class="input-group-mody input-group-static mb-4 col-sm">
                                                <label>Nombre completo</label>
                                                <input type="text" name="name" id="name"
                                                    class="form-control" required>
                                            </div>
                                            <div class="input-group-mody input-group-static mb-4 col-sm">
                                                <label>Correo electrónico</label>
                                                <input type="email" name="email" id="email" class="form-control"
                                                    required>
                                            </div>
                                            <div class="input-group-mody input-group-static mb-4 col-sm">
                                                <label for="jobTitle">Puesto</label>
                                                <select class="form-control" name="jobTitle" id="jobTitle" required>
                                                    <option value="Profesor" selected>Profesor</option>
                                                    <option value="Administrativo">Administrativo</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-group-mody input-group-static mb-4 col-sm">
                                                <label>RFC</label>
                                                <input type="text" name="rfc" id="rfc"
                                                    class="form-control" required>
                                            </div>
                                            <div class="input-group-mody input-group-static mb-4 col-sm">
                                                <label>Contraseña</label>
                                                <input type="password" name="password" id="password"
                                                    class="form-control" required>
                                            </div>
                                            <div class="input-group-mody input-group-static mb-4 col-sm">
                                                <label>Repetir contraseña</label>
                                                <input type="password" name="repeat" id="repeat" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="row justify-content-md-end">
                                            <div class="col-sm-3">
                                                <button type="submit"
                                                    class="btn bg-gradient-info w-100 my-4 mb-2 ">Registrar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <footer class="footer py-4  ">
            <div class="container-fluid">
            </div>
        </footer>
    </main>
    <div id="notifications" class="alert container text-white fade show" role="alert"><strong></strong></div>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../validations/validators.js"></script>
    <script src="../ajax/notifications.js"></script>
    <script src="../ajax/admin/logout.js"></script>
    <script src="../ajax/admin/create-escolar.js"></script>
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