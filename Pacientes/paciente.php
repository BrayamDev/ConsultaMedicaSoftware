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
</head>

<body>
    <?php include_once "../global/navbar.php" ?>
    <?php // include_once "../global/menu.php" 
    ?>
    <br><br>
    <div class="container-fluid mt-5">
        <h2 class="text-center mb-4">Listado de Pacientes</h2>
    </div>

    <div class="row mx-auto p-2" style="width: 120rem;">
        <!-- Rectángulo 1: Agregar Paciente -->
        <div class="col-md-3 p-0">
            <div class="card custom-card h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-large me-4 text-success">
                        <i class="ri-user-add-line fs-1"></i> <!-- Icono de agregar -->
                    </div>
                    <div>
                        <a class="card-title" href="../Pacientes/agregar.php">Agregar Paciente</a>
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
                        <button class="card-title btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#modalEditarPaciente">
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
                        <button class="card-title btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#modalEliminarPaciente">
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
                        <button class="card-title btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#modalDesactivarPaciente">
                            Consolidado del paciente
                        </button>
                        <p class="card-text">Desactivar temporalmente el acceso de un paciente en el sistema.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Editar Paciente -->
    <div class="modal fade" id="modalEditarPaciente" tabindex="-1" aria-labelledby="modalEditarPacienteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarPacienteLabel">Editar Paciente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario para buscar paciente -->
                    <form id="formBuscarEditar">
                        <div class="mb-3">
                            <label for="buscarIdEditar" class="form-label">Documento de identidad del Paciente</label>
                            <input type="text" class="form-control" id="buscarIdEditar" name="id" required>
                        </div>
                        <button type="submit" class="btn btn-warning">Buscar</button>
                    </form>
                    <!-- Formulario para editar paciente (se muestra después de buscar) -->
                    <form id="formEditarPaciente" style="display: none;">
                        <div class="mb-3">
                            <label for="editarNombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="editarNombre" name="nombre" required>
                        </div>
                        <!-- Agrega más campos aquí -->
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Eliminar Paciente -->
    <div class="modal fade" id="modalEliminarPaciente" tabindex="-1" aria-labelledby="modalEliminarPacienteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEliminarPacienteLabel">Eliminar Paciente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario para buscar paciente -->
                    <form id="formBuscarEliminar">
                        <div class="mb-3">
                            <label for="buscarIdEliminar" class="form-label">Documento de identidad del Paciente</label>
                            <input type="text" class="form-control" id="buscarIdEliminar" name="id" required>
                        </div>
                        <button type="submit" class="btn btn-danger">Buscar</button>
                    </form>
                    <!-- Confirmación de eliminación (se muestra después de buscar) -->
                    <div id="confirmacionEliminar" style="display: none;">
                        <p>¿Estás seguro de eliminar este paciente?</p>
                        <button class="btn btn-danger" onclick="eliminarPaciente()">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <!-- Campo de búsqueda global -->
        <input type="text" id="buscador-global" class="form-control" placeholder="Buscar...">
        <!-- Contenedor para la tabla -->
        <div id="tabla-pacientes"></div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Configuración de Tabulator
            var table = new Tabulator("#tabla-pacientes", {
                layout: "fitColumns", // Ajustar columnas al contenedor
                pagination: "local", // Habilitar paginación
                paginationSize: 10, // Número de filas por página
                ajaxURL: "obtener_pacientes.php", // URL para obtener datos desde PHP
                columns: [{
                        title: "Nombre",
                        field: "nombre",
                        sorter: "string"
                    },
                    {
                        title: "Primer Apellido",
                        field: "primer_apellido",
                        sorter: "string"
                    },
                    {
                        title: "Segundo Apellido",
                        field: "segundo_apellido",
                        sorter: "string"
                    },
                    {
                        title: "Fecha de Nacimiento",
                        field: "fecha_nacimiento",
                        sorter: "date"
                    },
                    {
                        title: "Sexo",
                        field: "sexo",
                        sorter: "string"
                    },
                    {
                        title: "País de Origen",
                        field: "pais_origen",
                        sorter: "string"
                    },
                    {
                        title: "Provincia",
                        field: "provincia",
                        sorter: "string"
                    },
                    {
                        title: "Población",
                        field: "poblacion",
                        sorter: "string"
                    },
                    {
                        title: "Tipo de Documento",
                        field: "tipo_documento",
                        sorter: "string"
                    },
                    {
                        title: "Número de Documento",
                        field: "numero_documento",
                        sorter: "string"
                    },
                    {
                        title: "Dirección",
                        field: "direccion",
                        sorter: "string"
                    },
                    {
                        title: "Código Postal",
                        field: "codigo_postal",
                        sorter: "string"
                    },
                    {
                        title: "Teléfono",
                        field: "telefono",
                        sorter: "string"
                    },
                    {
                        title: "Móvil",
                        field: "movil",
                        sorter: "string"
                    },
                    {
                        title: "Email",
                        field: "email",
                        sorter: "string"
                    },
                    {
                        title: "Procedencia",
                        field: "procedencia",
                        sorter: "string"
                    },
                    {
                        title: "Aseguradora",
                        field: "aseguradora",
                        sorter: "string"
                    },
                    {
                        title: "Observaciones",
                        field: "observaciones",
                        sorter: "string"
                    },
                ],
            });

            // Configurar el buscador global
            document.getElementById("buscador-global").addEventListener("input", function(e) {
                var valor = e.target.value.toLowerCase(); // Convertir a minúsculas
                table.setFilter(function(data) {
                    // Buscar en todas las columnas
                    for (var key in data) {
                        if (data[key] && data[key].toString().toLowerCase().includes(valor)) {
                            return true;
                        }
                    }
                    return false;
                });
            });
        });
    </script>

    <script src="Js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>