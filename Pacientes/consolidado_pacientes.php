<?php
include_once "../global/conexion.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agenda</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!--css-->
    <link rel="stylesheet" href="../css/estilos.css">
    <!-- Remix Icon CSS (para los iconos) -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- CSS for full calender -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />
    <!-- JS for jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- JS for full calender -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <!-- bootstrap css and js -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Incluye Tabulator CSS -->
    <link href="https://unpkg.com/tabulator-tables@5.5.2/dist/css/tabulator.min.css" rel="stylesheet">
    <!-- Incluye Tabulator JS -->
    <script src="https://unpkg.com/tabulator-tables@5.5.2/dist/js/tabulator.min.js"></script>
    <!--cdn-->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
</head>

<body>
    <?php include_once "../global/navbar.php" ?>
    <?php include_once "../global/table_utility.php" ?>

    <br><br><br>
    <div class="container mt-5">
        <h2 class="mb-4">Pacientes</h2>
        
        <!-- Formulario en una sola fila -->
        <form class="row g-3 align-items-center">
            <!-- Checkbox -->
            <div class="col">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="ocultarPacientes" id="ocultarPacientes">
                    <label class="form-check-label" for="ocultarPacientes">
                        Ocultar pacientes sin historia
                    </label>
                </div>
            </div>

            <!-- Campo Paciente -->
            <div class="col">
                <label for="paciente" class="form-label">Paciente:</label>
                <input type="text" class="form-control" id="paciente" name="paciente">
            </div>

            <!-- Campo Cliente/Tutor -->
            <div class="col">
                <label for="clienteTutor" class="form-label">Cliente/Tutor:</label>
                <input type="text" class="form-control" id="clienteTutor" name="clienteTutor">
            </div>

            <!-- Campo Estado (Activo/Inactivo) -->
            <div class="col">
                <label for="estado" class="form-label">Estado:</label>
                <select class="form-select" id="estado" name="estado">
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>
            </div>
        </form>
    </div>

    <br>
    <div class="container">
        <table class="table table-striped" id="idTabla">
            <thead class="table table-dark">
                <tr>
                    <th colspan="4" class="text-center text-uppercase fs-4">CONSOLIDADO DE PACIENTES</th>
                </tr>
                <tr>
                    <th>NUMERO DE LA HISTORIA</th>
                    <th>NOMBRE DEL PACIENTE</th>
                    <th>FECHA DE ALTA</th>
                    <th>OPCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    // Consulta para obtener los datos de la historia clínica y el nombre del paciente
                    $sql = "SELECT HC.id, P.nombre AS NOMBRE_PACIENTE, HC.FECHA_ALTA 
                            FROM HISTORIA_CLINICA HC
                            JOIN PACIENTES P ON HC.id_paciente = P.id";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $historias = $stmt->fetchAll(PDO::FETCH_ASSOC);
                } catch (PDOException $e) {
                    echo "Error al obtener los datos: " . $e->getMessage();
                }
                foreach ($historias as $historia): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($historia['id']); ?></td>
                        <td><?php echo htmlspecialchars($historia['NOMBRE_PACIENTE']); ?></td>
                        <td><?php echo htmlspecialchars($historia['FECHA_ALTA']); ?></td>
                        <td>
                            <!-- Icono para Ver Información del Paciente -->
                            <a href="#" title="Ver Información del Paciente" class="btn btn-success btn-sm">
                                <i class="ri-user-line ri-lg"></i>
                            </a>

                            <!-- Icono para Ver Historia Clínica -->
                            <a href="#" title="Ver Historia Clínica" class="btn btn-success btn-sm">
                                <i class="ri-file-text-line ri-lg"></i>
                            </a>

                            <!-- Icono para Ver Documentos del Paciente -->
                            <a href="#" title="Ver Documentos del Paciente" class="btn btn-success btn-sm">
                                <i class="ri-folder-line ri-lg"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <script src="Js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>