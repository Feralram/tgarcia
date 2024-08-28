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
                'km_adicionales' => $datoscoti['km_adicionales'],
                'comentarios' => $datoscoti['comentarios']
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
            
        case 'insertarFactura':
            $input = file_get_contents('php://input');
            $data = json_decode($input, true);
            // Obtener los datos del JSON
            $factura = $data['factura'];
            $fecha_fac = $data['fecha_fac'];
            $precio_base = $data['precio_base'];
            $iva = $data['iva'];
            $retencion = $data['Retención'];
            $precio_final = $data['precio_final'];
            $razonSocial = $data['razonSocial'];
            $contact_cliente = $data['contact_cliente'];
            $servicio = $data['servicio'];
            $referencia = $data['referencia'];
            $complemento = $data['complemento'];
            $fecha_pag = $data['fecha_pag'];
            $observacion = $data['observacion'];
            $fecha_envio = $data['fecha_envio'];
            $documento = $data['documento'];
            $portal_nip = $data['portal_nip'];
            $idservicio = $data['idservicio'];


            $resultado  = $usuario->insertarFactura($factura, $fecha_fac, $precio_base, $iva, $retencion, $precio_final, $razonSocial, $contact_cliente, $servicio, $referencia, $complemento, $fecha_pag, $observacion, $fecha_envio, $documento, $portal_nip, $idservicio);

            if ($resultado) {
                echo json_encode(['success' => true, 'message' => 'Factura insertada con éxito']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error al insertar la factura']);
            }

            break;

        case 'updateCotizacion':
            $km_extras = $request['km_extras'];
            $total = $request['total'];
            $id = $request['id'];
            $comentarios = $request['comentarios'];
            $resultado = $usuario->updateCotizacion($id, $km_extras, $total,$comentarios);

            if ($resultado['success']) {
                http_response_code(200);
                echo json_encode(['success' => true, 'message' => $resultado['message']]);
            } else {
                http_response_code(400);
                echo json_encode(['success' => false, 'message' => $resultado['message']]);
            }
            break;

        case 'updateServicio':
            $unidad = $request['unidad'];
            $operador = $request['operador'];
            $id = $request['id'];            
            $resultado = $usuario->updateServicio($id, $unidad,$operador);

            if ($resultado['success']) {
                http_response_code(200);
                echo json_encode(['success' => true, 'message' => $resultado['message']]);
            } else {
                http_response_code(400);
                echo json_encode(['success' => false, 'message' => $resultado['message']]);
            }
            break;
            case 'updateFactura':
                $complemento = $request['complemento'];
                $fecha_pago = $request['fecha_pago'];
                $id = $request['id'];            
                $resultado = $usuario->updateFactura($id, $complemento,$fecha_pago);
    
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

            case 'procesarFactura':
                $id_factura = $request['id_factura'];
                $valorRespuesta = $request['valorRespuesta'];

                // Llama al modelo para procesar la factura con la respuesta
                $resultado = $usuario->procesarFactura($id_factura, $valorRespuesta);

                if ($resultado) {
                    echo json_encode(['success' => true]);
                } else {
                    echo json_encode(['success' => false]);
                }
                break;

            case 'terminarFactura':
                $id = $request['id'];
                $resultado = $usuario->terminarFactura($id);
    
                if ($resultado) {
                    http_response_code(200);
                    echo json_encode([
                        'success' => true,
                        '' => $resultado // Devolvemos el ID específico de la cotización
                    ]);
                } else {
                    http_response_code(500);
                    echo json_encode(['success' => false, 'message' => 'Error.']);
                }
                break;

            case 'eliminarFactura':
                $id_factura = $request['id_factura'];
                $comentario = isset($request['comentario']) ? $request['comentario'] : '';
            
                // Llamada al método del modelo para eliminar la factura con comentario
                $resultado = $usuario->eliminarFactura($id_factura, $comentario);
            
                if ($resultado) {
                    http_response_code(200);
                    echo json_encode(['success' => true, 'message' => 'Factura eliminada con éxito']);
                } else {
                    http_response_code(500);
                    echo json_encode(['success' => false, 'message' => 'Error al eliminar la factura']);
                }
            
                break;
            

        case 'altaservicio':
            $datosServi = $request['datos'];

            $data = [
                'lista_reco' => $datosServi['lista_reco'],
                'fecha_recoleccion' => $datosServi['fecha_recoleccion'],
                'servicio' => $datosServi['servicio'],
                'unidad' => $datosServi['unidad'],
                'origen_destino' => $datosServi['origen_destino'],
                'unid_factura' => $datosServi['unid_factura'],
                'local_foranea' => $datosServi['local_foranea'],
                'sello' => $datosServi['sello'],
                'operador' => $datosServi['operador'],
                'texto_operador' => $datosServi['texto_operador'],
                'ejecutivo' => $datosServi['ejecutivo'],
                'referencia' => $datosServi['referencia'],
                'bultos' => $datosServi['bultos'],
                'doc_fiscal' => $datosServi['doc_fiscal'],
                'costo' => $datosServi['costo'],
                'factura' => $datosServi['factura'],
                'candados' => $datosServi['candados'],
                'fecha_ingreso' => $datosServi['fecha_ingreso'],
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

            case 'guardarCotizacionAdicional':
                // Decodificar el JSON recibido
                $requestData = json_decode(file_get_contents('php://input'), true);
                
                // Extraer los datos del array 'datos'
                $cliente = $requestData['datos']['cliente'];
                $origen = $requestData['datos']['origen'];
                $destino = $requestData['datos']['destino'];
                $codigo_postal = $requestData['datos']['codigo_postal'];
                $peso = $requestData['datos']['peso'];
                $dimension = $requestData['datos']['dimension'];
                $precio = $requestData['datos']['precio'];
                $num_bultos = $requestData['datos']['num_bultos'];
            
                // Llamada al método del modelo para guardar la cotización adicional
                $resultado = $usuario->guardarCotizacionAdicional($cliente, $origen, $destino, $codigo_postal, $peso, $dimension, $precio, $num_bultos);
            
                // Responder según el resultado de la operación
                if ($resultado) {
                    http_response_code(200);
                    echo json_encode([
                        'success' => true,
                        'message' => 'Cotización guardada con éxito',
                        'redirectUrl' => 'lista-adicionales.php' // URL de redirección
                    ]);
                } else {
                    http_response_code(500);
                    echo json_encode(['success' => false, 'message' => 'Error al guardar la cotización']);
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