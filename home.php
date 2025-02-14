<?php
// Inicia la sesión
session_start();
include "global/conexion.php" ;

// Verifica si el usuario está logueado
if (!isset($_SESSION['nombre_user'])) {
    header("Location: index.php");
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
    <link rel="stylesheet" href="css/estilos.css">
    <!-- Remix Icon CSS (para los iconos) -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <br>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top p-2">
        <div class="container-fluid">
            <!-- Logo o nombre de la marca (izquierda) -->
            <a class="navbar-brand" href="#">
                <img src="imagenes/logo.png" alt="imagen del logo" class="logo-custom">
            </a>

            <!-- Botón para colapsar el menú en dispositivos móviles -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Contenedor para los botones (derecha) -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- Botón de Notificaciones -->
                    <li class="nav-item me-3">
                        <button class="btn btn-light position-relative" onclick="mostrarNotificaciones()">
                            <i class="ri-notification-3-line"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                3
                                <span class="visually-hidden">Notificaciones no leídas</span>
                            </span>
                        </button>
                    </li>

                    <!-- Botón de Alertas -->
                    <li class="nav-item me-3">
                        <button class="btn btn-light position-relative" onclick="mostrarAlertas()">
                            <i class="ri-alarm-warning-line"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                1
                                <span class="visually-hidden">Alertas no leídas</span>
                            </span>
                        </button>
                    </li>

                    <li class="nav-item">
                        <!-- Botón para abrir el modal -->
                        <button class="btn btn-light position-relative" data-bs-toggle="modal" data-bs-target="#userModal">
                            <i class="ri-user-line"></i>
                        </button>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <br>
        <!-- Sección de información del usuario -->
        <div class="user-info">
            <img src="imagenes/profile.webp" alt="Imagen de usuario">
            <div>
                <div class="name">Juan Pablo Guzmán</div>
                <div class="role">Doctor</div>
            </div>
        </div>

        <!-- Menú lateral -->
        <a href="#"><i class="ri-home-2-line"></i><span class="menu-text"> Inicio</span></a>
        <a href="#"><i class="ri-calendar-line"></i><span class="menu-text"> Agenda - Servicios Asistenciales</span></a>
        <a href="#"><i class="ri-user-line"></i><span class="menu-text"> Reporte Atenciones (Visitas) </span></a>
        <a href="#"><i class="ri-file-list-line"></i><span class="menu-text"> Facturación</span></a>
        <a href="#"><i class="ri-heart-line"></i><span class="menu-text"> Pacientes</span></a>
        <a href="#"><i class="ri-stethoscope-line"></i><span class="menu-text"> Médicos</span></a>
        <a href="#"><i class="ri-medicine-bottle-line"></i><span class="menu-text"> Medicamentos y
                procedimientos</span></a>
        <a href="#"><i class="ri-folder-line"></i><span class="menu-text"> Repositorio </span></a>
        <a href="#"><i class="ri-message-line"></i><span class="menu-text"> Comunicación con pacientes</span></a>
    </div>
    <!-- Sección de Información -->
    <div class="info-section">
        <br><br>
    </div>

    <div class="header">
        <div class="header-content">
            <h6 class="text-white">Buen día,</h6>
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

    <div class="main-content">
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
                                <h5 class="card-title">Servicios Asistenciales</h5>
                                <p class="card-text">Información sobre los servicios asistenciales ofrecidos.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Rectángulo 2: Atenciones Diarias -->
                <div class="col-md-4 p-0">
                    <div class="card custom-card h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-large me-4">
                                <i class="ri-calendar-check-line fs-1 text-success"></i> <!-- Icono grande -->
                            </div>
                            <div>
                                <h5 class="card-title ">Atenciones Diarias</h5>
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
            </div>
        </div>
    </div>


    <!-- Modal del usuario -->
    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"> <!-- Usamos modal-lg para más espacio -->
            <div class="modal-content">
                <!-- Encabezado del modal -->
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">Perfil de Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Cuerpo del modal -->
                <div class="modal-body">
                    <div class="row">
                        <!-- Columna izquierda: Imagen -->
                        <div class="col-md-6 d-flex align-items-center justify-content-center order-1"> <!-- order-1 para moverla a la izquierda -->
                            <div class="square-image-container">
                                <img src="imagenes/profile.webp" alt="Imagen de perfil" class="img-fluid square-image">
                            </div>
                        </div>

                        <!-- Columna derecha: Inputs -->
                        <div class="col-md-6 order-2"> <!-- order-2 para moverla a la derecha -->
                            <h2>Datos de usuario</h2>
                            <form>
                                <!-- Input 1 -->
                                <div class="mb-3">
                                    <label for="inputNombre" class="form-label">Nombre Completo</label>
                                    <input type="text" class="form-control" id="inputNombre" value="<?php echo isset($_SESSION['nombre_completo']) ? $_SESSION['nombre_completo'] : 'Usuario'; ?>">
                                </div>

                                <!-- Input 2 -->
                                <div class="mb-3">
                                    <label for="inputEmail" class="form-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" id="inputEmail" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : 'email'; ?>">
                                </div>

                                <!-- Input 3 -->
                                <div class="mb-3">
                                    <label for="inputTelefono" class="form-label">Teléfono</label>
                                    <input type="tel" class="form-control" id="inputTelefono" value="<?php echo isset($_SESSION['telefono']) ? $_SESSION['telefono'] : 'telefono'; ?>">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Pie del modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Guardar Cambios</button>
                    <!-- Botón de Cerrar Sesión -->
                    <div class="d-grid">
                        <a class="btn btn-danger" href="Login/CerrarSesion.php">
                            <i class="ri-logout-circle-line"></i> Cerrar Sesión
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="Js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>