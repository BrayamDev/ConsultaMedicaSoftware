<?php
require '../global/conexion.php'; // Incluye el archivo de conexión

header('Content-Type: application/json'); // Devuelve JSON

try {
    // Consulta para obtener las citas
    $sql = "SELECT id, fecha_hora as start, tiempo_visita, observaciones as title, PacienteId 
            FROM citas";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $citas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Formatea los eventos para FullCalendar
    $events = [];
    foreach ($citas as $cita) {
        $events[] = [
            'id' => $cita['id'], // ID de la cita
            'title' => $cita['title'], // Título del evento (observaciones)
            'start' => $cita['start'], // Fecha y hora de inicio
            'end' => date('Y-m-d H:i:s', strtotime($cita['start'] . ' + ' . $cita['tiempo_visita'] . ' minutes')), // Fecha y hora de fin
            'pacienteId' => $cita['PacienteId'] // ID del paciente
        ];
    }

    echo json_encode($events); // Devuelve los eventos en formato JSON
} catch (PDOException $e) {
    // Manejo de errores
    echo json_encode(['error' => $e->getMessage()]);
}
?>