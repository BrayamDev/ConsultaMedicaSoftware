<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agenda</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!--css-->
    <link rel="stylesheet" href="/css/estilos.css">
    <!-- Remix Icon CSS (para los iconos) -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top p-2">
        <div class="container-fluid">
            <!-- Logo o nombre de la marca (izquierda) -->
            <a class="navbar-brand" href="#">
                <img src="../imagenes/logo.png" alt="imagen del logo" class="logo-custom">
            </a>

            <!-- Botón para colapsar el menú en dispositivos móviles -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Contenedor para los botones (derecha) -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- Botón de Notificaciones -->
                    <li class="nav-item me-3">
                        <button class="btn btn-light position-relative" onclick="mostrarNotificaciones()">
                            <i class="ri-notification-3-line"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                3
                                <span class="visually-hidden">Notificaciones no leídas</span>
                            </span>
                        </button>
                    </li>

                    <!-- Botón de Alertas -->
                    <li class="nav-item me-3">
                        <button class="btn btn-light position-relative" onclick="mostrarAlertas()">
                            <i class="ri-alarm-warning-line"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                1
                                <span class="visually-hidden">Alertas no leídas</span>
                            </span>
                        </button>
                    </li>

                    <li class="nav-item">
                        <!-- Botón para abrir el modal -->
                        <button class="btn btn-light position-relative" data-bs-toggle="modal"
                            data-bs-target="#userModal">
                            <i class="ri-user-line"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


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
                        <a class="btn btn-danger" href="../Login/CerrarSesion.php">
                            <i class="ri-logout-circle-line"></i> Cerrar Sesión
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>