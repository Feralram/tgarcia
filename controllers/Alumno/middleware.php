<?php
// // Inicia la sesión (si no está iniciada)
// session_start();

// // Verifica si el usuario no ha iniciado sesión
// if (!isset($_SESSION['curpAlumno'])) {
//     // Redirige al usuario a la página de inicio de sesión
//     header('Location: ../alumnos/iniciar-sesion.html');
//     exit; // Detiene la ejecución del script
// }

// if ($_SERVER['REQUEST_URI'] == '/alumnos/perfil.php' && $_SESSION['ComentarioAlumno'] == 'None') {
//     header('Location: ../alumnos/documentos.php');
//     exit;
// }

// if ($_SERVER['REQUEST_URI'] == '/alumnos/documentos.php' && $_SESSION['DocumentosAlumno'] == false) {
//     header('Location: ../alumnos/perfil-completado.php');
//     exit;
// }
