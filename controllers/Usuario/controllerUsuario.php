<?php

include_once('../../models/Usuario.php');
session_start();

// $accion = $_POST['accion'];
$request = json_decode(file_get_contents('php://input'), true);
$usuario = new Usuario();

if (isset($request)) {

    switch ($request['accion']) {
        
        case 'obtenerDimensionesGen':
            $idOrigen = $request['idOrigen'];
            $dimensiones = $usuario->obtenerDimensionesGen($idOrigen);

            http_response_code(200);
            echo json_encode($dimensiones);
            break;
        case 'obtenerDimensionesCom':
            $idOrigen = $request['idOrigen'];
            $dimensiones = $usuario->obtenerDimensionesCom($idOrigen);

            http_response_code(200);
            echo json_encode($dimensiones);
            break;
        case 'obtenerDimensionesComRefri':
            $idOrigen = $request['idOrigen'];
            $dimensiones = $usuario->obtenerDimensionesComRefri($idOrigen);

            http_response_code(200);
            echo json_encode($dimensiones);
            break;

        case 'obtenerDimensionesProexi':
            $idOrigen = $request['idOrigen'];
            $dimensiones = $usuario->obtenerDimensionesProexi($idOrigen);

            http_response_code(200);
            echo json_encode($dimensiones);
            break;
        case 'obtenerTarifarioGeneral':
            $tarifagen = $usuario->obtenerTarifarioGeneral();

            http_response_code(200);
            echo json_encode($tarifagen);
            break;

        case 'obtenerTarifarioComun':
            $tarifagen = $usuario->obtenerTarifarioComun();

            http_response_code(200);
            echo json_encode($tarifagen);
            break;   
            
        case 'obtenerTarifarioComunRefri':
            $tarifagen = $usuario->obtenerTarifarioComunRefri();

            http_response_code(200);
            echo json_encode($tarifagen);
            break; 

        case 'obtenerTarifarioProexi':
            $tarifagen = $usuario->obtenerTarifarioProexi();

            http_response_code(200);
            echo json_encode($tarifagen);
            break;
            
        case 'insertarYRedirigir':
            $servicioId = $_POST['servicioId'];
            
            // Insertar en la base de datos (reemplaza con tu lógica de inserción)
            $data = [
                'servicioId' => $servicioId,
                'otro_campo' => 'valor_predeterminado' // Reemplaza con los datos necesarios
            ];
            
            $id = $usuario->insertaFactura($data); // Usa tu método de inserción adecuado

            if ($id) {
                // Redirigir después del insert
                header("Location: form-registroFact.php?servicioId=" . $servicioId);
                exit();
            } else {
                echo "Error al insertar en la base de datos.";
            }
            break; 
        
        case 'altacotizacion':
            $datoscoti = $request['datos'];

            $data = [
                'cliente' => $datoscoti['cliente'],
                'tarifario' => $datoscoti['tarifario'],
                'origen' => $datoscoti['origen'],
                'codigo_postal' => $datoscoti['codigo_postal'],
                'peso' => $datoscoti['peso'],
                'dimension' => $datoscoti['dimension'],
                'precio' => $datoscoti['precio'],
                'num_bultos' => $datoscoti['num_bultos'],
                'texto_dimension' => $datoscoti['texto_dimension'],
                'texto_origen' => $datoscoti['texto_origen'],
                'km_adicionales' => $datoscoti['km_adicionales']
            ];

            $id = $usuario->insertarCotizacion($data);
            

            if ($id) {
                http_response_code(200);
                echo json_encode([
                    'success' => true,
                    'cotizacionId' => $id // Devolvemos el ID específico de la cotización
                ]);
            } else {
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => 'Error al guardar la cotización.']);
            }

            break;

        case 'updateCotizacion':
            $km_extras = $request['km_extras'];
            $total = $request['total'];
            $id = $request['id'];
            $resultado = $usuario->updateCotizacion($id, $km_extras, $total);

            if ($resultado['success']) {
                http_response_code(200);
                echo json_encode(['success' => true, 'message' => $resultado['message']]);
            } else {
                http_response_code(400);
                echo json_encode(['success' => false, 'message' => $resultado['message']]);
            }
            break;
        case 'terminarCotizacion':
            $id = $request['id'];
            $resultado = $usuario->terminarCotizacion($id);

            if ($resultado) {
                http_response_code(200);
                echo json_encode([
                    'success' => true,
                    'cotizacionId' => $resultado // Devolvemos el ID específico de la cotización
                ]);
            } else {
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => 'Error.']);
            }
            break;

        case 'altaservicio':
            $datosServi = $request['datos'];

            $data = [
                'lista_reco' => $datosServi['lista_reco'],
                'fecha_recoleccion' => $datosServi['fecha_recoleccion'],
                'cliente' => $datosServi['cliente'],
                'unidad' => $datosServi['unidad'],
                'origen_destino' => $datosServi['origen_destino'],
                'unid_factura' => $datosServi['unid_factura'],
                'local_foranea' => $datosServi['local_foranea'],
                'sello' => $datosServi['sello'],
                'operador' => $datosServi['operador'],
                'texto_operador' => $datosServi['texto_operador'],
                'cliente_solicita' => $datosServi['cliente_solicita'],
                'referencia' => $datosServi['referencia'],
                'bultos' => $datosServi['bultos'],
                'doc_fiscal' => $datosServi['doc_fiscal'],
                'costo' => $datosServi['costo'],
                'factura' => $datosServi['factura'],
                'candados' => $datosServi['candados'],
                'observaciones' => $datosServi['observaciones'],
                'idcoti' => $datosServi['idcoti'],
            ];

            $id = $usuario->insertaServicio($data);
            

            if ($id) {
                http_response_code(200);
                echo json_encode([
                    'success' => true,
                    'servicioId' => $id // Devolvemos el ID específico de la cotización
                ]);
            } else {
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => 'Error al guardar el servicio.']);
            }

            break;

            

        default:
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
    } 

    
    
}else{
    switch ($_REQUEST['accion']) {    
        case 'cerrarSesion':
            $usuario->CerrarSesion();
            break;            
    }
}






