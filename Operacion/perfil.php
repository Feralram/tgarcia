<?php

session_start();
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
   Trasportes Garcia
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
        <span class="ms-1 font-weight-bold text-white">Transportes Garcia</span>
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
              <span class="nav-link-text ms-1">Inicio</span>
            </a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="./documentos.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <span class="material-icons opacity-10">folder</span>
            </div>
            <span class="nav-link-text ms-1">Alta Cotización</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="./documentos.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <span class="material-icons opacity-10">folder</span>
            </div>
            <span class="nav-link-text ms-1">Cotización en proceso</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="./documentos.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <span class="material-icons opacity-10">folder</span>
            </div>
            <span class="nav-link-text ms-1">Lista de servicios</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="./documentos.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <span class="material-icons opacity-10">folder</span>
            </div>
            <span class="nav-link-text ms-1">Lista de facturas</span>
          </a>
        </li>
        <li class="nav-item mt-4">
          <a class="nav-link text-white " href="../controllers/Usuario/controllerUsuario.php?accion=0">
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
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Inicio</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Operaciones</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Bienvenido</h6>
        </nav>
      </div>
    </nav>
    <div class="container-fluid px-2 px-md-4">
      <!-- End Navbar -->
      <div class="page-header min-height-300 border-radius-xl mt-4"
        style="background-image: url('../assets/img/logo.jpeg'); ">
        <span class="mask  bg-gradient-info  opacity-6"></span>
      </div>
      <div class="h-100">
        <br><br><h1>Bienvenid@ </h1>
        <h2>Nombre: <?= $_SESSION['NombreUsu'] ?></h2>
        <h2>Puesto: <?= $_SESSION['PuestoUsu'] ?></h2>
      </div>
      <!--<div class="card card-body mx-3 mx-md-4 mt-n6">

        <form id="update-profile">
          <input type="hidden" name="accion" id="accion" value="2">
        <div class="row gx-4 mb-2">
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">

              </h5>
              <p class="mb-0 font-weight-normal text-sm">
     
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
                      <input type="date" id="birthdayStudent" name="fechadenacimiento" class="form-control" required>
                    </div>
                    <div class="input-group-mody input-group-static mb-4 col-sm-1">
                      <label>Edad</label>
                      <input type="number" class="form-control" id="edad" name="edad" required>
                    </div>
                    <div class="input-group-mody input-group-static mb-4 col-sm-1">
                      <label>Meses</label>
                      <input type="number" class="form-control" id="meses" name="meses" required>
                    </div>
                    <div class="input-group-mody input-group-static mb-4 col-sm-3">
                      <label>Peso</label>
                      <input type="text" class="form-control" aria-describedby="peso-addon2" id="peso" name="peso" required>
                      <span class="input-group-text" id="peso-addon2">Kg.</span>
                    </div>
                    <div class="input-group-mody input-group-static mb-4 col-sm-1">
                      <label for="lentesSelect">Lentes</label>
                      <select class="form-control" name="lentes" id="lentes" required>
                        <option value="Sí">Sí</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                    <div class="input-group-mody input-group-static mb-4 col-sm">
                      <label for="lentesSelect">Cartilla de vacunación</label>
                      <select class="form-control" name="cartilla" id="cartilla" required>
                        <option value="Sí">Sí</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-group-mody input-group-static mb-4 col-sm-2">
                      <label for="lentesSelect">Vacunas completas</label>
                      <select class="form-control" name="vacunas" id="vacunas" required>
                        <option value="Sí">Sí</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                    <div class="input-group-mody input-group-static mb-4 col-sm">
                      <label for="lentesSelect">Zapatos ortopédicos</label>
                      <select class="form-control" name="ortopedico" id="ortopedico" required>
                        <option value="Sí">Sí</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                    <div class="input-group-mody input-group-static mb-4 col-sm">
                      <label for="sexoSelect">Sexo</label>
                      <select class="form-control" name="sexo" id="sexo" required>
                        <option value="Mujer">Mujer</option>
                        <option value="Hombre">Hombre</option>
                        <option value="Otro">Otro</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-group-mody input-group-static mb-4 col-sm">
                      <label for="entidadSelect">Entidad de nacimiento</label>
                      <select class="form-control" name="entidaddenacimiento" id="entidaddenacimiento" required>
                        <option value="Ciudad de México">Ciudad de México</option>
                        <option value="México">México</option>
                        <option value="Aguascalientes">Aguascalientes</option>
                        <option value="Baja California">Baja California</option>
                        <option value="Baja California Sur">Baja California Sur</option>
                        <option value="Campeche">Campeche</option>
                        <option value="Chiapas">Chiapas</option>
                        <option value="Chihuahua">Chihuahua</option>
                        <option value="Coahuila">Coahuila</option>
                        <option value="Colima">Colima</option>
                        <option value="Durango">Durango</option>
                        <option value="Guanajuato">Guanajuato</option>
                        <option value="Guerrero">Guerrero</option>
                        <option value="Hidalgo">Hidalgo</option>
                        <option value="Jalisco">Jalisco</option>
                        <option value="Michoacán">Michoacán</option>
                        <option value="Morelos">Morelos</option>
                        <option value="Nayarit">Nayarit</option>
                        <option value="Nuevo León">Nuevo León</option>
                        <option value="Oaxaca">Oaxaca</option>
                        <option value="Puebla">Puebla</option>
                        <option value="Querétaro">Querétaro</option>
                        <option value="Quintana Roo">Quintana Roo</option>
                        <option value="San Luis Potosí">San Luis Potosí</option>
                        <option value="Sinaloa">Sinaloa</option>
                        <option value="Sonora">Sonora</option>
                        <option value="Tabasco">Tabasco</option>
                        <option value="Tamaulipas">Tamaulipas</option>
                        <option value="Tlaxcala">Tlaxcala</option>
                        <option value="Veracruz">Veracruz</option>
                        <option value="Yucatán">Yucatán</option>
                        <option value="Zacatecas">Zacatecas</option>
                        <option value="Otro">Otro</option>
                      </select>
                    </div>
                    <div class="input-group-mody input-group-static mb-4 col-sm">
                      <label>Nacionalidad</label>
                      <input type="text" value="Mexicana" class="form-control" name="nacionalidad" id="nacionalidad" required>
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
                      <input type="text" class="form-control" name="domicilio1" id="domicilio1" required>
                    </div>
                    <div class="input-group-mody input-group-static mb-4 col-sm-4">
                      <label>Entre calle</label>
                      <input type="text" class="form-control" name="domicilio2" id="domicilio2" required>
                    </div>
                    <div class="input-group-mody input-group-static mb-4 col-sm-4">
                      <label>Y la calle</label>
                      <input type="text" class="form-control" name="domicilio3" id="domicilio3" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-group-mody input-group-static mb-4 col-sm-4">
                      <label>Colonia</label>
                      <input type="text" class="form-control" name="domicilio4" id="domicilio4" required>
                    </div>
                    <div class="input-group-mody input-group-static mb-4 col-sm-4">
                      <label>Código Postal</label>
                      <input type="text" class="form-control" name="domicilio5" id="domicilio5" required>
                    </div>
                    <div class="input-group-mody input-group-static mb-4 col-sm-4">
                      <label>Localidad</label>
                      <input type="text" class="form-control" name="domicilio6" id="domicilio6" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-group-mody input-group-static mb-4 col-sm-4">
                      <label>Municipio</label>
                      <input type="text" class="form-control" name="domicilio7" id="domicilio7" required>
                    </div>
                    <div class="input-group-mody input-group-static mb-4 col-sm-4">
                      <label>Entidad</label>
                      <input type="text" class="form-control" name="domicilio8" id="domicilio8" required>
                    </div>
                    <div class="input-group-mody input-group-static mb-4 col-sm-4">
                      <label>Referencia</label>
                      <input type="text" class="form-control" name="domicilio9" id="domicilio9" required>
                    </div>
                    <div class="row justify-content-md-end mt-0">
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
                    <div class="input-group-mody input-group-static mb-4 col-sm-4">
                      <label>Numero de teléfono (celular o casa)</label>
                      <input type="text" class="form-control" aria-describedby="telefonoHelp" name="telefono" id="telefono" required>
                    </div>
                    <div class="input-group-mody input-group-static mb-4 col-sm-4">
                      <label>Correo electrónico</label>
                      <input type="email" class="form-control" name="correoelectronico" id="correoelectronico" required>
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
                    <h6 class="text-uppercase text-body text-xs font-weight-bolder">Datos Generales</h6>
                  </div>
                </div>
                <div class="card-body p-3">
                  <div class="row">
                    <div class="input-group-mody input-group-static mb-4 col-sm">
                      <label>Parentesco</label>
                      <input type="text" class="form-control" name="tparentesco" id="tparentesco" required>
                    </div>
                    <div class="input-group-mody input-group-static mb-4 col-sm">
                      <label>Primer apellido</label>
                      <input type="text" class="form-control" name="tape" id="tape" required>
                    </div>
                    <div class="input-group-mody input-group-static mb-4 col-sm">
                      <label>Segundo apellido</label>
                      <input type="text" class="form-control" name="tape2" id="tape2" required>
                    </div>
                    <div class="input-group-mody input-group-static mb-4 col-sm">
                      <label>Nombre</label>
                      <input type="text" class="form-control" name="tnombre" id="tnombre" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-group-mody input-group-static mb-4 col-sm">
                      <label>Fecha de nacimiento</label>
                      <input type="date" id="tfechadenacimiento" name="tfechadenacimiento" class="form-control" required>
                    </div>
                    <div class="input-group-mody input-group-static mb-4 col-sm">
                      <label for="sexoSelect">Sexo</label>
                      <select class="form-control" name="tsexo" id="tsexo" required>
                        <option value="Mujer">Mujer</option>
                        <option value="Hombre">Hombre</option>
                        <option value="Otro">Otro</option>
                      </select>
                    </div>
                    <div class="input-group-mody input-group-static mb-4 col-sm">
                      <label for="testadocivil">Estado civil</label>
                      <select class="form-control" name="testadocivil" id="testadocivil" required>
                        <option value="Soltero(a)">Soltero(a)</option>
                        <option value="Casado(a)">Casado(a)</option>
                        <option value="Unión libre">Unión libre</option>
                        <option value="Separado(a)">Separado(a)</option>
                        <option value="Divorciado(a)">Divorciado(a)</option>
                        <option value="Viudo(a)">Viudo(a)</option>
                      </select>
                    </div>
                    <div class="input-group-mody input-group-static mb-4 col-sm">
                      <label for="tgradodeestudios">Grado de estudios</label>
                      <select class="form-control" name="tgradodeestudios" id="tgradodeestudios" required>
                        <option value="Primaria">Primaria</option>
                        <option value="Secundaria">Secundaria</option>
                        <option value="Media-superior">Media-superior</option>
                        <option value="Superior">Superior</option>
                        <option value="Ninguno">Ninguno</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-group-mody input-group-static mb-4 col-sm">
                      <label>CURP</label>
                      <input type="text" class="form-control" id="tcurp" name="tcurp" required>
                    </div>
                    <div class="input-group-mody input-group-static mb-4 col-sm">
                      <label for="tentidaddenacimiento">Entidad de nacimiento</label>
                      <select class="form-control" name="tentidaddenacimiento" id="tentidaddenacimiento" required>
                        <option value="Ciudad de México">Ciudad de México</option>
                        <option value="México">México</option>
                        <option value="Aguascalientes">Aguascalientes</option>
                        <option value="Baja California">Baja California</option>
                        <option value="Baja California Sur">Baja California Sur</option>
                        <option value="Campeche">Campeche</option>
                        <option value="Chiapas">Chiapas</option>
                        <option value="Chihuahua">Chihuahua</option>
                        <option value="Coahuila">Coahuila</option>
                        <option value="Colima">Colima</option>
                        <option value="Durango">Durango</option>
                        <option value="Guanajuato">Guanajuato</option>
                        <option value="Guerrero">Guerrero</option>
                        <option value="Hidalgo">Hidalgo</option>
                        <option value="Jalisco">Jalisco</option>
                        <option value="Michoacán">Michoacán</option>
                        <option value="Morelos">Morelos</option>
                        <option value="Nayarit">Nayarit</option>
                        <option value="Nuevo León">Nuevo León</option>
                        <option value="Oaxaca">Oaxaca</option>
                        <option value="Puebla">Puebla</option>
                        <option value="Querétaro">Querétaro</option>
                        <option value="Quintana Roo">Quintana Roo</option>
                        <option value="San Luis Potosí">San Luis Potosí</option>
                        <option value="Sinaloa">Sinaloa</option>
                        <option value="Sonora">Sonora</option>
                        <option value="Tabasco">Tabasco</option>
                        <option value="Tamaulipas">Tamaulipas</option>
                        <option value="Tlaxcala">Tlaxcala</option>
                        <option value="Veracruz">Veracruz</option>
                        <option value="Yucatán">Yucatán</option>
                        <option value="Zacatecas">Zacatecas</option>
                        <option value="Otro">Otro</option>
                      </select>
                    </div>
                    <div class="input-group-mody input-group-static mb-4 col-sm">
                      <label>Nacionalidad</label>
                      <input type="text" value="Mexicana" class="form-control" name="tnacionalidad" id="tnacionalidad" required>
                    </div>
                    <div class="input-group-mody input-group-static mb-4 col-sm">
                      <label>Tipo de documento oficial</label>
                      <select class="form-control" id="ttipodedocumento" name="ttipodedocumento" required>
                        <option value="INE" selected>INE</option>
                        <option value="Cartilla">Cartilla</option>
                        <option value="Pasaporte">Pasaporte</option>
                      </select>
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
                      <h6 class="text-uppercase text-body text-xs font-weight-bolder">Dirección</h6>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="checkAddress">
                        <label class="custom-control-label" for="checkAddress">La misma que el alumno</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3" id="parentAddress">
                  <div class="row">
                    <div class="input-group-mody input-group-static mb-4 col-sm-4">
                      <label>Colonia</label>
                      <input type="text" class="form-control" id="tdomicilio1" name="tdomicilio1" required>
                    </div>
                    <div class="input-group-mody input-group-static mb-4 col-sm-4">
                      <label>Código Postal</label>
                      <input type="text" class="form-control" id="tdomicilio2" name="tdomicilio2" required>
                    </div>
                    <div class="input-group-mody input-group-static mb-4 col-sm-4">
                      <label>Localidad</label>
                      <input type="text" class="form-control" id="tdomicilio3" name="tdomicilio3" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-group-mody input-group-static mb-4 col-sm-4">
                      <label>Municipio</label>
                      <input type="text" class="form-control" id="tdomicilio4" name="tdomicilio4" required>
                    </div>
                    <div class="input-group-mody input-group-static mb-4 col-sm-4">
                      <label>Entidad</label>
                      <input type="text" class="form-control" id="tdomicilio5" name="tdomicilio5" required>
                    </div>
                    <div class="input-group-mody input-group-static mb-4 col-sm-4">
                      <label>Referencia</label>
                      <input type="text" class="form-control" id="tdomicilio6" name="tdomicilio6" required>
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
                      <h6 class="text-uppercase text-body text-xs font-weight-bolder">Información de Contacto</h6>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <div class="row">
                    <div class="input-group-mody input-group-static mb-4 col-sm-4">
                      <label>Numero de teléfono (celular o casa)</label>
                      <input type="text" class="form-control" id="ttelefono" name="ttelefono" required>
                    </div>
                    <div class="input-group-mody input-group-static mb-4 col-sm-4">
                      <label>Correo electrónico</label>
                      <input type="email" class="form-control" id="tcorreoelectronico" name="tcorreoelectronico" required>
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
                      <h6 class="text-uppercase text-body text-xs font-weight-bolder">Información Adicional</h6>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <div class="row">
                    <div class="input-group-mody input-group-static mb-4 col-sm-6">
                      <label>Necesidad educativa especial</label>
                      <input type="text" class="form-control" id="tnecesidadespecial" name="tnecesidadespecial" >
                    </div>
                    <div class="input-group-mody input-group-static mb-4 col-sm-6">
                      <label>Herramienta de apoyo</label>
                      <input type="text" class="form-control" id="therramientasdeapoyo" name="therramientasdeapoyo" required>
                    </div>
                    <div class="input-group-mody input-group-static mb-4 col-sm">
                      <label>Situación laboral</label>
                      <input type="text" class="form-control" id="tsituacionlaboral" name="tsituacionlaboral" required>
                    </div>
                    <div class="input-group-mody input-group-static mb-4 col-sm">
                      <label for="isIndigenous">¿Pertenece a un grupo indígena?</label>
                      <select class="form-control" id="isIndigenous" name="isIndigenous" required>
                        <option value="Sí">Sí</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                    <div class="input-group-mody input-group-static mb-4 col-sm" id="indigenousGroup">
                      <label>Grupo indígena</label>
                      <input type="text" class="form-control" id="tgrupoindigena" name="tgrupoindigena" required>
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
          </div>
        </div>
        </form>-->
      </div>
    </div>
    </div>
    <div id="notifications" class="alert container text-white fade show" role="alert"><strong></strong></div>
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
  <script src="../validations/validators.js"></script>
  <script src="../admin/ajax/notifications.js"></script>

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
