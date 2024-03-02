<?php
// Datos de conexión a la base de datos
$host = "lDESKTOP-6PLK4QS\MSSQLSERVER01";
$usuario = "usuario";
$contrasena = "contraseña";
$base_de_datos = "nombre_base_de_datos";

// Conexión a la base de datos
$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error en la conexión a la base de datos: " . $conexion->connect_error);
}

// Obtener los datos del formulario
$nombre_cliente = $_POST['nombre_cliente'];
$monto = $_POST['monto'];
$fecha = $_POST['fecha'];
$metodo_pago = $_POST['metodo_pago'];

// Preparar la consulta SQL para insertar los datos en la tabla de recaudo
$sql = "INSERT INTO recaudo_cartera (nombre_cliente, monto, fecha, metodo_pago) VALUES ('$nombre_cliente', '$monto', '$fecha', '$metodo_pago')";

// Ejecutar la consulta
if ($conexion->query($sql) === TRUE) {
    echo "Recaudo de cartera registrado exitosamente";
} else {
    echo "Error al registrar el recaudo de cartera: " . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
