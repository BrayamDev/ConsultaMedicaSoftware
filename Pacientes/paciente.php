<?php include_once "../global/conexion.php"; ?>

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
    <div class="row mx-auto p-2" style="width: 120rem;">
        <!-- Rectángulo 1: Agregar Paciente -->
        <div class="col-md-3 p-0">
            <div class="card custom-card h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-large me-4 text-success">
                        <i class="ri-user-add-line fs-1"></i> <!-- Icono de agregar -->
                    </div>
                    <div>
                        <a class="card-title" href="../Pacientes/agregar.php">REGISTRAR NUEVA ALTA</a>
                        <p class="card-text">Registrar un nuevo paciente en el sistema.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rectángulo 2: Editar Paciente -->
        <div class="col-md-3 p-0">
            <div class="card custom-card h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-large me-4">
                        <i class="ri-edit-box-line fs-1 text-warning"></i> <!-- Icono de editar -->
                    </div>
                    <div>
                        <!-- Botón para abrir el modal de editar -->
                        <button class="card-title btn btn-link p-0" data-bs-toggle="modal"
                            data-bs-target="#modalEditarPaciente">
                            Editar Paciente
                        </button>
                        <p class="card-text">Modificar los datos de un paciente registrado.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rectángulo 3: Eliminar Paciente -->
        <div class="col-md-3 p-0">
            <div class="card custom-card h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-large me-4">
                        <i class="ri-delete-bin-line fs-1 text-danger"></i> <!-- Icono de eliminar -->
                    </div>
                    <div>
                        <!-- Botón para abrir el modal de eliminar -->
                        <button class="card-title btn btn-link p-0" data-bs-toggle="modal"
                            data-bs-target="#modalEliminarPaciente">
                            Eliminar Paciente
                        </button>
                        <p class="card-text">Eliminar un paciente del sistema de manera segura.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rectángulo 4: Desactivar Paciente -->
        <div class="col-md-3 p-0">
            <div class="card custom-card h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-large me-4">
                        <i class="ri-user-unfollow-line fs-1 text-warning"></i> <!-- Icono de desactivar -->
                    </div>
                    <div>
                        <!-- Botón para abrir el modal de desactivar -->
                        <a class="card-title btn btn-link p-0" href="../Pacientes/consolidado_pacientes.php">
                            Consolidado del paciente
                        </a>
                        <p class="card-text">Desactivar temporalmente el acceso de un paciente en el sistema.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Editar Paciente -->
    <div class="modal fade" id="modalEditarPaciente" tabindex="-1" aria-labelledby="modalEditarPacienteLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarPacienteLabel">Editar Paciente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario de búsqueda -->
                    <form id="formBuscarEditar">
                        <div class="mb-3">
                            <label for="nombreBuscarEditar" class="form-label">Nombre del Paciente</label>
                            <input type="text" class="form-control" id="nombreBuscarEditar"
                                placeholder="Ingrese el nombre">
                        </div>
                        <div class="mb-3">
                            <label for="documentoBuscarEditar" class="form-label">Documento de Identidad</label>
                            <input type="text" class="form-control" id="documentoBuscarEditar"
                                placeholder="Ingrese el documento">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>

                    </form>
                    <!-- Resultados de la búsqueda (se llenará dinámicamente) -->
                    <div id="resultadosEditar" class="mt-3">
                        <!-- Aquí se mostrarán los resultados de la búsqueda -->
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal de Eliminar Paciente -->
    <div class="modal fade" id="modalEliminarPaciente" tabindex="-1" aria-labelledby="modalEliminarPacienteLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEliminarPacienteLabel">Eliminar Paciente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario de búsqueda -->
                    <form id="formBuscarEliminar">
                        <div class="mb-3">
                            <label for="nombreBuscarEliminar" class="form-label">Nombre del Paciente</label>
                            <input type="text" class="form-control" id="nombreBuscarEliminar"
                                placeholder="Ingrese el nombre">
                        </div>
                        <div class="mb-3">
                            <label for="documentoBuscarEliminar" class="form-label">Documento de Identidad</label>
                            <input type="text" class="form-control" id="documentoBuscarEliminar"
                                placeholder="Ingrese el documento">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>

                    </form>
                    <!-- Resultados de la búsqueda (se llenará dinámicamente) -->
                    <div id="resultadosEliminar" class="mt-3">
                        <!-- Aquí se mostrarán los resultados de la búsqueda -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <table class="table table-striped" id="idTabla">
            <thead class="table table-success">
                <tr>
                    <th colspan="10" class="text-center text-uppercase fs-4">PACIENTES EN ALTA</th>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Tipo de Documento</th>
                    <th>Número de Documento</th>
                    <th>Nacionalidad</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Móvil</th>
                    <th>Email</th>
                    <th>Procedencia</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    // Consulta para obtener los datos de los pacientes
                    $sqlPacientes = "SELECT nombre, primer_apellido, segundo_apellido, tipo_documento, 
                                numero_documento, pais_origen, fecha_nacimiento, sexo, movil, email, procedencia 
                                FROM pacientes";
                    $stmt = $conn->prepare($sqlPacientes);
                    $stmt->execute();
                    $pacientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // Mostrar los datos en la tabla
                    foreach ($pacientes as $paciente) {
                        // Calcular la edad
                        $fechaNacimiento = new DateTime($paciente['fecha_nacimiento']);
                        $hoy = new DateTime();
                        $edad = $hoy->diff($fechaNacimiento)->y;
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($paciente['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($paciente['primer_apellido'] . " " . $paciente['segundo_apellido']); ?>
                    </td>
                    <td><?php echo htmlspecialchars($paciente['tipo_documento']); ?></td>
                    <td><?php echo htmlspecialchars($paciente['numero_documento']); ?></td>
                    <td><?php echo htmlspecialchars($paciente['pais_origen']); ?></td>
                    <td><?php echo $edad; ?></td>
                    <td><?php echo htmlspecialchars($paciente['sexo']); ?></td>
                    <td><?php echo htmlspecialchars($paciente['movil']); ?></td>
                    <td><?php echo htmlspecialchars($paciente['email']); ?></td>
                    <td><?php echo htmlspecialchars($paciente['procedencia']); ?></td>
                </tr>
                <?php }
                } catch (PDOException $e) {
                    echo "<tr><td colspan='10' class='text-center'>Error al obtener los datos: " . $e->getMessage() . "</td></tr>";
                }
                ?>
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