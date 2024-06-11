<?php
include('../controllers/admin/middleware.php');
include_once('../models/db_connection.php');
$connection = new Connect();
$url_components = parse_url($_SERVER['REQUEST_URI']);
parse_str($url_components['query'], $params);
$sql = "SELECT  al.FechaDeNacimiento, al.Edad, al.Meses, al.Peso, al.Lentes, al.Cartilla, al.Vacunas,
                al.Ortopedico, al.Sexo, al.Curp, al.Nacionalidad, al.EntidadDeNacimiento, al.Domicilio, al.Telefono,
                al.CorreoElectronico, tu.Parentesco, tu.Nombre, tu.FechaDeNacimiento as bDateTutor, tu.Sexo,
                tu.EstadoCivil, tu.GradoDeEstudios, tu.Curp as curpTutor, tu.Nacionalidad as nTutor,
                tu.EntidadDeNacimiento as eNacimientoTutor, tu.tipodedocumento, tu.Direccion as domicilioTutor,
                tu.Telefono as telefonoTutor, tu.CorreoElectronico as correoTutor, tu.NecesidadEspecial,
                tu.HerramientasDeApoyo, tu.GrupoIndigena, tu.SituacionLaboral, al.nombre, al.grado
            FROM aspirantes al
            INNER JOIN tutores tu
            ON al.Id = tu.IdAlumno
            WHERE al.Id = '" . $params['id'] . "'";

$query = $connection->get_query($sql);
$query->execute();
$student = $query->fetch();
if ($student == false || $student['Domicilio'] == null) {
    session_start();
    $_SESSION['error'] = 'El alumno aun no ha cargado su perfil.';
    header('location: ./lista-alumnos.php');
    exit();
}
$address = explode(', ', $student['Domicilio']);
$tutorAddress = explode(', ', $student['domicilioTutor']);
$tutorName = explode(', ', $student['Nombre']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.svg">
    <title>
        SIGE | Perfil del alumno
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
                    <a class="nav-link text-white" href="./crear-usuario.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <span class="material-icons opacity-10">person_add</span>
                        </div>
                        <span class="nav-link-text ms-1">Agregar usuarios</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-info" href="./lista-alumnos.php">
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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="">Inicio</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Personal escolar</li>
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
                                <?php echo $student[32];?>
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm">
                                Grado: <?php echo $student[33];?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-plain h-100">
                                <div class="card-header pb-0 p-3">
                                    <h6 class="mb-0">Datos Generales</h6>
                                </div>
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="input-group-mody input-group-static mb-4 col-sm-3">
                                            <label>Fecha de nacimiento</label>
                                            <?php echo '<input type="date" class="form-control" value="' . $student[0] . '" readonly>';?>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm-1">
                                            <label>Edad</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $student[1] . '" readonly>';?>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm-1">
                                            <label>Meses</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $student[2] . '" readonly>';?>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm-2">
                                            <label>Peso</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $student[3] . '" readonly>';?>
                                            <span class="input-group-text" id="peso-addon2">Kg.</span>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm-1">
                                            <label for="lentesSelect">Lentes</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $student[4] . '" readonly>';?>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm">
                                            <label for="lentesSelect">Cartilla de vacunación</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $student[5] . '" readonly>';?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-group-mody input-group-static mb-4 col-sm-2">
                                            <label for="lentesSelect">Vacunas completas</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $student[6] . '" readonly>';?>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm">
                                            <label for="lentesSelect">Zapatos ortopédicos</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $student[7] . '" readonly>';?>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm">
                                            <label for="sexoSelect">Sexo</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $student[8] . '" readonly>';?>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm-4">
                                            <label>CURP</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $student[9] . '" readonly>';?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-group-mody input-group-static mb-1 col-sm-3">
                                            <label>Nacionalidad</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $student[10] . '" readonly>';?>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-1 col-sm-5">
                                            <label>Entidad de nacimiento</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $student[11] . '" readonly>';?>
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
                                        <div class="input-group-mody input-group-static mb-4 col-sm-4">
                                            <label>Calle</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $address[0] . '" readonly>';?>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm-4">
                                            <label>Entre calle</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $address[1] . '" readonly>';?>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm-4">
                                            <label>Y la calle</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $address[2] . '" readonly>';?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-group-mody input-group-static mb-4 col-sm-4">
                                            <label>Colonia</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $address[3] . '" readonly>';?>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm-4">
                                            <label>Código Postal</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $address[4] . '" readonly>';?>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm-4">
                                            <label>Localidad</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $address[5] . '" readonly>';?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-group-mody input-group-static mb-1 col-sm-4">
                                            <label>Municipio</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $address[6] . '" readonly>';?>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-1 col-sm-4">
                                            <label>Entidad</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $address[7] . '" readonly>';?>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-1 col-sm-4">
                                            <label>Referencia</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $address[8] . '" readonly>';?>
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
                                        <div class="input-group-mody input-group-static mb-4 col-sm-3">
                                            <label>Numero de teléfono (celular o casa)</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $student[13] . '" readonly>';?>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm-5">
                                            <label>Correo electrónico</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $student[14] . '" readonly>';?>
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
                                            <h6 class="mb-0">Información del Padre de Familia o Tutor</h6>
                                        </div>
                                        <h6 class="text-uppercase text-body text-xs font-weight-bolder">Datos Generales
                                        </h6>
                                    </div>
                                </div>
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="input-group-mody input-group-static mb-4 col-sm">
                                            <label>Parentesco</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $student[15] . '" readonly>';?>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm">
                                            <label>Primer apellido</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $tutorName[1] . '" readonly>';?>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm">
                                            <label>Segundo apellido</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $tutorName[2] . '" readonly>';?>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm">
                                            <label>Nombre</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $tutorName[0] . '" readonly>';?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-group-mody input-group-static mb-4 col-sm">
                                            <label>Fecha de nacimiento</label>
                                            <?php echo '<input type="date" class="form-control" value="' . $student[17] . '" readonly>';?>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm">
                                            <label for="sexoSelect">Sexo</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $student[18] . '" readonly>';?>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm">
                                            <label>Estado civil</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $student[19] . '" readonly>';?>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm">
                                            <label>Grado de estudios</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $student[20] . '" readonly>';?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-group-mody input-group-static mb-4 col-sm">
                                            <label>CURP</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $student[21] . '" readonly>';?>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm">
                                            <label>Nacionalidad</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $student[22] . '" readonly>';?>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm">
                                            <label>Entidad de nacimiento</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $student[23] . '" readonly>';?>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm">
                                            <label>Tipo de documento oficial</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $student[24] . '" readonly>';?>
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
                                            <h6 class="text-uppercase text-body text-xs font-weight-bolder">Dirección
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="input-group-mody input-group-static mb-4 col-sm-4">
                                            <label>Colonia</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $tutorAddress[0] . '" readonly>';?>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm-4">
                                            <label>Código Postal</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $tutorAddress[1] . '" readonly>';?>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm-4">
                                            <label>Localidad</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $tutorAddress[2] . '" readonly>';?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-group-mody input-group-static mb-4 col-sm-4">
                                            <label>Municipio</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $tutorAddress[3] . '" readonly>';?>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm-4">
                                            <label>Entidad</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $tutorAddress[4] . '" readonly>';?>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm-4">
                                            <label>Referencia</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $tutorAddress[5] . '" readonly>';?>
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
                                            <h6 class="text-uppercase text-body text-xs font-weight-bolder">Información
                                                de Contacto</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="input-group-mody input-group-static mb-4 col-sm-3">
                                            <label>Numero de teléfono (celular o casa)</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $student[26] . '" readonly>';?>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm-5">
                                            <label>Correo electrónico</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $student[27] . '" readonly>';?>
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
                                            <h6 class="text-uppercase text-body text-xs font-weight-bolder">Información
                                                Adicional</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="input-group-mody input-group-static mb-4 col-sm-6">
                                            <label>Necesidad educativa especial</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $student[28] . '" readonly>';?>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm-6">
                                            <label>Herramienta de apoyo</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $student[29] . '" readonly>';?>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm-6">
                                            <label>Grupo indígena</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $student[30] . '" readonly>';?>
                                        </div>
                                        <div class="input-group-mody input-group-static mb-4 col-sm-6">
                                            <label>Situación laboral</label>
                                            <?php echo '<input type="text" class="form-control" value="' . $student[31] . '" readonly>';?>
                                        </div>
                                    </div>
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
        <div id="notifications" class="alert container text-white fade show" role="alert"><strong></strong></div>
    </main>
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
    <script>

        document.body.onload = function(){
            var urlParams = new URLSearchParams(window.location.search);
            const url = urlParams.get("id");
            if (!url) {
                showErrorNotification("Parece que falta información necesaria para consultar los documentos. Por favor, revise la URL o consulte el manual. Error #1");
                window.location.replace('/admin/lista-alumnos.php');
                return;
            }
        }
    </script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>