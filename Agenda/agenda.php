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
    <?php include_once "../global/menu.php" ?>
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
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" id="citaFueraHorario">
                                        <label class="form-check-label" for="citaFueraHorario">Cita fuera de horario</label>
                                    </div>
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
                                    <input type="text" class="form-control" id="paciente">
                                </div>
                            </div>

                            <!-- Primera visita y Nueva alta en la misma fila -->
                            <div class="row mb-3 text-center">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="primeraVisita">
                                        <label class="form-check-label" for="primeraVisita">
                                            <i class="ri-checkbox-circle-line"></i> Primera visita
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="nuevaAlta">
                                        <label class="form-check-label" for="nuevaAlta">
                                            <i class="ri-checkbox-circle-line"></i> Nueva alta
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
                                            <i class="ri-map-pin-line"></i> País
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
                                    <div class="col-md-4">
                                        <label for="numeroDocumentoAlta" class="form-label">
                                            <i class="ri-id-card-line"></i> Número de documento
                                        </label>
                                        <input type="text" class="form-control" id="numeroDocumentoAlta">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="direccionAlta" class="form-label">
                                            <i class="ri-map-pin-line"></i> Dirección
                                        </label>
                                        <input type="text" class="form-control" id="direccionAlta">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="segundaDireccionAlta" class="form-label">
                                            <i class="ri-map-pin-line"></i> Segunda dirección
                                        </label>
                                        <input type="text" class="form-control" id="segundaDireccionAlta">
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
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" id="avisosSMS">
                                            <label class="form-check-label" for="avisosSMS">Avisos SMS</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="publicidadSMS">
                                            <label class="form-check-label" for="publicidadSMS">Publicidad SMS</label>
                                        </div>
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
                                            <i class="ri-map-pin-line"></i> Procedencia
                                        </label>
                                        <select class="form-select" id="procedenciaAlta">
                                            <option selected>Seleccione una procedencia</option>
                                            <option>Procedencia 1</option>
                                            <option>Procedencia 2</option>
                                            <option>Procedencia 3</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tarifasMutuasAlta" class="form-label">
                                            <i class="ri-money-dollar-circle-line"></i> Tarifas/mutuas
                                        </label>
                                        <input type="text" class="form-control" id="tarifasMutuasAlta" placeholder="Busca tarifa/mutua">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="formaPagoAlta" class="form-label">
                                            <i class="ri-money-dollar-circle-line"></i> Forma de pago
                                        </label>
                                        <select class="form-select" id="formaPagoAlta">
                                            <option selected>Seleccione una forma de pago</option>
                                            <option>Efectivo</option>
                                            <option>Tarjeta</option>
                                            <option>Transferencia</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check mt-4">
                                            <input class="form-check-input" type="checkbox" id="generarFacturasAlta">
                                            <label class="form-check-label" for="generarFacturasAlta">Generar facturas</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="lopdAlta">
                                            <label class="form-check-label" for="lopdAlta">LOPD</label>
                                        </div>
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
                                                <i class="ri-alert-line"></i> Alertar de las observaciones del paciente
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="otrosDatosAlta" class="form-label">
                                            <i class="ri-file-text-line"></i> Otros datos
                                        </label>
                                        <textarea class="form-control" id="otrosDatosAlta" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="portalPacienteAlta">
                                            <label class="form-check-label" for="portalPacienteAlta">
                                                <i class="ri-user-line"></i> Portal del Paciente
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Particulares y Tar/Mút en la misma fila -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="particulares" class="form-label">
                                        <i class="ri-user-settings-line"></i> Particulares
                                    </label>
                                    <input type="text" class="form-control" id="particulares">
                                </div>
                                <div class="col-md-6">
                                    <label for="tarMutu" class="form-label">
                                        <i class="ri-money-dollar-circle-line"></i> Tar/Mút.
                                    </label>
                                    <select class="form-select" id="tarMutu">
                                        <option selected>Seleccione una opción</option>
                                        <option>Tarifa 1</option>
                                        <option>Tarifa 2</option>
                                        <option>Tarifa 3</option>
                                    </select>
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
                                            <i class="ri-star-line"></i> Destaca
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="citaMultiple">
                                        <label class="form-check-label" for="citaMultiple">
                                            <i class="ri-group-line"></i> Cita múltiple profesional
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="multiple">
                                        <label class="form-check-label" for="multiple">
                                            <i class="ri-list-check"></i> Múltiple
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-success" style="background-color: #00826F; border: none;">Guardar</button>
                        <button type="button" class="btn btn-success" style="background-color: #00826F; border: none;">Guardar e imprimir</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenedor del calendario -->
        <div class="container-fluid d-flex flex-column align-items-end">
            <div id="calendar" class="mt-4 calendar-responsive" style="width: 100%;"></div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $.getScript('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/locale/es.js', function() {
                // Inicializar el calendario principal
                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay,agendaMulti'
                    },
                    defaultView: 'agendaDay',
                    defaultDate: new Date(),
                    editable: true,
                    events: 'php/get_events.php',
                    locale: 'es',
                    slotLabelFormat: 'HH:mm',
                    slotDuration: '01:00:00', // Cambiado a 1 hora
                    slotLabelInterval: '01:00:00', // Cambiado a 1 hora
                    contentHeight: 'auto',
                    views: {
                        agendaMulti: {
                            type: 'agenda',
                            duration: {
                                days: 3
                            },
                            buttonText: 'Multi',
                        }
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