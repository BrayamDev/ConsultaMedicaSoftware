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
</head>

<body>
    <?php include_once "../global/navbar.php" ?>
    <?php // include_once "../global/menu.php" 
    ?>
    <br>
    <div class="main-content">
        <div class="container-fluid text-end">
            <!-- Fila superior: Seleccione el doctor y botones de vista -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="d-flex gap-2 justify-content-start">
                        <!-- Dropdown para "Seleccione el doctor" -->
                        <div class="dropdown">
                            <button class="btn btn-success btn-sm dropdown-toggle text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #00826F; border: none;">
                                Seleccione el doctor
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Doctor 1</a></li>
                                <li><a class="dropdown-item" href="#">Doctor 2</a></li>
                                <li><a class="dropdown-item" href="#">Doctor 3</a></li>
                            </ul>
                        </div>
                        <a class="btn btn-success btn-sm text-white" style="background-color: #00826F; border: none;"> <!-- Ajusta el ancho según necesites -->
                            <i class="ri-user-heart-line"></i> Ver ficha
                        </a>
                        <div class="btn-group">
                            <div class="dropdown">
                                <button class="btn-sm dropdown-toggle text-white" type="button" id="miniCalendarDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #00826F; border: none;">
                                    <i class="ri-calendar-2-line"></i> Calendario
                                </button>
                                <div class="dropdown-menu dropdown-menu-end p-3" aria-labelledby="miniCalendarDropdown" style="width: 300px;">
                                    <div id="miniCalendar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Botón para abrir el modal -->
                <div class="col-md-6">
                    <div class="row justify-content-end">
                        <div class="col-md-12">
                            <div class="d-flex gap-2 justify-content-end">
                                <button class="btn btn-success btn-sm" style="background-color: #00826F; border: none;" data-bs-toggle="modal" data-bs-target="#nuevaCitaModal">
                                    <i class="ri-calendar-line"></i> Nueva cita
                                </button>
                                <button class="btn btn-success btn-sm" style="background-color: #00826F; border: none;">
                                    <i class="ri-user-line"></i> Citas paciente
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal de Nueva Cita -->
        <div class="modal fade" id="nuevaCitaModal" tabindex="-1" aria-labelledby="nuevaCitaModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="nuevaCitaModalLabel">
                            <i class="ri-calendar-line"></i> Nueva Cita
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <!-- Fecha y Hora y Especialidades en la misma fila -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="fechaHora" class="form-label">
                                        <i class="ri-calendar-event-line"></i> Fecha y Hora
                                    </label>
                                    <input type="datetime-local" class="form-control" id="fechaHora">
                                </div>
                                <div class="col-md-6">
                                    <label for="especialidad" class="form-label">
                                        <i class="ri-stethoscope-line"></i> Especialidades <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select" id="especialidad">
                                        <option selected>Medicina General</option>
                                        <option>Otra Especialidad</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Tipo de visita y Paciente en la misma fila -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="tiempoVisita" class="form-label">
                                        <i class="ri-time-line"></i> Tiempo visita (min) <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" class="form-control" id="tiempoVisita" value="30">
                                </div>
                                <div class="col-md-6">
                                    <label for="paciente" class="form-label">
                                        <i class="ri-user-line"></i> Paciente <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="paciente" placeholder="Buscar paciente">
                                        <button class="btn btn-success text-dark" type="button" data-bs-toggle="modal" data-bs-target="#modalBuscarPaciente">
                                            <i class="ri-search-line"></i>
                                        </button>
                                        <button class="btn btn-info text-dark" type="button" data-bs-toggle="modal" data-bs-target="#modalResumenUsuario">
                                            <i class="ri-user-line"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Modal para el resumen del usuario -->
                                <div class="modal fade" id="modalResumenUsuario" tabindex="-1" aria-labelledby="modalResumenUsuarioLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered"> <!-- Se hace más grande y se centra -->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalResumenUsuarioLabel">Resumen del Usuario</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Contenido del resumen del usuario -->
                                                <p><strong>Nombre:</strong> Juan Pérez</p>
                                                <p><strong>Edad:</strong> 30 años</p>
                                                <p><strong>Última visita:</strong> 10/10/2023</p>
                                                <p><strong>Diagnóstico:</strong> Resfriado común</p>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-between">
                                                <button type="button" class="btn btn-info">
                                                    <i class="ri-folder-user-line"></i> Ficha del paciente
                                                </button>
                                                <button type="button" class="btn btn-warning">
                                                    <i class="ri-file-list-line"></i> Documentos del paciente
                                                </button>
                                                <button type="button" class="btn btn-secondary" id="cerrarModalResumen">Cerrar</button>
                                                <script>
                                                    document.getElementById("cerrarModalResumen").addEventListener("click", function() {
                                                        var modal = document.getElementById("modalResumenUsuario");
                                                        var modalInstance = bootstrap.Modal.getInstance(modal); // Obtiene la instancia activa del modal
                                                        if (modalInstance) {
                                                            modalInstance.hide(); // Cierra solo este modal
                                                        }
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal de búsqueda de paciente -->
                                <div class="modal fade" id="modalBuscarPaciente" tabindex="-1" aria-labelledby="modalBuscarPacienteLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-fullscreen">
                                        <div class="modal-content" style="margin: 20px; height: calc(100vh - 40px); max-width: 1200px; margin-left: auto; margin-right: auto;">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalBuscarPacienteLabel">
                                                    <i class="ri-search-line"></i> Buscar Paciente
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body" style="overflow-y: auto;">
                                                <!-- Campo de búsqueda y checkboxes -->
                                                <div class="row mb-3">
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" id="buscarPacienteInput" placeholder="Buscar paciente...">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="checkComienzaPorTexto">
                                                            <label class="form-check-label" for="checkComienzaPorTexto">Comienza por texto</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="checkContieneTexto">
                                                            <label class="form-check-label" for="checkContieneTexto">Contiene texto</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Tabla de resultados -->
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Paciente/Historia</th>
                                                                <th>Doc ID</th>
                                                                <th>Móvil</th>
                                                                <th>Teléfono</th>
                                                                <th>Correo Electrónico</th>
                                                                <th>Observaciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <!-- Ejemplo de filas de datos -->
                                                            <tr>
                                                                <td>Juan Pérez</td>
                                                                <td>12345678</td>
                                                                <td>+34 600 123 456</td>
                                                                <td>+34 91 123 45 67</td>
                                                                <td>juan.perez@example.com</td>
                                                                <td>Ninguna</td>
                                                            </tr>
                                                            <tr>
                                                                <td>María Gómez</td>
                                                                <td>87654321</td>
                                                                <td>+34 600 654 321</td>
                                                                <td>+34 91 654 32 10</td>
                                                                <td>maria.gomez@example.com</td>
                                                                <td>Alergia a la penicilina</td>
                                                            </tr>
                                                            <!-- Más filas pueden agregarse dinámicamente -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" id="cerrarModalBuscarPaciente">Cerrar</button>
                                                <button type="button" class="btn btn-success" id="seleccionarPaciente">Seleccionar</button>
                                                <script>
                                                    document.getElementById("cerrarModalBuscarPaciente").addEventListener("click", function() {
                                                        var modal = document.getElementById("modalBuscarPaciente");
                                                        var modalInstance = bootstrap.Modal.getInstance(modal);
                                                        if (modalInstance) {
                                                            modalInstance.hide();
                                                        }
                                                    });

                                                    document.getElementById("seleccionarPaciente").addEventListener("click", function() {
                                                        var modal = document.getElementById("modalBuscarPaciente");
                                                        var modalInstance = bootstrap.Modal.getInstance(modal);
                                                        if (modalInstance) {
                                                            modalInstance.hide();
                                                        }
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <!-- Primera visita y Nueva alta en la misma fila -->
                            <div class="row mb-3 text-center">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="primeraVisita">
                                        <label class="form-check-label" for="primeraVisita">
                                            <i class="ri-checkbox-circle-line"></i> Registro Visita
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="nuevaAlta">
                                        <label class="form-check-label" for="nuevaAlta">
                                            <i class="ri-checkbox-circle-line"></i>Registrar Nueva alta
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Submenú desplegable para Primera Visita -->
                            <div id="submenuPrimeraVisita" class="mb-3" style="display: none;">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="nombre" class="form-label">
                                            <i class="ri-user-line"></i> Nombre <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="nombre">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="primerApellido" class="form-label">
                                            <i class="ri-user-line"></i> Primer apellido <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="primerApellido">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="segundoApellido" class="form-label">
                                            <i class="ri-user-line"></i> Segundo apellido
                                        </label>
                                        <input type="text" class="form-control" id="segundoApellido">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="numeroDocumento" class="form-label">
                                            <i class="ri-id-card-line"></i> Número de documento
                                        </label>
                                        <input type="text" class="form-control" id="numeroDocumento">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="telefono" class="form-label">
                                            <i class="ri-phone-line"></i> Teléfono
                                        </label>
                                        <input type="text" class="form-control" id="telefono">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="movil" class="form-label">
                                            <i class="ri-smartphone-line"></i> Móvil
                                        </label>
                                        <input type="text" class="form-control" id="movil">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">
                                            <i class="ri-mail-line"></i> E-mail
                                        </label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="portalPaciente" class="form-label">
                                            <i class="ri-user-line"></i> Portal del Paciente
                                        </label>
                                        <input type="text" class="form-control" id="portalPaciente">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="procedencia" class="form-label">
                                            <i class="ri-map-pin-line"></i> Procedencia
                                        </label>
                                        <input type="text" class="form-control" id="procedencia">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tarifasMutuas" class="form-label">
                                            <i class="ri-money-dollar-circle-line"></i> Tarifas/mutuas
                                        </label>
                                        <input type="text" class="form-control" id="tarifasMutuas" placeholder="Busca tarifa/mutua">
                                    </div>
                                </div>
                            </div>

                            <!-- Submenú desplegable para Nueva Alta -->
                            <div id="submenuNuevaAlta" class="mb-3" style="display: none;">
                                <div class="row mb-3">
                                    <!-- Columna 1 -->
                                    <div class="col-md-4">
                                        <label for="nombreAlta" class="form-label">
                                            <i class="ri-user-line"></i> Nombre <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="nombreAlta">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="primerApellidoAlta" class="form-label">
                                            <i class="ri-user-line"></i> Primer apellido <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="primerApellidoAlta">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="segundoApellidoAlta" class="form-label">
                                            <i class="ri-user-line"></i> Segundo apellido
                                        </label>
                                        <input type="text" class="form-control" id="segundoApellidoAlta">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="fechaNacimientoAlta" class="form-label">
                                            <i class="ri-calendar-line"></i> Fecha de nacimiento
                                        </label>
                                        <input type="date" class="form-control" id="fechaNacimientoAlta">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="sexoAlta" class="form-label">
                                            <i class="ri-user-line"></i> Sexo
                                        </label>
                                        <select class="form-select" id="sexoAlta">
                                            <option selected>Masculino</option>
                                            <option>Femenino</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="paisAlta" class="form-label">
                                            <i class="ri-map-pin-line"></i> País de origen
                                        </label>
                                        <input type="text" class="form-control" id="paisAlta" value="España">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="provinciaAlta" class="form-label">
                                            <i class="ri-map-pin-line"></i> Provincia
                                        </label>
                                        <select class="form-select" id="provinciaAlta">
                                            <option selected>Seleccione una provincia</option>
                                            <option>Provincia 1</option>
                                            <option>Provincia 2</option>
                                            <option>Provincia 3</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="poblacionAlta" class="form-label">
                                            <i class="ri-map-pin-line"></i> Población
                                        </label>
                                        <select class="form-select" id="poblacionAlta">
                                            <option selected>Seleccione una población</option>
                                            <option>Población 1</option>
                                            <option>Población 2</option>
                                            <option>Población 3</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tipoDocumentoAlta" class="form-label">
                                            <i class="ri-id-card-line"></i> Tipo de documento
                                        </label>
                                        <select class="form-select" id="tipoDocumentoAlta">
                                            <option selected>Seleccione un tipo</option>
                                            <option>DNI</option>
                                            <option>Pasaporte</option>
                                            <option>NIE</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="numeroDocumentoAlta" class="form-label">
                                            <i class="ri-id-card-line"></i> Número de documento
                                        </label>
                                        <input type="text" class="form-control" id="numeroDocumentoAlta">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="direccionAlta" class="form-label">
                                            <i class="ri-map-pin-line"></i> Dirección
                                        </label>
                                        <input type="text" class="form-control" id="direccionAlta">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="codigoPostalAlta" class="form-label">
                                            <i class="ri-map-pin-line"></i> Código postal
                                        </label>
                                        <input type="text" class="form-control" id="codigoPostalAlta">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="telefonoAlta" class="form-label">
                                            <i class="ri-phone-line"></i> Teléfono
                                        </label>
                                        <input type="text" class="form-control" id="telefonoAlta">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="movilAlta" class="form-label">
                                            <i class="ri-smartphone-line"></i> Móvil
                                        </label>
                                        <input type="text" class="form-control" id="movilAlta">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="emailAlta" class="form-label">
                                            <i class="ri-mail-line"></i> E-mail
                                        </label>
                                        <input type="email" class="form-control" id="emailAlta">
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" id="mailing">
                                            <label class="form-check-label" for="mailing">Mailing</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="procedenciaAlta" class="form-label">
                                            <label for="tarifasMutuasAlta" class="form-label">
                                                <i class="ri-map-pin-line"></i>Procedencia
                                            </label>
                                            <input type="text" class="form-control" id="procedencia" placeholder="Procedencia">
                                        </label>

                                    </div>
                                    <div class="col-md-4">
                                        <label for="tarifasMutuasAlta" class="form-label">
                                            <i class="ri-money-dollar-circle-line"></i> Aseguradora
                                        </label>
                                        <input type="text" class="form-control" id="tarifasMutuasAlta" placeholder="Aseguradora">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="observacionesAlta" class="form-label">
                                            <i class="ri-file-text-line"></i> Observaciones
                                        </label>
                                        <textarea class="form-control" id="observacionesAlta" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="alertarObservaciones">
                                            <label class="form-check-label" for="alertarObservaciones">
                                                <i class="ri-alert-line"></i> Mostrar observaciones del paciente
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Observaciones -->
                            <div class="mb-3">
                                <label for="observaciones" class="form-label">
                                    <i class="ri-file-text-line"></i> Observaciones
                                </label>
                                <textarea class="form-control" id="observaciones" rows="3"></textarea>
                            </div>

                            <!-- Destaca, Cita múltiple profesional y Múltiple en la misma fila -->
                            <div class="row mb-3 text-center">
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="destaca">
                                        <label class="form-check-label" for="destaca">
                                            <i class="ri-star-line"></i> Mostrar Observaciones
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <!-- Botón Cerrar con icono -->
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="ri-close-line"></i> <!-- Icono de cerrar -->
                        </button>

                        <!-- Botón Guardar con icono -->
                        <button type="button" class="btn btn-success" style="background-color: #00826F; border: none;">
                            <i class="ri-save-line"></i> <!-- Icono de guardar -->
                        </button>

                        <!-- Botón Guardar e imprimir con icono -->
                        <button type="button" class="btn btn-success" style="background-color: #00826F; border: none;">
                            <i class="ri-printer-line"></i> <!-- Icono de imprimir -->
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenedor del calendario -->
        <div>
            <div id="calendar"></div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $.getScript('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/locale/es.js', function() {
                // Definir nombres de meses con la primera letra en mayúscula
                const monthNames = [
                    'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                    'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                ];
                const monthNamesShort = [
                    'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                    'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'
                ];

                // Inicializar el calendario principal
                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay,agendaMulti'
                    },
                    defaultView: 'month', // Vista por defecto: mes
                    defaultDate: new Date(),
                    editable: true,
                    events: 'php/get_events.php',
                    locale: 'es',
                    monthNames: monthNames, // Nombres de meses completos
                    monthNamesShort: monthNamesShort, // Nombres de meses abreviados
                    slotLabelFormat: 'h:mm A', // Formato de 12 horas
                    slotDuration: '01:00:00', // Intervalo de 1 hora
                    slotLabelInterval: '01:00:00', // Intervalo de 1 hora
                    allDaySlot: false, // Eliminar la sección "Todo el día"
                    contentHeight: 'auto',
                    timeFormat: 'h:mm A', // Formato de 12 horas
                    views: {
                        agendaMulti: {
                            type: 'agenda',
                            duration: {
                                days: 3
                            },
                            buttonText: 'Multi',
                        }
                    },
                    eventRender: function(event, element) {
                        // Capitalizar la primera letra del título del evento
                        event.title = event.title.charAt(0).toUpperCase() + event.title.slice(1);
                        element.find('.fc-title').text(event.title);
                    },
                    eventClick: function(event) {
                        alert('Evento: ' + event.title);
                    }
                });

                // Inicializar el mini calendario
                $('#miniCalendar').fullCalendar({
                    header: false, // Sin header
                    defaultView: 'month', // Vista de mes
                    defaultDate: new Date(),
                    locale: 'es',
                    monthNames: monthNames, // Nombres de meses completos
                    monthNamesShort: monthNamesShort, // Nombres de meses abreviados
                    height: 'auto',
                    fixedWeekCount: false, // No mostrar semanas adicionales
                    dayClick: function(date, jsEvent, view) {
                        // Al hacer clic en una fecha, puedes redirigir o actualizar el calendario principal
                        $('#calendar').fullCalendar('gotoDate', date);
                        $('.dropdown-menu').removeClass('show'); // Cerrar el dropdown
                    }
                });
            });
        });

        document.getElementById('nuevaAlta').addEventListener('change', function() {
            var submenuAlta = document.getElementById('submenuNuevaAlta');
            var submenuVisita = document.getElementById('submenuPrimeraVisita');
            var checkboxVisita = document.getElementById('primeraVisita');

            if (this.checked) {
                submenuAlta.style.display = 'block';
                submenuVisita.style.display = 'none';
                checkboxVisita.checked = false; // Desmarcar el checkbox de "Primera visita"
            } else {
                submenuAlta.style.display = 'none';
            }
        });

        document.getElementById('primeraVisita').addEventListener('change', function() {
            var submenuVisita = document.getElementById('submenuPrimeraVisita');
            var submenuAlta = document.getElementById('submenuNuevaAlta');
            var checkboxAlta = document.getElementById('nuevaAlta');

            if (this.checked) {
                submenuVisita.style.display = 'block';
                submenuAlta.style.display = 'none';
                checkboxAlta.checked = false; // Desmarcar el checkbox de "Nueva alta"
            } else {
                submenuVisita.style.display = 'none';
            }
        });

        document.addEventListener("DOMContentLoaded", function() {
            const modalBuscarPaciente = document.getElementById("modalBuscarPaciente");

            modalBuscarPaciente.addEventListener("hidden.bs.modal", function(event) {
                event.stopPropagation(); // Evita que el cierre se propague a otros modales abiertos
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