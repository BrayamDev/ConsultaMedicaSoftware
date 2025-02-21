<?php
include '../global/conexion.php';

try {
    // Consulta para obtener los pacientes
    $sql = "SELECT nombre, primer_apellido, segundo_apellido, fecha_nacimiento, sexo, pais_origen, 
                   provincia, poblacion, tipo_documento, numero_documento, direccion, codigo_postal, 
                   telefono, movil, email, procedencia, aseguradora, observaciones 
            FROM pacientes";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Obtener los resultados como un array asociativo
    $pacientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Enviar datos como JSON
    header('Content-Type: application/json');
    echo json_encode($pacientes);
} catch (PDOException $e) {
    // Manejar errores
    die("Error al obtener los pacientes: " . $e->getMessage());
}
?>