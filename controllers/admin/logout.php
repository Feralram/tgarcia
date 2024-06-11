<?php
header('Content-Type: application/json; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    session_start();

    if (isset($_SESSION['Id'])) {
        // Borra todas las variables de sesión
        $_SESSION = array();

        // Destruye la sesión
        session_destroy();
        http_response_code(200);
        $response = array("success" => true, "message" => "Cerrando sesión...");
        echo json_encode($response);
    } else {
        http_response_code(401);
        $response = array("success" => false, "message" => "Usuario no autenticado.");
        echo json_encode($response);
    }
}