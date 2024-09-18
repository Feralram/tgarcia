<?php
// init.php

// Función para verificar si la sesión está activa
function verificarSesionIniciada() {
    if (!isset($_SESSION['usuario_id'])) {
        header('Location: ../index.html');
        exit();
    }
}

// Llamar a la función para verificar la sesión
verificarSesionIniciada();
