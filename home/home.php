<?php
// Inicia la sesión
session_start();
include "../global/conexion.php";

// Verifica si el usuario está logueado
if (!isset($_SESSION['nombre_user'])) {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!--css-->
    <link rel="stylesheet" href="../css/estilos.css">
    <!-- Remix Icon CSS (para los iconos) -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body>
    <?php include_once "../global/navbar.php" ?>
    <?php // include_once "../global/menu.php" ?>

    <!-- Sección de Información -->
    <div class="info-section">
        <br><br>
    </div>

    <div class="header">
        <div class="header-content">
            <h4 class="text-white">Buen día,</h4>
            <h2 class="display-4 fw-bold text-white">
                <?php echo isset($_SESSION['nombre_completo']) ? $_SESSION['nombre_completo'] : 'Usuario'; ?>
            </h2>
            <div class="d-flex align-items-center mt-4">
                <div class="icon-box me-3">
                    <i class="ri-surgical-mask-line fs-4 text-white"></i>
                </div>
                <div>
                    <h2 class="m-0 fw-bold">9</h2>
                    <p class="m-0 text-white">Pacientes</p>
                </div>
            </div>
        </div>
        <div class="wave">
            <svg viewBox="0 0 500 150" preserveAspectRatio="none">
                <path d="M-0.27,67.61 C149.99,150.00 589.45,66.63 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"></path>
            </svg>
        </div>
    </div>

    <!-- <di class="main-content">-->
        <div class="container-fluid">
            <div class="row">
                <!-- Rectángulo 1: Servicios Asistenciales -->
                <div class="col-md-4 p-0">
                    <div class="card custom-card h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-large me-4 text-success">
                                <i class="ri-heart-pulse-line fs-1"></i> <!-- Icono grande -->
                            </div>
                            <div>
                                <a class="card-title" href="../Agenda/agenda.php">Servicios Asistenciales - Listado</a>
                                <p class="card-text">Información sobre los servicios asistenciales ofrecidos.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Rectángulo 2: Desglose Atenciones Diarias -->
                <div class="col-md-4 p-0">
                    <div class="card custom-card h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-large me-4">
                                <i class="ri-calendar-check-line fs-1 text-success"></i> <!-- Icono grande -->
                            </div>
                            <div>
                                <h5 class="card-title ">Desglose Atenciones Diarias</h5>
                                <p class="card-text">Resumen de las atenciones realizadas en el día.</p>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Rectángulo 3: Facturación -->
                <div class="col-md-4 p-0">
                    <div class="card custom-card h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-large me-4">
                                <i class="ri-money-dollar-circle-line fs-1 text-success"></i> <!-- Icono grande -->
                            </div>
                            <div>
                                <h5 class="card-title">Facturación</h5>
                                <p class="card-text">Detalles sobre la facturación y pagos.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <p>
                </p>

                <!-- Rectángulo 4: Gestión Pacientes -->
                <div class="col-md-4 p-0">
                    <div class="card custom-card h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-large me-4">
                                <i class="ri-user-heart-line fs-1 text-success"></i> <!-- Icono grande -->
                            </div>
                            <div>
                                <a class="card-title" href="../Pacientes/paciente.php">Gestión Pacientes</a>
                                <p class="card-text">Resumen de las atenciones realizadas en el día.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Rectángulo 5: Gestión Profesionales-->
                <div class="col-md-4 p-0">
                    <div class="card custom-card h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-large me-4">
                                <i class="ri-calendar-check-line fs-1 text-success"></i> <!-- Icono grande -->
                            </div>
                            <div>
                                <h5 class="card-title ">Gestión Profesionales</h5>
                                <p class="card-text">Resumen de las atenciones realizadas en el día.</p>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Rectángulo 6: Medicamentos y procedimientos -->
                <div class="col-md-4 p-0">
                    <div class="card custom-card h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-large me-4">
                                <i class="ri-calendar-check-line fs-1 text-success"></i> <!-- Icono grande -->
                            </div>
                            <div>
                                <h5 class="card-title ">Medicamentos y procedimientos</h5>
                                <p class="card-text">Resumen de las atenciones realizadas en el día.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <p>
                </p>

                <!-- Rectángulo 7: Estadísticas -->
                <div class="col-md-4 p-0">
                    <div class="card custom-card h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-large me-4">
                                <i class="ri-calendar-check-line fs-1 text-success"></i> <!-- Icono grande -->
                            </div>
                            <div>
                                <h5 class="card-title ">Estadísticas</h5>
                                <p class="card-text">Resumen de las atenciones realizadas en el día.</p>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Rectángulo 8:Plantillas -->
                <div class="col-md-4 p-0">
                    <div class="card custom-card h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-large me-4">
                                <i class="ri-calendar-check-line fs-1 text-success"></i> <!-- Icono grande -->
                            </div>
                            <div>
                                <h5 class="card-title ">Plantillas</h5>
                                <p class="card-text">Resumen de las atenciones realizadas en el día.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- </div>-->

    <script src="../Js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>