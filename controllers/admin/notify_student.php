<?php
include_once('../../models/db_connection.php');
include_once('../../PHPMailer/mail.php');
header('Content-Type: application/json; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post_data = file_get_contents("php://input");
    $request = json_decode($post_data, true);

    if(!isset($request['comments']) || !isset($request['studentID'])) {
        http_response_code(400);
        $response = array("message" => "Datos incompletos");
        echo json_encode($response);
        return;
    }

    $connect = new Connect();
    $studentID = $request['studentID'];
    $comments = $request['comments'];
    $student_data = "
        SELECT st.nombre as name, st.correoElectronico as email, tut.correoElectronico as tutorEmail
        FROM aspirantes st
        INNER JOIN tutores tut ON st.Id = tut.IdAlumno
        WHERE st.Id = :studentID;
    ";
    $documents_data = "SELECT GROUP_CONCAT(NombreDocumento SEPARATOR ', ') as Nombre
                        FROM documentosaspirantes
                        WHERE EstudianteId = '$studentID' AND ISNULL(Aprobado);";
    try {
        $smtp = $connect->get_query($student_data);
        $smtp->bindParam(':studentID', $studentID, PDO::PARAM_STR);
        $smtp->execute();
        $result = $smtp->fetch(PDO::FETCH_ASSOC);
        //Valida que el estudiante haya llenado su perfil
        if (!isset($result['email'])) {
            http_response_code(404);
            $response = array("message" => "El alumno aún no ha llenado su perfil, por lo que no se cuenta con su correo electrónico.");
            echo json_encode($response);
            return;
        }
        $student_name = $result['name'];
        $student_email = $result['email'];
        $tutor_email = $result['tutorEmail'];

        //Obtiene los nombres de los documentos
        $smtp = $connect->get_query($documents_data);
        $smtp->execute();
        $result = $smtp->fetch(PDO::FETCH_ASSOC);
        //Valida que haya documentos por notificar al estudiante
        if ($result['Nombre'] == null) {
            http_response_code(404);
            $response = array("message" => "No se encontraron documentos por notificar al estudiante.");
            echo json_encode($response);
            return;
        }

        $documents_names = $result['Nombre'];

        sendStudentEmail($student_name, $student_email, $tutor_email, $documents_names, $comments);
        http_response_code(200);
        $response = array("success" => true, "message" => "Se notificó al estudiante $student_name");
        echo json_encode($response);
    } catch (Exception $e) {
        http_response_code(404);
        $response = array("message" => "$e");
        echo json_encode($response);
        return;
    }

}