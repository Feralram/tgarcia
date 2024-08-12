<?php
// Mostrar todos los errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once('db_connection.php');


class Usuario extends Connect {


    // Método para validar el inicio de sesión
    public function validarInicioSesion($usu, $psw) {
        $usu = $this->conexion->real_escape_string($usu); // Evita SQL Injection
        $psw = $this->conexion->real_escape_string($psw); // Evita SQL Injection

        $query = "SELECT usuario.Nombre, usuario.ApellidoP, usuario.ApellidoM, usuario.Usu_id, usuario.Puesto_id, puestos.Nombre as Puesto
        FROM usuario 
        INNER JOIN puestos 
        ON usuario.Puesto_id = puestos.Puesto_id
        WHERE Usuario = '$usu' 
        AND psw = '$psw' 
        ";

        $resultado = $this->conexion->query($query);

        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();

            $this->almacenarDatosEnSesion($fila);
            // $this->validarAccesoDocumentos($fila['Id']);
            // Usuario válido
            return [
                'success' => true,
                'data' => $fila['Puesto_id']
            ];
        } else {
            // Usuario inválido
            return [
                'success' => false               
            ];
        }
    }

    private function almacenarDatosEnSesion($fila) {
        $ncompleto = $fila['Nombre'].' '.$fila['ApellidoP'].' '.$fila['ApellidoM'];
        $_SESSION['IdUsu'] = $fila['Usu_id'];
        $_SESSION['NombreUsu'] = $ncompleto;
        $_SESSION['PuestoUsu'] = $fila['Puesto'];

    }

    public function obtenerUnidades() {
        $query = "SELECT Eco, Placas, Marca, Unidad, Peso, Tipo, Modelo, No_Serie, Color FROM unidades ORDER BY Uni_id ASC";
        $resultado = $this->conexion->query($query);

        $unidades = array();
        while ($fila = $resultado->fetch_assoc()) {
            $unidades[] = $fila;
        }

        return $unidades;
    }

    public function obtenerOperadores() {
        $query = "SELECT Id, Nombre_completo, Nacionalidad, Edad, Sexo, EstadoCivil, Licencia,
        Vigencia, Tipo, Celular, Curp, Rfc, Domicilio_actual, Domicilio_constancia, Delegacion, CP,
        TipoTrabajador, Fecha_ingreso, Puesto, Descripcion, LugardeTrabajo, DuraciondelaJornada,
        Forma_pago, DiasPago, DiasDescanso, Beneficiarios, NSS, FechaNacimiento,
        CASE
        WHEN Activo = 1 THEN 'Activo' ELSE 'Inactivo'
        END AS Eactivo
        FROM operadores
        WHERE Activo = 1 
        ORDER BY Id ASC";
        $resultado = $this->conexion->query($query);

        $operadores = array();
        while ($fila = $resultado->fetch_assoc()) {
            $operadores[] = $fila;
        }

        return $operadores;
    }

    public function obtenerCotizaciones() {
        $query = "SELECT *
        FROM cotizaciones
        WHERE status = 1
        ORDER BY id_cotizacion ASC";
        $resultado = $this->conexion->query($query);

        $operadores = array();
        while ($fila = $resultado->fetch_assoc()) {
            $operadores[] = $fila;
        }

        return $operadores;
    }

    public function eliminarFactura($id_factura, $comentario) {
        $query = "UPDATE facturas SET activa = 0, comentario_eliminacion = ? WHERE id_factura = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param('si', $comentario, $id_factura);
    
        return $stmt->execute();
    }
    

    public function obtenerFacturas() {
        $query = "SELECT fc.*
        FROM facturas fc  
        INNER JOIN servicios sv ON sv.id_servicio = fc.id_servicio
        WHERE sv.lista != 'Lista Xcf' AND activa = 1
        ORDER BY fc.id_servicio ASC";
        $resultado = $this->conexion->query($query);

        $operadores = array();
        while ($fila = $resultado->fetch_assoc()) {
            $operadores[] = $fila;
        }

        return $operadores;
    }

    public function obtenerFacturasOtro() {
        $query = "SELECT *
        FROM facturas  
        INNER JOIN servicios ON servicios.id_servicio = facturas.id_servicio
        WHERE servicios.lista = 'Lista Xcf'
        ORDER BY facturas.id_servicio ASC";
        $resultado = $this->conexion->query($query);

        $operadores = array();
        while ($fila = $resultado->fetch_assoc()) {
            $operadores[] = $fila;
        }

        return $operadores;
    }

    public function obtenerServicios($fechaInicio = null, $fechaFin = null) {
        $fechaCondicion = "";
        if ($fechaInicio && $fechaFin) {
            $fechaCondicion = "AND servicios.fecha_creacion >= '" . $this->conexion->real_escape_string($fechaInicio) . "' AND servicios.fecha_creacion <= '" . $this->conexion->real_escape_string($fechaFin) . "'";
        }
        
    
        $query = "SELECT *
            FROM servicios  
            INNER JOIN operadores ON servicios.id_operador = operadores.id
            INNER JOIN unidades ON servicios.unidad = unidades.Uni_id
            INNER JOIN cotizaciones ON servicios.id_cotizacion = cotizaciones.id_cotizacion
            INNER JOIN clientes ON cotizaciones.cliente = clientes.id_cliente
            WHERE lista != 'Lista Xcf' $fechaCondicion
            ORDER BY id_servicio ASC";
        $resultado = $this->conexion->query($query);
    
        $servicios = array();
        while ($fila = $resultado->fetch_assoc()) {
            $servicios[] = $fila;
        }
    
        return $servicios;
    }
    
    public function obtenerServiciosXcf($fechaInicio = null, $fechaFin = null) {
        $fechaCondicion = "";
        if ($fechaInicio && $fechaFin) {
            $fechaCondicion = "AND servicios.fecha_creacion BETWEEN '" . $this->conexion->real_escape_string($fechaInicio) . "' AND '" . $this->conexion->real_escape_string($fechaFin) . "'";
        }
    
        $query = "SELECT *
            FROM servicios  
            INNER JOIN operadores ON servicios.id_operador = operadores.id
            INNER JOIN unidades ON servicios.unidad = unidades.Uni_id
            INNER JOIN cotizaciones ON servicios.id_cotizacion = cotizaciones.id_cotizacion
            INNER JOIN clientes ON cotizaciones.cliente = clientes.id_cliente
            WHERE lista = 'Lista Xcf' $fechaCondicion
            ORDER BY id_servicio ASC";
        $resultado = $this->conexion->query($query);
    
        $servicios = array();
        while ($fila = $resultado->fetch_assoc()) {
            $servicios[] = $fila;
        }
    
        return $servicios;
    }
    


    public function CerrarSesion(){
                // Lógica para cerrar la sesión (por ejemplo, cuando el usuario hace clic en "Cerrar sesión")
        if (isset($_SESSION['usu'])) {
            // Borra todas las variables de sesión
            $_SESSION = array();

            // Invalida la cookie de sesión actual (si existe)
            if (isset($_COOKIE[session_name()])) {
                setcookie(session_name(), '', time() - 3600, '/');
            }

            // Destruye la sesión
            session_destroy();

            // Redirige a la página de inicio de sesión o a donde desees
            header('Location: ../../index.html');
        } else {
            // Si el usuario no estaba autenticado, redirige a una página de inicio de sesión
            header('Location: ../../index.html');
        }
    }

    public function obtenerDimensionesGen($idOrigen) {
        $idOrigen = $this->conexion->real_escape_string($idOrigen); // Evita SQL Injection

        $query = "SELECT Id_tarifagen, 'Nissan16' AS tipo_unidad, Nissan_16 AS monto FROM tarifario_general WHERE Id_tarifagen = '$idOrigen'
        UNION ALL
        SELECT Id_tarifagen, '3.517' AS tipo_unidad, 3_517 AS monto FROM tarifario_general WHERE Id_tarifagen = '$idOrigen'
        UNION ALL
        SELECT Id_tarifagen, 'Rabon18' AS tipo_unidad, Rabon18 AS monto FROM tarifario_general WHERE Id_tarifagen = '$idOrigen'
        UNION ALL
        SELECT Id_tarifagen, 'Torton6' AS tipo_unidad, Thorton6 AS monto FROM tarifario_general WHERE Id_tarifagen = '$idOrigen'
        UNION ALL
        SELECT Id_tarifagen, 'Trailer19' AS tipo_unidad, Trailer19 AS monto FROM tarifario_general WHERE Id_tarifagen = '$idOrigen'
        ORDER BY Id_tarifagen, tipo_unidad;";
        $statement = $this->conexion->prepare($query);
        
        $dimensiones = [];
        if ($statement->execute()) {
            $result = $statement->get_result();
            while ($row = $result->fetch_assoc()) {
                $dimensiones[] = $row;
            }
        } else {
            die("Error al obtener dimensiones: " . $this->conexion->error);
        }
        
        $statement->close();
        return $dimensiones;
    }
    // Método para obtener las dimensiones según el ID de origen seleccionado
    public function obtenerDimensionesCom($idOrigen) {
        $idOrigen = $this->conexion->real_escape_string($idOrigen); // Evita SQL Injection

        $query = "SELECT id_tarifacom, '1.5 Ton' AS tipo_unidad, 1_5ton AS monto FROM tarifario_comunes WHERE id_tarifacom = '$idOrigen'
        UNION ALL
        SELECT id_tarifacom, '3.5 Ton' AS tipo_unidad, 3_5ton AS monto FROM tarifario_comunes WHERE id_tarifacom = '$idOrigen'
        UNION ALL
        SELECT id_tarifacom, 'Rabon' AS tipo_unidad, rabon AS monto FROM tarifario_comunes WHERE id_tarifacom = '$idOrigen'
        UNION ALL
        SELECT id_tarifacom, 'Torton' AS tipo_unidad, torton AS monto FROM tarifario_comunes WHERE id_tarifacom = '$idOrigen'
        UNION ALL
        SELECT id_tarifacom, 'Trailer' AS tipo_unidad, trailer AS monto FROM tarifario_comunes WHERE id_tarifacom = '$idOrigen'
        ORDER BY id_tarifacom, tipo_unidad;";
        $statement = $this->conexion->prepare($query);
        
        $dimensiones = [];
        if ($statement->execute()) {
            $result = $statement->get_result();
            while ($row = $result->fetch_assoc()) {
                $dimensiones[] = $row;
            }
        } else {
            die("Error al obtener dimensiones: " . $this->conexion->error);
        }
        
        $statement->close();
        return $dimensiones;
    }

    public function obtenerDimensionesComRefri($idOrigen) {
        $idOrigen = $this->conexion->real_escape_string($idOrigen); // Evita SQL Injection

        $query = "SELECT Id_tarifacomref, '1.5 Ton Refrigerada' AS tipo_unidad, 1_5ton_refri AS monto FROM tarifario_comunes_refrig WHERE Id_tarifacomref = '$idOrigen'
        UNION ALL
        SELECT Id_tarifacomref, '3.5 Ton Refrigerada' AS tipo_unidad, 3_5ton_refri AS monto FROM tarifario_comunes_refrig WHERE Id_tarifacomref = '$idOrigen'
        UNION ALL
        SELECT Id_tarifacomref, 'Rabon Refrigerada' AS tipo_unidad, rabon_refri AS monto FROM tarifario_comunes_refrig WHERE Id_tarifacomref = '$idOrigen'
        UNION ALL
        SELECT Id_tarifacomref, 'Trailer Refrigerada' AS tipo_unidad, trailer_refri AS monto FROM tarifario_comunes_refrig WHERE Id_tarifacomref = '$idOrigen'
        ORDER BY Id_tarifacomref, tipo_unidad;";
        $statement = $this->conexion->prepare($query);
        
        $dimensiones = [];
        if ($statement->execute()) {
            $result = $statement->get_result();
            while ($row = $result->fetch_assoc()) {
                $dimensiones[] = $row;
            }
        } else {
            die("Error al obtener dimensiones: " . $this->conexion->error);
        }
        
        $statement->close();
        return $dimensiones;
    }

    public function obtenerDimensionesProexi($idOrigen) {
        $idOrigen = $this->conexion->real_escape_string($idOrigen); // Evita SQL Injection

        $query = "SELECT Id_tarifa_proexi, 'Courrier/Robust' AS tipo_unidad, courrier_robust AS monto FROM tarifario_proexi WHERE Id_tarifa_proexi = '$idOrigen'
        UNION ALL
        SELECT Id_tarifa_proexi, 'Nissan' AS tipo_unidad, nissan AS monto FROM tarifario_proexi WHERE Id_tarifa_proexi = '$idOrigen'
        UNION ALL
        SELECT Id_tarifa_proexi, '3.5' AS tipo_unidad, 3_5 AS monto FROM tarifario_proexi WHERE Id_tarifa_proexi = '$idOrigen'
        UNION ALL
        SELECT Id_tarifa_proexi, 'Rabon' AS tipo_unidad, rabon AS monto FROM tarifario_proexi WHERE Id_tarifa_proexi = '$idOrigen'
        UNION ALL
        SELECT Id_tarifa_proexi, 'Torton' AS tipo_unidad, torton AS monto FROM tarifario_proexi WHERE Id_tarifa_proexi = '$idOrigen'
        UNION ALL
        SELECT Id_tarifa_proexi, 'Trailer' AS tipo_unidad, trailer AS monto FROM tarifario_proexi WHERE Id_tarifa_proexi = '$idOrigen'
        ORDER BY Id_tarifa_proexi, tipo_unidad;";
        $statement = $this->conexion->prepare($query);
        
        $dimensiones = [];
        if ($statement->execute()) {
            $result = $statement->get_result();
            while ($row = $result->fetch_assoc()) {
                $dimensiones[] = $row;
            }
        } else {
            die("Error al obtener dimensiones: " . $this->conexion->error);
        }
        
        $statement->close();
        return $dimensiones;
    }

    public function obtenerTarifarioGeneral() {

        $query = "SELECT Id_tarifagen, CONCAT(estado_origen, ' - ',municipio_origen) AS origen, CONCAT(estado_destino, ' - ',municipio_destino) AS destino FROM tarifario_general";
        $statement = $this->conexion->prepare($query);
        
        $tarifarioGeneral = [];
        if ($statement->execute()) {
            $result = $statement->get_result();
            while ($row = $result->fetch_assoc()) {
                $tarifarioGeneral[] = $row;
            }
        } else {
            die("Error al obtener origenes-destinos: " . $this->conexion->error);
        }
        
        $statement->close();
        return $tarifarioGeneral;
    }

    public function obtenerTarifarioComun() {

        $query = "SELECT Id_tarifacom, origen, destino FROM tarifario_comunes";
        $statement = $this->conexion->prepare($query);
        
        $tarifarioGeneral = [];
        if ($statement->execute()) {
            $result = $statement->get_result();
            while ($row = $result->fetch_assoc()) {
                $tarifarioGeneral[] = $row;
            }
        } else {
            die("Error al obtener origenes-destinos: " . $this->conexion->error);
        }
        
        $statement->close();
        return $tarifarioGeneral;
    }
    
    public function obtenerTarifarioComunRefri() {

        $query = "SELECT Id_tarifacomref, origen, destino FROM tarifario_comunes_refrig";
        $statement = $this->conexion->prepare($query);
        
        $tarifarioGeneral = [];
        if ($statement->execute()) {
            $result = $statement->get_result();
            while ($row = $result->fetch_assoc()) {
                $tarifarioGeneral[] = $row;
            }
        } else {
            die("Error al obtener origenes-destinos: " . $this->conexion->error);
        }
        
        $statement->close();
        return $tarifarioGeneral;
    }

    public function obtenerTarifarioProexi() {

        $query = "SELECT Id_tarifa_proexi, origen, destino FROM tarifario_proexi";
        $statement = $this->conexion->prepare($query);
        
        $tarifarioGeneral = [];
        if ($statement->execute()) {
            $result = $statement->get_result();
            while ($row = $result->fetch_assoc()) {
                $tarifarioGeneral[] = $row;
            }
        } else {
            die("Error al obtener origenes-destinos: " . $this->conexion->error);
        }
        
        $statement->close();
        return $tarifarioGeneral;
    }

    public function contarCotizaciones() {
        $query = "SELECT COUNT(*) as total FROM cotizaciones";
        $resultado = $this->conexion->query($query);

        if ($resultado) {
            $fila = $resultado->fetch_assoc();
            $numeroRegistros = $fila['total'];

            // Si no hay registros, asignar 1. De lo contrario, asignar el número de registros.
            $numero = ($numeroRegistros == 0) ? 1 : $numeroRegistros+1;

            return $numero;
        } else {
            // Manejo de errores si la consulta falla
            return 1; // Puedes ajustar esto según tus necesidades
        }
    }
    public function contarServicios() {
        $query = "SELECT COUNT(*) as total FROM servicios";
        $resultado = $this->conexion->query($query);

        if ($resultado) {
            $fila = $resultado->fetch_assoc();
            $numeroRegistros = $fila['total'];

            // Si no hay registros, asignar 1. De lo contrario, asignar el número de registros.
            $numero = ($numeroRegistros == 0) ? 1 : $numeroRegistros+1;

            return $numero;
        } else {
            // Manejo de errores si la consulta falla
            return 1; // Puedes ajustar esto según tus necesidades
        }
    }

    public function insertarCotizacion($datos) {
        $cliente = $this->conexion->real_escape_string($datos['cliente']);
        $tarifario = $this->conexion->real_escape_string($datos['tarifario']);
        $origen = $this->conexion->real_escape_string($datos['origen']);
        $codigo_postal = $this->conexion->real_escape_string($datos['codigo_postal']);
        $peso = $this->conexion->real_escape_string($datos['peso']);
        $dimension = $this->conexion->real_escape_string($datos['dimension']);
        $texto_dimension = $this->conexion->real_escape_string($datos['texto_dimension']);
        $texto_origen = $this->conexion->real_escape_string($datos['texto_origen']);
        $precio = $this->conexion->real_escape_string($datos['precio']);
        $num_bultos = $this->conexion->real_escape_string($datos['num_bultos']);
        $km_adicionales = $this->conexion->real_escape_string($datos['km_adicionales']);
        $usuario_registro = $_SESSION['NombreUsu'];

        $id = $this->contarCotizaciones();
        $id_especifico = 'C-'.$id;
    
        $query = "INSERT INTO cotizaciones (id_cotizacion, id_especifico, cliente, tarifario, origen, codigo_postal, peso, dimension, precio, num_bultos, km_adicionales, fecha_creacion, usuario_registro, contador_modificaciones)
                  VALUES ('$id', '$id_especifico', '$cliente', '$tarifario', '$texto_origen', '$codigo_postal', '$peso', '$texto_dimension', '$precio', '$num_bultos', '$km_adicionales', now(), '$usuario_registro', 1)";
    
        
        if ($this->conexion->query($query)) {
            return $id; // Devolvemos el ID específico en caso de éxito
        } else {
            return false;
        }
    }

    // Nueva función para obtener cotización por ID
    public function getCotizacionById($id) {
        $id = $this->conexion->real_escape_string($id);
        $query = "SELECT * FROM cotizaciones WHERE id_cotizacion='$id'";
        $resultado = $this->conexion->query($query);

        if ($resultado && $resultado->num_rows > 0) {
            return $resultado->fetch_assoc();
        } else {
            return null;
        }
    }

    public function registrarCotizacion($cotizacion) {
        // Prepare los datos para la inserción
        $id_cotizacion = $this->conexion->real_escape_string($cotizacion['id_cotizacion']);
        $id_especifico = $this->conexion->real_escape_string($cotizacion['id_especifico']);
        $cliente = $this->conexion->real_escape_string($cotizacion['cliente']);
        $tarifario = $this->conexion->real_escape_string($cotizacion['tarifario']);
        $origen = $this->conexion->real_escape_string($cotizacion['origen']);
        $codigo_postal = $this->conexion->real_escape_string($cotizacion['codigo_postal']);
        $peso = $this->conexion->real_escape_string($cotizacion['peso']);
        $dimension = $this->conexion->real_escape_string($cotizacion['dimension']);
        $precio = $this->conexion->real_escape_string($cotizacion['precio']);
        $num_bultos = $this->conexion->real_escape_string($cotizacion['num_bultos']);
        $km_adicionales = $this->conexion->real_escape_string($cotizacion['km_adicionales']);
        $fecha_creacion = $this->conexion->real_escape_string($cotizacion['fecha_creacion']);

        $query = "INSERT INTO registro_cotizaciones (id_cotizacion, id_especifico, cliente, tarifario, origen, codigo_postal, peso, dimension, precio, num_bultos, km_adicionales, fecha_creacion) 
        VALUES ('$id_cotizacion', '$id_especifico', '$cliente', '$tarifario', '$origen', '$codigo_postal', '$peso', '$dimension', '$precio', '$num_bultos', '$km_adicionales', '$fecha_creacion')";

        return $this->conexion->query($query);
    }

    public function updateCotizacion($id, $km_extras, $total) {
        // Obtener la cotización actual
        $cotizacion = $this->getCotizacionById($id);

        if ($cotizacion === null) {
            return ['success' => false, 'message' => 'Cotización no encontrada'];
        }

        // Verificar el contador de modificaciones
        if ($cotizacion['contador_modificaciones'] >= 3) {
            return ['success' => false, 'message' => 'Se llegó al máximo de cambios posibles en la cotización'];
        }

        // Registrar el estado actual de la cotización
        if (!$this->registrarCotizacion($cotizacion)) {
            return ['success' => false, 'message' => 'Error al registrar el estado actual de la cotización'];
        }

        // Incrementar el contador de modificaciones
        $nuevo_contador = $cotizacion['contador_modificaciones'] + 1;

        // Escapar los valores
        $km_extras = $this->conexion->real_escape_string($km_extras);
        $total = $this->conexion->real_escape_string($total);
        $nuevo_contador = $this->conexion->real_escape_string($nuevo_contador);

        // Actualizar la cotización
        $query = "UPDATE cotizaciones SET km_adicionales='$km_extras', precio='$total', contador_modificaciones='$nuevo_contador' WHERE id_cotizacion='$id'";

        if ($this->conexion->query($query)) {
            return ['success' => true, 'message' => 'Cotización actualizada correctamente'];
        } else {
            return ['success' => false, 'message' => 'Error al actualizar la cotización'];
        }
    }

    public function terminarCotizacion($id) {
        $id = $this->conexion->real_escape_string($id);

    
        $query = "UPDATE cotizaciones SET status=0 WHERE id_cotizacion='$id'";
    
        if ($this->conexion->query($query)) {
            return $id;
        } else {
            return false;
        }
    }

    public function terminarFactura($id) {
        $id = $this->conexion->real_escape_string($id);

    
        $query = "UPDATE servicios SET factura_status = 1 WHERE id_servicio='$id'";
    
        if ($this->conexion->query($query)) {
            return $id;
        } else {
            return false;
        }
    }

    public function insertaServicio($datos) {
        $lista_reco = $this->conexion->real_escape_string($datos['lista_reco']);
        $fecha_recoleccion = $this->conexion->real_escape_string($datos['fecha_recoleccion']);
        $servicio = $this->conexion->real_escape_string($datos['servicio']);
        $unidad = $this->conexion->real_escape_string($datos['unidad']);
        $origen_destino = $this->conexion->real_escape_string($datos['origen_destino']);
        $unid_factura = $this->conexion->real_escape_string($datos['unid_factura']);
        $local_foranea = $this->conexion->real_escape_string($datos['local_foranea']);
        $sello = $this->conexion->real_escape_string($datos['sello']);
        $operador = $this->conexion->real_escape_string($datos['operador']);
        $texto_operador = $this->conexion->real_escape_string($datos['texto_operador']);
        $ejecutivo = $this->conexion->real_escape_string($datos['ejecutivo']);
        $referencia = $this->conexion->real_escape_string($datos['referencia']);
        $bultos = $this->conexion->real_escape_string($datos['bultos']);
        $doc_fiscal = $this->conexion->real_escape_string($datos['doc_fiscal']);
        $costo = $this->conexion->real_escape_string($datos['costo']);
        $factura = $this->conexion->real_escape_string($datos['factura']);
        $candados = $this->conexion->real_escape_string($datos['candados']);
        $observaciones = $this->conexion->real_escape_string($datos['observaciones']);
        $idcoti = $this->conexion->real_escape_string($datos['idcoti']);

        $id = $this->contarServicios();
        $id_especifico = 'S-'.$id;
    
        $query = "INSERT INTO servicios (id_servicio, id_especifico, lista, fecha_recoleccion, servicio, unidad, oriDestino
        , unid_factura, local_foranea, sello, operador, id_operador, ejecutivo, referencia, bultos, doc_fiscal, costo, factura, observaciones, fecha_creacion, id_cotizacion, num_candados )
                  VALUES ('$id', '$id_especifico', '$lista_reco', '$fecha_recoleccion', '$servicio', '$unidad', '$origen_destino', '$unid_factura', '$local_foranea',
                  '$sello','$texto_operador','$operador','$ejecutivo','$referencia','$bultos','$doc_fiscal','$costo','$factura','$observaciones', now(), '$idcoti', '$candados')";
    
        
        if ($this->conexion->query($query)) {
            return $id; // Devolvemos el ID específico en caso de éxito
        } else {
            return false;
        }
    }

    public function insertarFactura($factura, $fecha_fac, $precio_base, $iva, $retencion, $precio_final, $razonSocial, $contact_cliente, $servicio, $referencia, $complemento, $fecha_pag, $observacion, $fecha_envio, $documento, $portal_nip, $idservicio) {
        $query = "INSERT INTO facturas (id_especifico, fecha, precio_base, iva, retencion, precio_final, razon_social, contacto_cliente, servicio, referencia, complemento, fecha_pago, observacion, fecha_envio, documento, portal_nippon, id_servicio)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
        $statement = $this->conexion->prepare($query);
        $statement->bind_param('sssssssssssssssss', $factura, $fecha_fac, $precio_base, $iva, $retencion, $precio_final, $razonSocial, $contact_cliente, $servicio, $referencia, $complemento, $fecha_pag, $observacion, $fecha_envio, $documento, $portal_nip, $idservicio);
    
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    
    function validaFactura($id_servicio) {
        $sql = "SELECT COUNT(*) as count FROM facturas WHERE id_servicio = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $id_servicio);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['count'];
    }

    public function guardarCotizacionAdicional($cliente, $origen, $destino, $codigo_postal, $peso, $dimension, $precio, $num_bultos) {
        $query = "INSERT INTO cotizacion_adicional (cliente, origen, destino, codigo_postal, peso, dimension, precio, bultos)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param('ssssssss', $cliente, $origen, $destino, $codigo_postal, $peso, $dimension, $precio, $num_bultos);
    
        return $stmt->execute();
    }

    public function obtenerCotizacionesAdicionales() {
        $query = "SELECT *
        FROM cotizacion_adicional
        ORDER BY id_cotadicional ASC";
        $resultado = $this->conexion->query($query);

        $operadores = array();
        while ($fila = $resultado->fetch_assoc()) {
            $operadores[] = $fila;
        }

        return $operadores;
    }
    
    
    
    

}

