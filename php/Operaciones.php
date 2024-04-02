<?php
include_once 'conexion.php';

// Obtener datos del formulario
$nombre = $_REQUEST['nombre'];
$numero = $_REQUEST['numero'];
$salario = floatval($_REQUEST['salario']);
$dias = $_REQUEST['dias'];
$horas = $_REQUEST['horas'];
$horasnoc = $_REQUEST['horasnoc'];
$horasfes = $_REQUEST['horasfes'];
$horasfesnoc = $_REQUEST['horasfesnoc'];

// Calcular subsidio de transporte
$salariomin = 1300000;
$subsidio = 162000;
if ($salario <= ($salariomin * 2)) {
    $subsidio = $subsidio / 30 * $dias;
} else {
    $subsidio = 0;
}

// Calcular valor de horas extras
$valor_horas = array(
    "diurnas" => $salario / 240 * 1.25 * $horas,
    "nocturnas" => $salario / 240 * 1.75 * $horasnoc,
    "festivas_diurnas" => $salario / 240 * 2.0 * $horasfes,
    "festivas_nocturnas" => $salario / 240 * 2.5 * $horasfesnoc
);

// Calcular total
$total = $salario + $subsidio + array_sum($valor_horas);

// Insertar datos en la base de datos
$sql = "INSERT INTO empleados (nombre, numero_documento, salario, dias_trabajados, horas_extras_diurnas, horas_extras_nocturnas, horas_extras_festivas_diurnas, horas_extras_festivas_nocturnas, subsidio_transport, valor_horas_extras_diurnas, valor_horas_extras_nocturnas, valor_horas_extras_festivas_diurnas, valor_horas_extras_festivas_nocturnas, total) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
$stmt = mysqli_prepare($conectar, $sql);

mysqli_stmt_bind_param($stmt, "sssdiiiiiddddd", $nombre, $numero, $salario, $dias, $horas, $horasnoc, $horasfes, $horasfesnoc, $subsidio, $valor_horas['diurnas'], $valor_horas['nocturnas'], $valor_horas['festivas_diurnas'], $valor_horas['festivas_nocturnas'], $total);

mysqli_stmt_execute($stmt);

if(mysqli_stmt_affected_rows($stmt) > 0) {
    echo "Datos insertados correctamente.";
} else {
    echo "Error al insertar los datos.";
}

mysqli_stmt_close($stmt);
?>
