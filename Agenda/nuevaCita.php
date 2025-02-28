<?php
require '../global/conexion.php'; // Incluye el archivo de conexión

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fechaHora = $_POST['fechaHora'];
    $especialidadId = $_POST['especialidad'];
    $tiempoVisita = $_POST['tiempoVisita'];
    $pacienteId = $_POST['pacienteId']; // Recibe el ID del paciente
    $observaciones = $_POST['observaciones'];


    // Verificar si el PacienteId existe en la tabla pacientes
    $sqlVerificar = "SELECT id FROM pacientes WHERE id = :pacienteId";
    $stmtVerificar = $conn->prepare($sqlVerificar);
    $stmtVerificar->bindParam(':pacienteId', $pacienteId);
    $stmtVerificar->execute();

    if ($stmtVerificar->rowCount() > 0) {
        // El PacienteId existe, proceder con la inserción
        try {
            $sql = "INSERT INTO citas (fecha_hora, EspecialidadId, tiempo_visita, PacienteId, observaciones) 
                    VALUES (:fechaHora, :especialidadId, :tiempoVisita, :pacienteId, :observaciones)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':fechaHora', $fechaHora);
            $stmt->bindParam(':especialidadId', $especialidadId);
            $stmt->bindParam(':tiempoVisita', $tiempoVisita);
            $stmt->bindParam(':pacienteId', $pacienteId);
            $stmt->bindParam(':observaciones', $observaciones);
            $stmt->execute();

            header("Location: agenda.php?agendaSuccess=Cita agregada correctamente");
        } catch (PDOException $e) {
            header("Location: agenda.php?agendaError=Error al agregar la cita");
        }
    } else {
        echo "Error: El paciente seleccionado no existe. ID recibido: " . $pacienteId; // Depuración: Imprime el ID recibido
    }
}
