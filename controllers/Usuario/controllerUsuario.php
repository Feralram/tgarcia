<?php

include_once('../../models/Usuario.php');
session_start();

// $accion = $_POST['accion'];
$request = json_decode(file_get_contents('php://input'), true);
$usuario = new Usuario();

if (isset($request)) {
    $accion = $request['accion'];

    $resultado = $usuario->validarInicioSesion($request['usu'],$request['psw']);

    if($resultado['success']){
        $usu = $request['usu'];

        $_SESSION['usu'] = $usu;

        // header('Location: ../../alumnos/perfil.php');
        http_response_code(200);
        $response = array("success" => $resultado['success'], "message" => "Iniciando sesión.", "tipouser" => $resultado['data']);
        echo json_encode($response);
        die();
    }else{
        http_response_code(404);
        $response = array("success" => false, "message" => "Puede que el usuario no este registrado en la base de datos.");
        echo json_encode($response);
        die();
        // header('Location: ../../alumnos/iniciar-sesion.html');
    }
    
}else{
    switch ($_REQUEST['accion']) {    
        case 0:
            $usuario->CerrarSesion();
            break;
    }
}


?>
