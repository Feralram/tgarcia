<?php
include_once('../../models/Query.php');
header('Content-Type: application/json; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lee los datos JSON enviados desde la solicitud
    $post_data = file_get_contents("php://input");
    $request = json_decode($post_data, true);

    $query = New Query();
    // Recupera los datos de la solicitud JSON
    $email = $request['email'];
    $password = $request['password'];

    // Verificar la existencia del folio
    $user = $query->get('administradores', [], ["correo = '$email'"]);

    if(!isset($user[0])) {
        http_response_code(409); // Recurso ya existente
        $response = array("success" => false, "message" => "El correo electrónico no se encuentra registrado.", "user" => False);
        echo json_encode($response);
        die();
    }

    $hash = $user[0]['Psw'];
    // Verificar la validez del hash
    if (password_needs_rehash($hash, PASSWORD_DEFAULT)) {
        http_response_code(409); // Recurso ya existente
        $response = array("success" => false, "message" => "Hubo un error al iniciar sesión.", "user" => False);
        echo json_encode($response);
        die();
    }

    $verify = password_verify($password, $hash);

    if (!$verify) {
        http_response_code(409); // Recurso ya existente
        $response = array("success" => false, "message" => "Contraseña incorrecta.", "user" => False);
        echo json_encode($response);
        die();
    }
    unset($user['0']['Psw']);
    session_start();
    $_SESSION['Id'] = $user['0']['Id'];
    $_SESSION['Nombre'] = $user['0']['Nombre'];
    $response = array("success" => true, "message" => "Iniciando sesión...", "user" => $user['0']);
    echo json_encode($response);
    die();
}