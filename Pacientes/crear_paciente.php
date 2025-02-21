<?php
include '../global/conexion.php';

// Obtener los datos enviados por POST en formato JSON
$data = json_decode(file_get_contents("php://input"), true);

try {
    // Consulta para insertar un nuevo paciente
    $query = "INSERT INTO pacientes (
        nombre, primer_apellido, segundo_apellido, fecha_nacimiento, sexo, pais_origen, provincia, poblacion, tipo_documento, numero_documento, direccion, codigo_postal, telefono, movil, email, procedencia, aseguradora, observaciones
    ) VALUES (
        :nombre, :primer_apellido, :segundo_apellido, :fecha_nacimiento, :sexo, :pais_origen, :provincia, :poblacion, :tipo_documento, :numero_documento, :direccion, :codigo_postal, :telefono, :movil, :email, :procedencia, :aseguradora, :observaciones
    )";

    // Preparar y ejecutar la consulta
    $stmt = $conn->prepare($query);
    $stmt->execute($data);

    // Devolver una respuesta de éxito
    echo json_encode(["message" => "Paciente creado correctamente"]);
} catch (PDOException $e) {
    // Manejar errores de la base de datos
    echo json_encode(["error" => "Error al crear el paciente: " . $e->getMessage()]);
}
?>