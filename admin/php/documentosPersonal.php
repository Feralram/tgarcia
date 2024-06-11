<?php
require '../../models/db_connection.php';

$conexion = new Connect();


$id = $_REQUEST['id'];

// Prepara y ejecuta la consulta SQL
$consulta = $conexion->get_query(
    "SELECT docper.id as id, docper.ruta as ruta, docper.TipoDocumentoId as Tipo, td.Nombre as Nombre, docper.Fecha AS Fecha, docper.Aprobado AS Estatus
    FROM documentostrabajadores docper
    INNER JOIN tipodocumentopersonal td
    ON docper.TipoDocumentoId = td.id
    WHERE docper.TrabajadorId = '$id' AND (docper.Aprobado = 0 OR docper.Aprobado = 1)
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
