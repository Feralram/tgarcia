<?php

require '../../models/db_connection.php';

$conexion = new Connect();

$id = $_REQUEST['id'];


$consulta = $conexion->get_query(
    "SELECT NombreDocumento,ruta, EstudianteId ,TipoDocumentoId, Aprobado, Fecha
    FROM documentosaspirantes
    WHERE documentosaspirantes.EstudianteId = '$id' AND (documentosaspirantes.Aprobado = 0 OR documentosaspirantes.Aprobado = 1)
    ");


$consulta->execute();

// Obtiene los resultados
$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);

//Convierte los datos para evitar conflictos de Charset
array_walk_recursive($datos, function (&$item) {
    // $item = mb_convert_encoding($item, 'UTF-8', 'UTF-8');
    iconv(mb_detect_encoding($item, mb_detect_order(), true), "UTF-8", $item);
});

// Retorna los datos en formato JSON
echo json_encode($datos, JSON_UNESCAPED_UNICODE);




?>