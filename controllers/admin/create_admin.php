<?php
include_once('../../models/Query.php');
header('Content-Type: application/json; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lee los datos JSON enviados desde la solicitud
    $post_data = file_get_contents("php://input");
    $request = json_decode($post_data, true);

    if (!isset($request['name']) || !isset($request['email']) || !isset($request['password']) ) {
        http_response_code(400); // Código de solicitud incorrecta
        $response = array("success" => false, "message" => "Datos incompletos");
        echo json_encode($response);
        return;
    }

    $query = New Query();
    // Recupera los datos de la solicitud JSON
    $name = $request['name'];
    $email = $request['email'];
    $password = password_hash($request['password'], PASSWORD_DEFAULT);

    // Verificar la existencia del correo
    $email_exist = $query->get('administradores', [], ["correo = '$email'"]);

    if (!empty($email_exist)) {
        http_response_code(409); // Recurso ya existente
        $response = array("success" => false, "message" => "El correo electrónico ingresado ya existe en la base de datos");
        echo json_encode($response);
        die();
    }

    // Realiza la inserción en la base de datos
    $fieldsValues = [
        "nombre" => $name,
        "correo" => $email,
        "psw"    => $password
    ];

    $insertedRows = $query->insert('administradores', $fieldsValues);

    if ($insertedRows > 0) {
        http_response_code(201); // Código de respuesta exitosa
        $response = array("success" => true, "message" => "Administrador registrado con éxito!");
        echo json_encode($response);
    } else {
        http_response_code(500); // Código de error del servidor
        $response = array("success" => false, "message" => "Error al registrar al administrador");
        echo json_encode($response);
    }

} else {
    // La solicitud no es POST, puede redirigir o responder como sea necesario
    header('Location: ../../admin/create-admin.php');
}