<?php
include_once('../../models/Query.php');
header('Content-Type: application/json; charset=UTF-8');
// header("X-debug-Response: Ola k ase*******************");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lee los datos JSON enviados desde la solicitud
    $post_data = file_get_contents("php://input");
    $request = json_decode($post_data, true);

    // Validar los datos
    if (!isset($request['nombre']) || !isset($request['folio']) || !isset($request['curp'])) {
        http_response_code(400); // Código de solicitud incorrecta
        $response = array("success" => false, "message" => "Datos incompletos");
        echo json_encode($response);
        return;
    }

    $query = New Query();
    // Recupera los datos de la solicitud JSON
    $nombre = $request['nombre'];
    $folio = $request['folio'];
    $curp = $request['curp'];

    // Verificar la existencia del folio
    $folio_exist = $query->get('aspirantes', [], ["folio = '$folio'"]);

    if (!empty($folio_exist)) {
        http_response_code(409); // Recurso ya existente
        $response = array("success" => false, "message" => "El folio ingresado ya existe en la base de datos");
        echo json_encode($response);
        die();
    }

    // Verificar la existencia del CURP
    $curp_exist = $query->get('aspirantes', [], ["curp = '$curp'"]);

    if (!empty($curp_exist)) {
        http_response_code(409); // Recurso ya existente
        $response = array("success" => false, "message" => "El CURP ingresado ya existe en la base de datos");
        echo json_encode($response);
        die();
    }

    // Realiza la inserción en la base de datos
    $fieldsValues = [
        "folio" => $folio,
        "curp" => $curp,
        "nombre" => $nombre,
    ];

    $insertedRows = $query->insert('aspirantes', $fieldsValues);

    if ($insertedRows > 0) {
        http_response_code(201); // Código de respuesta exitosa
        $response = array("success" => true, "message" => "Alumno registrado con éxito!");
        echo json_encode($response);
    } else {
        http_response_code(500); // Código de error del servidor
        $response = array("success" => false, "message" => "Error al registrar al alumno");
        echo json_encode($response);
    }

} else {
    // La solicitud no es POST, puede redirigir o responder como sea necesario
    header('Location: ../../admin/crear-alumno.php');
}