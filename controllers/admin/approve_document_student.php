<?php
include_once('../../models/Query.php');
include_once('../../models/db_connection.php');
header('Content-Type: application/json; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post_data = file_get_contents("php://input");
    $request = json_decode($post_data, true);

    if (!isset($request['studentID']) || !isset($request['documentID'])) {
        http_response_code(400); // Código de solicitud incorrecta
        $response = array("success" => false, "message" => "No se encontró el ID del documento");
        die();
    }

    $query = new Query();
    $studentID = $request['studentID'];
    $documentID = $request['documentID'];

    $document_exist = $query->get('documentosaspirantes', [], ["EstudianteId = '$studentID'", "TipoDocumentoId = '$documentID'"]);

    if (empty($document_exist)) {
        http_response_code(400); // Código de solicitud incorrecta
        $response = array("success" => false, "message" => "El documento no existe");
        echo json_encode($response);
        die();
    }

    $connect = new Connect();
    $document_update = $connect->get_query(
        "UPDATE documentosaspirantes
        SET Aprobado = 1
        WHERE EstudianteId = ? AND TipoDocumentoId = ?")->execute([$studentID, $documentID]);
    if ($document_update > 0) {
        http_response_code(201); // Código de respuesta exitosa
        $response = array("success" => true, "message" => "El documento fue aprobado correctamente.");
        echo json_encode($response);
        die();
    }
}else{
    header('location: ../../admin/lista-alumnos.php');
    die();
}