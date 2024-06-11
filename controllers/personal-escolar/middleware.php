<?php
// Inicia la sesión (si no está iniciada)
session_start();

// Verifica si el usuario no ha iniciado sesión
if (!isset($_SESSION['correoPescolar'])) {
    // Redirige al usuario a la página de inicio de sesión
    header('Location: ../personal-escolar/iniciar-sesion.html');
    exit; // Detiene la ejecución del script
}

if ($_SERVER['REQUEST_URI'] == '/personal-escolar/perfil.php' && $_SESSION['ComentarioPescolar'] == 'None') {
    header('Location: ../personal-escolar/documentos.php');
    exit;
}