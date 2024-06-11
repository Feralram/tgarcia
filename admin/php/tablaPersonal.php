<?php
require '../../models/db_connection.php';

$conexion = new Connect();
// Prepara y ejecuta la consulta SQL
$consulta = $conexion->get_query("SELECT nombre, id, puesto, status as empstatus, fecha, rfc FROM trabajadores");
$consulta->execute();

// Obtiene los resultados
$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);


// Retorna los datos en formato JSON
echo json_encode($datos, JSON_UNESCAPED_UNICODE);
?>
