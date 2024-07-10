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

        $query = "SELECT Usuario.Nombre, Usuario.ApellidoP, Usuario.ApellidoM, Usuario.Usu_id, Usuario.Puesto_id, puestos.Nombre as Puesto
        FROM Usuario 
        INNER JOIN puestos 
        ON Usuario.Puesto_id = puestos.Puesto_id
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
        $query = "SELECT Eco, Placas, Marca, Unidad, Largo, Ancho, Alto, Peso, Tipo, Modelo, No_Serie, Color, Placas_Anteriores, Poliza, Vigencia_Poliza, Verificacion FROM unidades ORDER BY Uni_id ASC";
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

    public function obtenerServicios() {
        $query = "SELECT *
        FROM servicios  
        INNER JOIN operadores ON servicios.id_operador = operadores.id
        INNER JOIN unidades ON servicios.unidad = unidades.Uni_id
        INNER JOIN cotizaciones ON servicios.id_cotizacion = cotizaciones.id_cotizacion
        WHERE lista != 'Lista Nippon'
        ORDER BY id_servicio ASC";
        $resultado = $this->conexion->query($query);

        $operadores = array();
        while ($fila = $resultado->fetch_assoc()) {
            $operadores[] = $fila;
        }

        return $operadores;
    }
    public function obtenerServiciosNippon() {
        $query = "SELECT *
        FROM servicios  
        INNER JOIN operadores ON servicios.id_operador = operadores.id
        INNER JOIN unidades ON servicios.unidad = unidades.Uni_id
        INNER JOIN cotizaciones ON servicios.id_cotizacion = cotizaciones.id_cotizacion
        WHERE lista = 'Lista Nippon'
        ORDER BY id_servicio ASC";
        $resultado = $this->conexion->query($query);

        $operadores = array();
        while ($fila = $resultado->fetch_assoc()) {
            $operadores[] = $fila;
        }

        return $operadores;
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

        $query = "SELECT Id_tarifa_proexi, 'Nissan' AS tipo_unidad, nissan AS monto FROM tarifario_proexi WHERE Id_tarifa_proexi = '$idOrigen'
        UNION ALL
        SELECT Id_tarifa_proexi, '3.5' AS tipo_unidad, 3_5 AS monto FROM tarifario_proexi WHERE Id_tarifa_proexi = '$idOrigen'
        UNION ALL
        SELECT Id_tarifa_proexi, 'Rabon' AS tipo_unidad, rabon AS monto FROM tarifario_proexi WHERE Id_tarifa_proexi = '$idOrigen'
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

        $id = $this->contarCotizaciones();
        $id_especifico = 'C-'.$id;
    
        $query = "INSERT INTO cotizaciones (id_cotizacion, id_especifico, cliente, tarifario, origen, codigo_postal, peso, dimension, precio, num_bultos, km_adicionales, fecha_creacion)
                  VALUES ('$id', '$id_especifico', '$cliente', '$tarifario', '$texto_origen', '$codigo_postal', '$peso', '$texto_dimension', '$precio', '$num_bultos', '$km_adicionales', now())";
    
        
        if ($this->conexion->query($query)) {
            return $id; // Devolvemos el ID específico en caso de éxito
        } else {
            return false;
        }
    }

    public function updateCotizacion($id, $km_extras, $total) {
        $id = $this->conexion->real_escape_string($id);
        $km_extras = $this->conexion->real_escape_string($km_extras);
        $total = $this->conexion->real_escape_string($total);
    
        $query = "UPDATE cotizaciones SET km_adicionales='$km_extras', precio='$total' WHERE id_cotizacion='$id'";
    
        if ($this->conexion->query($query)) {
            return true;
        } else {
            return false;
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

    public function insertaServicio($datos) {
        $lista_reco = $this->conexion->real_escape_string($datos['lista_reco']);
        $fecha_recoleccion = $this->conexion->real_escape_string($datos['fecha_recoleccion']);
        $cliente = $this->conexion->real_escape_string($datos['cliente']);
        $unidad = $this->conexion->real_escape_string($datos['unidad']);
        $origen_destino = $this->conexion->real_escape_string($datos['origen_destino']);
        $unid_factura = $this->conexion->real_escape_string($datos['unid_factura']);
        $local_foranea = $this->conexion->real_escape_string($datos['local_foranea']);
        $sello = $this->conexion->real_escape_string($datos['sello']);
        $operador = $this->conexion->real_escape_string($datos['operador']);
        $texto_operador = $this->conexion->real_escape_string($datos['texto_operador']);
        $cliente_solicita = $this->conexion->real_escape_string($datos['cliente_solicita']);
        $referencia = $this->conexion->real_escape_string($datos['referencia']);
        $bultos = $this->conexion->real_escape_string($datos['bultos']);
        $doc_fiscal = $this->conexion->real_escape_string($datos['doc_fiscal']);
        $costo = $this->conexion->real_escape_string($datos['costo']);
        $factura = $this->conexion->real_escape_string($datos['factura']);
        $candados = $this->conexion->real_escape_string($datos['candados']);
        $caat = $this->conexion->real_escape_string($datos['caat']);
        $observaciones = $this->conexion->real_escape_string($datos['observaciones']);
        $idcoti = $this->conexion->real_escape_string($datos['idcoti']);

        $id = $this->contarServicios();
        $id_especifico = 'S-'.$id;
    
        $query = "INSERT INTO servicios (id_servicio, id_especifico, lista, fecha_recoleccion, cliente, unidad, oriDestino
        , unid_factura, local_foranea, sello, operador, id_operador, cliente_solicita, referencia, bultos, doc_fiscal, costo, factura, observaciones, fecha_creacion, id_cotizacion, num_candados, CAAT )
                  VALUES ('$id', '$id_especifico', '$lista_reco', '$fecha_recoleccion', '$cliente', '$unidad', '$origen_destino', '$unid_factura', '$local_foranea',
                  '$sello','$texto_operador','$operador','$cliente_solicita','$referencia','$bultos','$doc_fiscal','$costo','$factura','$observaciones', now(), '$idcoti', '$candados', '$caat')";
    
        
        if ($this->conexion->query($query)) {
            return $id; // Devolvemos el ID específico en caso de éxito
        } else {
            return false;
        }
    }
    
    



    
    

}

