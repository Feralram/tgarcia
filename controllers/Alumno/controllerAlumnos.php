<?php

include_once('../../models/Alumno.php');
session_start();

// $accion = $_POST['accion'];
$request = json_decode(file_get_contents('php://input'), true);
$alumno = new Alumno();

if (isset($request)) {
    $accion = $request['accion'];

    switch ($accion){
        case 1:
            if($alumno->validarInicioSesion($request['curp'],$request['folio'])){
                $curp = $request['curp'];

                $_SESSION['curpAlumno'] = $curp;

                // header('Location: ../../alumnos/perfil.php');
                http_response_code(200);
                $response = array("success" => true, "message" => "Iniciando sesión.");
                echo json_encode($response);
                die();
            }else{
                http_response_code(404);
                $response = array("success" => false, "message" => "Puede que el usuario no este registrado en la base de datos.");
                echo json_encode($response);
                die();
                // header('Location: ../../alumnos/iniciar-sesion.html');
            } 
    
            break;
    
        case 2:
         
            $domicilioCorregido = $request['alumno']['street'] . ", " . $request['alumno']['other'] . ", " . $request['alumno']['another'] . ", " . $request['alumno']['suburb'] . ", " . $request['alumno']['zipCode'] . ", "	. $request['alumno']['locality'] . ", " . $request['alumno']['municipality'] . ", " . $request['alumno']['state'] . ", " . $request['alumno']['reference'];
            $tdomicilioCorregido = $request['tutor']['suburb'] . ", " . $request['tutor']['zipCode'] . ", " . $request['tutor']['locality'] . ", " . $request['tutor']['municipality'] . ", " . $request['tutor']['state'] . ", " . $request['tutor']['reference'];
            $tnombreCorregido = $request['tutor']['name'] . ", " . $request['tutor']['surname'] . ", " . $request['tutor']['secondS'];

            $alumno->actualizarDatos($_SESSION['IdAlumno'],$request['alumno']['bDate'], $request['alumno']['age'], 
            $request['alumno']['months'], $request['alumno']['weight'], $request['alumno']['glasses'], $request['alumno']['record'], $request['alumno']['vaccines'],
            $request['alumno']['orthopedic'], $request['alumno']['sex'], $request['alumno']['nationality'], $request['alumno']['entity'], $domicilioCorregido,
            $request['alumno']['phone'], $request['alumno']['email'], $request['tutor']['relationship'], 
            $tnombreCorregido, $request['tutor']['bDate'], $request['tutor']['sex'], $request['tutor']['civilStatus'],
            $request['tutor']['studyGrade'], $request['tutor']['curp'], $request['tutor']['nationality'], $request['tutor']['entity'],
            $request['tutor']['typeDocument'], $tdomicilioCorregido, $request['tutor']['phone'], $request['tutor']['email'], $request['tutor']['specialEduc'], $request['tutor']['supportTool'],$request['tutor']['indigenous'], $request['tutor']['laboralStat'] );
            break;
    
        case 3:
    
            $alumno->documentosAlumnos($_SESSION['IdAlumno'], $_SESSION['curpAlumno']);
    
            break;
    
        default:
    
    
    }
    
} elseif(isset($_POST['accion'])){
    $acc = $_POST['accion'];
    switch ($acc) {
        case 3:
            $alumno->documentosAlumnos($_SESSION['IdAlumno'], $_SESSION['curpAlumno']);
            break;
        
        default:
            # code...
            // break;
    }

}else {
    
    switch ($_REQUEST['accion']) {    
        case 0:
            $alumno->CerrarSesion();
            break;
    
        case 1:
            $alumno->EliminarDocumentoAlumno($_REQUEST['AlumnoId'],$_REQUEST['Tipo']);
            break;     
            
        case 2:
            $alumno->EliminarAlumno($_REQUEST['id']);
            break; 
        
        default:
            # code...
            break;
    }


}


?>
